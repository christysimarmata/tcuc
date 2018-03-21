<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Disp extends Model
{
    //
    protected $table = 'disp';


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
		return DB::table('disp')->get();
	}

	public static function getWhereThereIs($nik, $job_family) {
		return DB::table('disp')->where('participants','like','%'.$nik.',%')
								->where('job_family',$job_family)
								->get();
	}
	public static function getByDate($start, $finish) {
		return DB::table('disp')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->get();
	}

	public static function getByProgram($start, $finish, $program) {
		return DB::table('disp')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->where('telkom_main', $program)
								->count();
	}

	public static function getByFamily($start, $finish,$family) {
		return DB::table('disp')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->where('job_family', $family)
								->count();
	}

	public static function getTotalByProgram($program) {
		return DB::table('disp')->where('telkom_main', $program) 
								->count();
	}

	public static function getTotalByFamily($family) {
		return DB::table('disp')->where('job_family', $family)
								->count();
	}				


	public static function getByMonthProgram($start, $finish, $program, $month) {
		return DB::table('disp')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->where('telkom_main', $program)
								->where('start_date','like','%-'.$month.'-%')
								->count();
	}

	public static function getByMonthFamily($start, $finish, $family, $month) {
		return DB::table('disp')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->where('job_family', $family)
								->where('start_date','like','%-'.$month.'-%')
								->count();
	}
}
