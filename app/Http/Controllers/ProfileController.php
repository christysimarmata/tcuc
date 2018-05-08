<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Login;
use App\Users;
use App\UserFix;
use Illuminate\Support\Facades\Input;
use App\JobFamily;
use Image;
use DB;

class ProfileController extends Controller
{
    public static function showProfile() {
        if (session('idUserAktif')) {      
          $user = Login::getUser(session('idUserAktif'));
          return view('profile')->with('user', $user);
        } else {
            return view('login');
        }
    
    }

    public static function updateAvatar(Request $request) {
      $user = Login::getUser(session('idUserAktif'));
        if($request->hasFile('avatar')) {
          $avatar = $request->file('avatar');
          $filename = $user->nik. '.'. $avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(167,158)->save(public_path('images/uploads/'.$filename));

          $user1 = UserFix::find(session('idUserAktif'));
          $user2 = Users::find(session('idUserAktif'));
          $user1->avatar = $filename;
          $user2->avatar = $filename;
          $user1->save();
          $user2->save();
          session(['avatarUserAktif' => $filename]);
        }

        return view('profile')->with('user', $user1);
    }

    public function changepassword() {
      return view('changepassword');
    }

    public function updatepassword() {
      $old = Input::post('oldpassword');
      $new = Input::post('newpassword');
      $confirm = Input::post('confirmpassword');

      $temp = UserFix::where('nik', session('userAktif'))->get();
      $temp_old = $temp[0]->password;

      if($old == $temp_old) {
        if($new == $confirm) {
          UserFix::where('nik', session('userAktif'))->update(['password' => $new]);
          Users::where('nik', session('userAktif'))->update(['password' => $new]);
          return redirect('profile')->with('status', 'Password changed !');
        } else {
          return redirect('changepassword')->with('status', 'New password doesnt match !');
        }
      } else {
          return redirect('changepassword')->with('status', 'Old Password wrong !');
      }

    }

    public static function showList($nik) {
        $user = Users::getParticipantFirst($nik); 
        $plucked = [];

        $list_table = DB::table('academy')->where('flag', date("Y"))->get();

        $list_table_detail = DB::table('academy_detail')->where('flag', date("Y"))->pluck('table');
        $list_table_detail->all();

          foreach($list_table_detail as $data) {
            $temp_plucked = DB::table($data)->where('peserta', $nik)->groupBy('job_family')->pluck('job_family');
              foreach($temp_plucked as $dataa) {
                if(!in_array($dataa, $plucked)) {
                  $plucked[] = $dataa;
                }
              }
          }

        $family = [];
        $filee = [];
          foreach($plucked as $plucks) {
            foreach($list_table as $data) {
              if((DB::table($data->table)->where('participants','like','%'.$nik.',%')->where('job_family',$plucks)->get())->isNotEmpty()) {
                $family[$plucks][] = DB::table($data->table)->where('participants','like','%'.$nik.',%')->where('job_family',$plucks)->get();
                $filee[] = DB::table($data->table_detail)->where('job_family', $plucks)->where('peserta', $nik)->get();
              }
            }
          }  
             
        return view('profile_detail')->with('family', $family)
                                     ->with('filee', $filee)
                                     ->with('user', $user);
      }

}
