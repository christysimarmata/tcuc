<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BusinessDetail extends Model
{
    //
    protected $table = 'business_enabler_detail';


	public $timestamps = true;
	

	protected $fillable = [
		'id',
	    'name',
	    'job_family',
	    'peserta',
	    'participant_status',
	    'division',
	    'file_name',
	    'created_at',
	    'updated_at'];

	
	public static function getFileName($peserta, $family) {
		return DB::table('business_enabler_detail')->where('job_family', $family)->where('peserta', $peserta)->get();
	}	
}
