<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UsersTemp extends Model
{
    //
    protected $table = 'users_temp';


	public $timestamps = true;
	

	protected $fillable = [
		'id',
	    'nik',
	    'nama',
	    'password',
	    'role',
	    'email',
	    'phone_number',
	    'job',
	    'ubpp',
	    'division',
	    'created_at',
	    'updated_at'];

	public static function getParticipant($nik) {
		return DB::table('users')->where('nik', $nik)->get();
	}

	public static function getParticipantFirst($nik) {
		return DB::table('users')->where('nik', $nik)->first();
	}

	public static function getlde($nik) {
		return DB::table('users')->where('nik', $nik)->first();
	}
}
