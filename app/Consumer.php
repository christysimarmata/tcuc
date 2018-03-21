<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Consumer extends Model
{
    //
    protected $table = 'consumer';


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
		return DB::table('consumer')->get();
	}

	public static function getByDate($start, $finish) {
		return DB::table('consumer')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->get();
	}
	public static function getWhereThereIs($nik, $job_family) {
		return DB::table('consumer')->where('participants','like','%'.$nik.',%')
								->where('job_family',$job_family)
								->get();
	}

	public static function getByProgram($start, $finish, $program) {
		return DB::table('consumer')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->where('telkom_main', $program)
								->count();
	}

	public static function getTotalByProgram($program) {
		return DB::table('consumer')->where('telkom_main', $program) 
								->count();
	}

	public static function getTotalByFamily($family) {
		return DB::table('consumer')->where('job_family', $family)
								->count();
	}				


	public static function getByFamily($start, $finish,$family) {
		return DB::table('consumer')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->where('job_family', $family)
								->count();
	}

	public static function getByMonthProgram($start, $finish, $program, $month) {
		return DB::table('consumer')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->where('telkom_main', $program)
								->where('start_date','like','%-'.$month.'-%')
								->count();
	}

	public static function getByMonthFamily($start, $finish, $family, $month) {
		return DB::table('consumer')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->where('job_family', $family)
								->where('start_date','like','%-'.$month.'-%')
								->count();
	}
}
