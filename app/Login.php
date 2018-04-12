<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Login extends Model
{
    //
    public $timestamps = 'false';

    public static function validateLogin($nik, $password) {
    	$user = DB::table('user_fix')
    		->where('nik', $nik)
    		->where('password', $password)
    		->value('id');

    	if ($user != NULL) {
    		return $user;
    	} 

    	return 'false';
    }

    public static function validateUser($nik, $password) {
    	if($nik == 'user123') {
    		return 'user';
    	} elseif ($nik == 'sso123') {
    		return 'sso';
    	} elseif ($nik == 'lde123') {
    		return 'lde';
    	} elseif ($nik == 'nonlde123') {
    		return 'nonlde';
    	} elseif ($nik == 'pnc123') {
    		return 'pnc';
    	} elseif ($nik == 'admin123') {
    		return 'admin';
    	}
    }

    public static function getUser($id) {
    	return DB::table('users')->where('id', $id)->first();
    }

    public static function getIdAktif(){
        return $user;
    }
}
