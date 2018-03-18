<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\MessageBag;
use App\Login;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    
    public function doLogin() {
    	$nik = Input::get('nik');
    	$password = Input::get('password');
            $result = Login::validateLogin($nik, $password);
        	if ($result == 'false') {
                $err = new MessageBag(['failed' => 'Invalid Email and/or Password. Please try again!']);
                return view('login')->withErrors($err);
        	} else {
                $user = Login::getUser($result);
                session(['userAktif' => $user->nik]);
        		session(['idUserAktif' => $result]);
                session(['roleUserAktif' => $user->role]);
                session(['avatarUserAktif' => $user->avatar]);
                session(['idx' => '1']);
        	}


            $roleUser = Login::validateUser($nik, $password);
            return redirect('dashboard'.$roleUser);
        }
    }

?>
