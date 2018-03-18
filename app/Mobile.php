<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Mobile extends Model
{
    //
    protected $table = 'mobile';


	public $timestamps = true;
	

	protected $fillable = [
		'id',
	    'name',
	    'start_date',
	    'finish_date',
	    'location',
	    'academy',
	    'outline',
	    'telkom_main',
	    'job_family',
	    'participants',
	    'released_date',
	    'expired_at',
	    'status',
	    'created_at',
	    'updated_at'];
	
	public static function getAllData() {
		return DB::table('mobile')->get();
	}

	public static function getWhereThereIs($nik, $job_family) {
		return DB::table('mobile')->where('participants','like','%'.$nik.',%')
								->where('job_family',$job_family)
								->get();
	}

}
