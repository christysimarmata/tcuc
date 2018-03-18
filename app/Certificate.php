<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Consumer;
use Business;
use Disp;
use Enterprise;
use Leadership;
use Mobile;
use Nits;
use Wins;

class Certificate extends Model
{
    //
   	protected $table = 'certificate';


	public $timestamps = true;
	

	protected $fillable = [
		'id',
	    'name',
	    'date',
	    'location',
	    'academy',
	    'outline',
	    'telkom_main',
	    'job_family',
	    'participants',
	    'expired_at',
	    'comment',
	    'created_at',
	    'updated_at'];
    
}
