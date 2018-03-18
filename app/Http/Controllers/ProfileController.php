<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Login;
use App\Users;
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

          $user = Users::find(session('idUserAktif'));
          $user->avatar = $filename;
          $user->save();
          session(['avatarUserAktif' => $filename]);
        }

        return view('profile')->with('user', $user);
    }

    public static function showList($nik) {
        $user = Users::getParticipantFirst($nik);
        $plucked = JobFamily::getData()->pluck('name');
        $plucked->all();


        $family = [];
        foreach($plucked as $plucks) {
          if((Nits::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Nits::getWhereThereIs($nik, $plucks);
          }
          if((Consumer::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Consumer::getWhereThereIs($nik, $plucks);
          }
          if((Disp::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Disp::getWhereThereIs($nik, $plucks);
          }
          if((Wins::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Wins::getWhereThereIs($nik, $plucks);
          }
          if((Mobile::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Mobile::getWhereThereIs($nik, $plucks);
          }
          if((Enterprise::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Enterprise::getWhereThereIs($nik, $plucks);
          }
          if((Business::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Business::getWhereThereIs($nik, $plucks);
          }
          if((Leadership::getWhereThereIs($nik, $plucks))->isNotEmpty()) {
            $family[$plucks][] = Leadership::getWhereThereIs($nik, $plucks);
          } 
        }
        
        
        return view('profile_detail')->with('family', $family)
                                     ->with('user', $user);
      }

}
