<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Login;
use App\Users;
use App\UserFix;
use Illuminate\Support\Facades\Input;
use App\JobFamily;
use App\Consumer;
use App\Business;
use App\Disp;
use App\Enterprise;
use App\Leadership;
use App\Mobile;
use App\Nits;
use App\Wins;
use App\ConsumerDetail;
use App\BusinessDetail;
use App\DispDetail;
use App\EnterpriseDetail;
use App\LeadershipDetail;
use App\MobileDetail;
use App\NitsDetail;
use App\WinsDetail;
use Image;

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
        $plucked = JobFamily::getData()->pluck('name');
        $plucked->all();


        $family = [];
        $filee = [];
        foreach($plucked as $plucks) {
          if((Nits::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Nits::getWhereThereIs($nik, $plucks);
            $filee[] = NitsDetail::getFileName($nik, $plucks);
          }
          if((Consumer::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Consumer::getWhereThereIs($nik, $plucks);
            $filee[] = ConsumerDetail::getFileName($nik, $plucks);
          }
          if((Disp::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Disp::getWhereThereIs($nik, $plucks);
            $filee[] = DispDetail::getFileName($nik, $plucks);
          }
          if((Wins::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Wins::getWhereThereIs($nik, $plucks);
            $filee[] = WinsDetail::getFileName($nik, $plucks);
          }
          if((Mobile::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Mobile::getWhereThereIs($nik, $plucks);
            $filee[] = MobileDetail::getFileName($nik, $plucks);
          }
          if((Enterprise::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Enterprise::getWhereThereIs($nik, $plucks);
            $filee[] = EnterpriseDetail::getFileName($nik, $plucks);
          }
          if((Business::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Business::getWhereThereIs($nik, $plucks);
            $filee[] = BusinessDetail::getFileName($nik, $plucks);
          }
          if((Leadership::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Leadership::getWhereThereIs($nik, $plucks);
            $filee[] = LeadershipDetail::getFileName($nik, $plucks);
          } 
        }
        
        
        return view('profile_detail')->with('family', $family)
                                     ->with('filee', $filee)
                                     ->with('user', $user);
      }

}
