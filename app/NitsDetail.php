<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class NitsDetail extends Model
{
    //
    protected $table = 'nits_detail';


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
		return DB::table('nits_detail')->where('job_family', $family)->where('peserta', $peserta)->get();
	}		
}
