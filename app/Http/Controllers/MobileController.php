<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobile;
use App\Users;
use Illuminate\Support\Facades\Input;

class MobileController extends Controller
{
    //
    public function showList() {
    	$data = Mobile::getAllData();
    	return view('mobile')->with('data',$data);
    }

    public function updateList() {
        if(Input::post('start_date') and Input::post('finish_date')) {
            $data = Mobile::whereBetween('start_date',[Input::post('start_date'),Input::post('finish_date')])->get();
            return view('mobile')->with('data',$data);
        }elseif(Input::post('start_date') and !Input::post('finish_date')) {
            $data = Mobile::whereBetween('start_date',[Input::post('start_date'),date("Y/m/d")])->get();
            return view('mobile')->with('data',$data);
        } elseif(!Input::post('start_date') and Input::post('finish_date')) {
            $data = Mobile::whereBetween('start_date',[date("1900/01/01"),Input::post('finish_date')])->get();
            return view('mobile')->with('data',$data);
        }  else {
            $data = Mobile::getAllData();
            return view('mobile')->with('data',$data);
        }
        
    }

    public function showCertificate($name) {
    	$data = Mobile::where('name',$name)->first();
    	$array_data = explode(',', $data->participants);
    	$participant_data = [];
    	foreach ($array_data as $datas) {
            $participant_data[] = Users::getParticipant($datas);
    	}
    	return view('mobile_detail')->with('data_detail', $participant_data)
                                  ->with('data', $data);
    }
}
