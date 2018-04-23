<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Help extends Model
{
    //
    protected $table = 'help';


	public $timestamps = true;
	

	protected $fillable = [
		'id',
	    'academy',
	    'nik',
	    'created_at',
	    'updated_at'];

	public static function getAllData() {
		return DB::table('help')->get();
	}


}
