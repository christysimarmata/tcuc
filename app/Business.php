<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Business extends Model
{
    //
    protected $table = 'business_enabler';


	public $timestamps = true;
	

	protected $fillable = [
		'id',
	    'name',
	    'start_date',
	    'finish_date',
	    'location',
	    'academy',
	    'institution',
	    'category',
	    'internal',
	    'cfu_fu',
	    'level',
	    'outline',
	    'telkom_main',
	    'job_family',
	    'participants',
	    'released_date',
	    'expired_at',
	    'filename',
	    'status',
	    'created_at',
	    'updated_at'];

	public static function getAllData() {
		return DB::table('business_enabler')->get();
	}

	public static function getSum() {
		return DB::table('business_enabler')->count();
	}

	public static function getByDate($start, $finish) {
		return DB::table('business_enabler')->where('start_date','>=', $start)
								->where('finish_date', '<=', $finish)
								->get();
	}

	public static function getWhereThereIs($nik, $job_family) {
		return DB::table('business_enabler')->where('participants','like','%'.$nik.',%')
								->where('job_family',$job_family)
								->get();
	}

	public static function jumlahLulus($year) {
		$datas = DB::table('business_enabler')->whereYear('start_date', '<=', $year)
									 ->whereYear('finish_date', '>=', $year)
									 ->get();

		$sum = 0;

		foreach($datas as $data) {
			$sum = $sum + DB::table('business_enabler_detail')->where('name', $data->name)->where('participant_status', 'Certified')->count();
		}
		return $sum;
	}

	public static function jumlahTidakLulus($year) {
		$datas = DB::table('business_enabler')->whereYear('start_date', '<=', $year)
									 ->whereYear('finish_date', '>=', $year)
									 ->get();

		$sum = 0;

		foreach($datas as $data) {
			$sum = $sum + DB::table('business_enabler_detail')->where('name', $data->name)->where('participant_status', '<>', 'Certified')->count();
		}
		return $sum;
	}

	public static function lulusValid($year, $expired) {
		$datas = DB::table('business_enabler')->whereYear('start_date', '<=', $year)
									 ->whereYear('finish_date', '>=', $year)
									 ->where('expired_at', '>=', $expired)
									 ->get();

		$sum = 0;

		foreach($datas as $data) {
			$sum = $sum + DB::table('business_enabler_detail')->where('name', $data->name)->where('participant_status', 'Certified')->count();
		}

		return $sum;
	}

	public static function lulusTidakValid($year, $expired) {
		$datas = DB::table('business_enabler')->whereYear('start_date', '<=', $year)
									 ->whereYear('finish_date', '>=', $year)
									 ->where('expired_at', '<', $expired)
									 ->get();

		$sum = 0;

		foreach($datas as $data) {
			$sum = $sum + DB::table('business_enabler_detail')->where('name', $data->name)->where('participant_status', 'Certified')->count();
		}

		return $sum;
	}

	public static function getByProgram($start, $finish, $program) {
		return DB::table('business_enabler')->whereYear('start_date','>=', $start)
								->whereYear('finish_date', '<=', $start + $finish)
								->where('telkom_main', $program)
								->count();
	}

	public static function getByProgramYears($start, $finish, $program) {
		return DB::table('business_enabler')->whereYear('start_date','>=', $start)
									->whereYear('finish_date', '<=', $finish)
									->where('telkom_main', $program)
									->count();
	}

	public static function getByFamilyYears($start, $finish, $family) {
		return DB::table('business_enabler')->whereYear('start_date','>=', $start)
									->whereYear('finish_date', '<=', $finish)
									->where('job_family', $family)
									->count();
	}

	public static function getTotalByProgram($program) {
		return DB::table('business_enabler')->where('telkom_main', $program) 
								->count();
	}

	public static function getTotalByFamily($family) {
		return DB::table('business_enabler')->where('job_family', $family)
								->count();
	}				


	public static function getByFamily($start, $finish,$family) {
		return DB::table('business_enabler')->whereYear('start_date','>=', $start)
								->whereYear('finish_date', '<=', $start + $finish)
								->where('job_family', $family)
								->count();
	}

	public static function getByMonthProgram($year, $program, $month) {
		return DB::table('business_enabler')->whereYear('start_date', $year)
								->where('telkom_main', $program)
								->whereMonth('start_date', $month)
								->count();
	}

	public static function getByMonthFamily($year, $family, $month) {
		return DB::table('business_enabler')->whereYear('start_date', $year)
								->where('job_family', $family)
								->whereMonth('start_date', $month)
								->count();
	}

	public static function programByYear($year, $program) {
		return DB::table('business_enabler')->whereYear('start_date', $year)
								->where('telkom_main', $program)
								->count();
							}

	public static function familyByYear($year, $family) {
		return DB::table('business_enabler')->whereYear('start_date', $year)
								->where('job_family', $family)
								->count();
	}
}
