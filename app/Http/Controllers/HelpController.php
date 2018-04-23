<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Help;

class HelpController extends Controller
{
    //
    public function showContact() {
      $temp = Help::getAllData();
      \Log::info($temp);


    	$lde_nits = Users::getlde($temp[0]->nik);
      $lde_consumer = Users::getlde($temp[1]->nik);
      $lde_business = Users::getlde($temp[2]->nik);
      $lde_disp = Users::getlde($temp[3]->nik);
      $lde_wins = Users::getlde($temp[4]->nik);
      $lde_mobile = Users::getlde($temp[5]->nik);
      $lde_leadership = Users::getlde($temp[6]->nik);
      $lde_enterprise = Users::getlde($temp[7]->nik);
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
