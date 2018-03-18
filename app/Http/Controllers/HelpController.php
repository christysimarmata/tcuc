<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class HelpController extends Controller
{
    //
    public function showContact() {
    	$lde_nits = Users::getlde('ldenits');
        $lde_consumer = Users::getlde('ldeconsumer');
        $lde_business = Users::getlde('ldebusiness');
        $lde_disp = Users::getlde('ldedisp');
        $lde_wins = Users::getlde('ldewins');
        $lde_mobile = Users::getlde('ldemobile');
        $lde_leadership = Users::getlde('ldeleadership');
        $lde_enterprise = Users::getlde('ldeenterprise');
    	return view('help')->with('lde_nits',$lde_nits)
                           ->with('lde_consumer',$lde_consumer)
                           ->with('lde_business',$lde_business)     
                           ->with('lde_disp',$lde_disp)
                           ->with('lde_wins',$lde_wins)
                           ->with('lde_mobile',$lde_mobile)
                           ->with('lde_leadership',$lde_leadership)
                           ->with('lde_enterprise',$lde_enterprise);


    }

    
}
