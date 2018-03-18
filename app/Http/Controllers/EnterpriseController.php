<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enterprise;
use App\Users;
use Illuminate\Support\Facades\Input;

class EnterpriseController extends Controller
{
    //
    public function showList() {
    	$data = Enterprise::getAllData();
    	return view('enterprise')->with('data',$data);
    }

    public function updateList() {
        if(Input::post('start_date') and Input::post('finish_date')) {
            $data = Enterprise::whereBetween('start_date',[Input::post('start_date'),Input::post('finish_date')])->get();
            return view('enterprise')->with('data',$data);
        }elseif(Input::post('start_date') and !Input::post('finish_date')) {
            $data = Enterprise::whereBetween('start_date',[Input::post('start_date'),date("Y/m/d")])->get();
            return view('enterprise')->with('data',$data);
        } elseif(!Input::post('start_date') and Input::post('finish_date')) {
            $data = Enterprise::whereBetween('start_date',[date("1900/01/01"),Input::post('finish_date')])->get();
            return view('enterprise')->with('data',$data);
        }  else {
            $data = Enterprise::getAllData();
            return view('enterprise')->with('data',$data);
        }
        
    }

    public function showCertificate($name) {
    	$data = Enterprise::where('name',$name)->first();
    	$array_data = explode(',', $data->participants);
    	$participant_data = [];
    	foreach ($array_data as $datas) {
            $participant_data[] = Users::getParticipant($datas);
    	}
    	return view('enterprise_detail')->with('data_detail', $participant_data)
                                  ->with('data', $data);
    }
}
