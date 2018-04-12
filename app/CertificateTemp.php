<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CertificateTemp extends Model
{
    //
    protected $table = 'certificate_temp';


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
	    'status',
	    'commend',
	    'created_at',
	    'updated_at'];

	public static function getAllDraft() {
		return DB::table('certificate_temp')->where('status', 'draftSSO')
											->get();
	}

	public static function getAllClarification() {
		return DB::table('certificate_temp')->where('status', 'needclarification')
											->get();
	}

	public static function getAllValidation($academi) {
		return DB::table('certificate_temp')->where('status', 'validateLDE')
											->where('academy', $academi)
											->get();
	}

	public static function getAllComplete($academi) {
		return DB::table('certificate_temp')->where('status', 'complete')
											->where('academy', $academi)
											->get();
	}

	public static function getAllByDate($academi, $start, $finish) {
		return DB::table('certificate_temp')->where('status', 'validateLDE')
											->where('academy', $academi)
											->whereBetween('start_date', [$start,$finish])
											->get();
	}

	public static function getAllByDateComplete($academi, $start, $finish) {
		return DB::table('certificate_temp')->where('status', 'complete')
											->where('academy', $academi)
											->whereBetween('start_date', [$start,$finish])
											->get();
	}

	
}
