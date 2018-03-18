<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumer;
use App\Business;
use App\Disp;
use App\Enterprise;
use App\Leadership;
use App\Mobile;
use App\Nits;
use App\Wins;
use App\Users;
use App\JobFamily;
use Storage;
use Excel;
use Illuminate\Support\Facades\Input;

class MyCertificationController extends Controller
{
    //
    public static function showCertification() {
    	$jobfamily = JobFamily::getData();
    	$plucked = $jobfamily->pluck('name');
    	$plucked->all();


    	$family = [];
    	foreach($plucked as $plucks) {
    		if((Nits::getWhereThereIs(session('userAktif'), $plucks))->isNotEmpty()) {
    			$family[$plucks][] = Nits::getWhereThereIs(session('userAktif'), $plucks);
    		}
		    if((Consumer::getWhereThereIs(session('userAktif'), $plucks))->isNotEmpty()) {
    			$family[$plucks][] = Consumer::getWhereThereIs(session('userAktif'), $plucks);
    		}
    		if((Disp::getWhereThereIs(session('userAktif'), $plucks))->isNotEmpty()) {
    			$family[$plucks][] = Disp::getWhereThereIs(session('userAktif'), $plucks);
    		}
    		if((Wins::getWhereThereIs(session('userAktif'), $plucks))->isNotEmpty()) {
    			$family[$plucks][] = Wins::getWhereThereIs(session('userAktif'), $plucks);
    		}
    		if((Mobile::getWhereThereIs(session('userAktif'), $plucks))->isNotEmpty()) {
    			$family[$plucks][] = Mobile::getWhereThereIs(session('userAktif'), $plucks);
    		}
    		if((Enterprise::getWhereThereIs(session('userAktif'), $plucks))->isNotEmpty()) {
    			$family[$plucks][] = Enterprise::getWhereThereIs(session('userAktif'), $plucks);
    		}
    		if((Business::getWhereThereIs(session('userAktif'), $plucks))->isNotEmpty()) {
    			$family[$plucks][] = Business::getWhereThereIs(session('userAktif'), $plucks);
    		}
    		if((Leadership::getWhereThereIs(session('userAktif'), $plucks))->isNotEmpty()) {
    			$family[$plucks][] = Leadership::getWhereThereIs(session('userAktif'), $plucks);
    		}	
    	}
    	
	    
	    \Log::info($family);
	    return view('my_certification')->with('family',$family);
    }
    
}
