<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainProgram extends Model
{
    //
    protected $table = 'mainprogram';


	public $timestamps = true;
	

	protected $fillable = [
		'id',
	    'name'];
}
