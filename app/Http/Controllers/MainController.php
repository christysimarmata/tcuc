<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nits;
use App\NitsDetail;
use App\Users;
use DB;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    //
    public function show($academy) {
        $table = DB::table('academy')->where('flag', date("Y"))->where('name', $academy)->first();

        $name_table = $table->table;
        $data = DB::table($name_table)->get();

        if($data->isEmpty()) {
            return view('resultzero')->with('data', $data);
        } else {
            return view('academy')->with('data', $data);
        }
        
    }
    
    public function showDetails($academy, $name) {
        $table = DB::table('academy')->where('flag', date("Y"))->where('name', $academy)->first();
        $detail_table = DB::table('academy_detail')->where('flag', date("Y"))->where('name',$academy)->first();
        $name_table = $table->table;
        $name_detail = $detail_table->table;
        
        $data = DB::table($name_table)->where('name',$name)->first();
        $array_data = explode(',', $data->participants);
        $participant_data = [];
        foreach ($array_data as $datas) {
            $temp = (array) Users::getParticipantFirst($datas);

            $temp_detail = DB::table($name_detail)->where('name', $name)->where('peserta', $datas)->first();
            $temp['participant_status'] = $temp_detail->participant_status;
            $temp['divisi_ketika_sertifikasi'] = $temp_detail->division;
            $participant_data[] = (object) $temp;
        }
        return view('details')->with('data_detail', $participant_data)
                                  ->with('data', $data);
    }

    public function updateShow($academy) {
        $table = DB::table('academy')->where('flag', date("Y"))->where('name', $academy)->first();
        $name_table = $table->table;

      

        if(Input::post('start_date') and Input::post('finish_date')) {
            $data = DB::table($name_table)->where('start_date','>=',Input::post('start_date'))->where('finish_date','<=',Input::post('finish_date'))->get();

            \Log::info($data);
            return view('academy')->with('data',$data);
        } elseif(Input::post('start_date') and !Input::post('finish_date')) {
            $data = DB::table($name_table)->where('start_date','>=',Input::post('start_date'))->where('finish_date','<=','2100/12/12')->get();
            return view('academy')->with('data',$data);
        } elseif(!Input::post('start_date') and Input::post('finish_date')) {
            $data = DB::table($name_table)->where('start_date','>=','1900/12/12')->where('finish_date','<=',Input::post('finish_date'))->get();
            return view('academy')->with('data',$data);
        } else {
            $data = DB::table($name_table)->get();
            return view('academy')->with('data',$data);
        }
        
    }

}
