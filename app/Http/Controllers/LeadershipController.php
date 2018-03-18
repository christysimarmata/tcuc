<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leadership;
use App\Users;
use Illuminate\Support\Facades\Input;

class LeadershipController extends Controller
{
    //
    public function showList() {
    	$data = Leadership::getAllData();
    	return view('leadership')->with('data',$data);
    }

    public function updateList() {
        if(Input::post('start_date') and Input::post('finish_date')) {
            $data = Leadership::whereBetween('start_date',[Input::post('start_date'),Input::post('finish_date')])->get();
            return view('leadership')->with('data',$data);
        } elseif(Input::post('start_date') and !Input::post('finish_date')) {
            $data = Leadership::whereBetween('start_date',[Input::post('start_date'),date("Y/m/d")])->get();
            return view('business')->with('data',$data);
        } elseif(!Input::post('start_date') and Input::post('finish_date')) {
            $data = Leadership::whereBetween('start_date',[date("1900/01/01"),Input::post('finish_date')])->get();
            return view('business')->with('data',$data);
        } else {
            $data = Leadership::getAllData();
            return view('leadership')->with('data',$data);
        }
        
    }

    public function showCertificate($id) {
    	$data = Leadership::where('id',$id)->first();
    	$array_data = explode(',', $data->participants);
    	$participant_data = [];
    	foreach ($array_data as $datas) {
            $participant_data[] = Users::getParticipant($datas);
    	}
    	return view('leadership_detail')->with('data_detail', $participant_data)
                                  ->with('data', $data);
    }
}
