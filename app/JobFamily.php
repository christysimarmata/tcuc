<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class JobFamily extends Model
{
    //
    protected $table = 'jobfamily';


	public $timestamps = true;
	

	protected $fillable = [
		'id',
	    'name'];

	public static function getData() {
		return DB::table('jobfamily')->get();
	}
}
