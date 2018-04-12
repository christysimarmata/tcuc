<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\BusinessDetail;
use App\Users;
use Illuminate\Support\Facades\Input;

class BusinessController extends Controller
{
    //
    public function showList() {
    	$data = Business::getAllData();
    	return view('business')->with('data',$data);
    }

    public function updateList() {
        if(Input::post('start_date') and Input::post('finish_date')) {
            \Log::info('asdasd');
            $data = Business::where('start_date','>=',Input::post('start_date'))->where('finish_date','<=',Input::post('finish_date'))->get();
            return view('Business')->with('data',$data);
        } elseif(Input::post('start_date') and !Input::post('finish_date')) {
            $data = Business::where('start_date','>=',Input::post('start_date'))->where('finish_date','<=','2100/12/12')->get();
            return view('Business')->with('data',$data);
        } elseif(!Input::post('start_date') and Input::post('finish_date')) {
            $data = Business::where('start_date','>=','1900/12/12')->where('finish_date','<=',Input::post('finish_date'))->get();
            return view('Business')->with('data',$data);
        } else {
            $data = Business::getAllData();
            return view('Business')->with('data',$data);
        }
    }

    public function showCertificate($name) {
    	$data = Business::where('name',$name)->first();
    	$array_data = explode(',', $data->participants);
    	$participant_data = [];
    	foreach ($array_data as $datas) {
            $temp = (array) Users::getParticipantFirst($datas);

            $temp_detail = BusinessDetail::where('name', $name)->where('peserta', $datas)->first();
            $temp['ubpp'] = $temp_detail['ubpp'];
            $temp['participant_status'] = $temp_detail['participant_status'];
            $participant_data[] = (object) $temp;
        }
        return view('nits_detail')->with('data_detail', $participant_data)
                                  ->with('data', $data);
    }
}
