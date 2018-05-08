<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Users;
use App\JobFamily;
use Storage;
use Excel;
use Illuminate\Support\Facades\Input;

class MyCertificationController extends Controller
{
    //
    public static function showCertification() {

    $user = Users::getParticipantFirst(session('userAktif')); 
        $plucked = [];

        $list_table = DB::table('academy')->where('flag', date("Y"))->get();

        $list_table_detail = DB::table('academy_detail')->where('flag', date("Y"))->pluck('table');
        $list_table_detail->all();

          foreach($list_table_detail as $data) {
            $temp_plucked = DB::table($data)->where('peserta', session('userAktif'))->groupBy('job_family')->pluck('job_family');
              foreach($temp_plucked as $dataa) {
                if(!in_array($dataa, $plucked)) {
                  $plucked[] = $dataa;
                }
              }
          }

        $family = [];
        $filee = [];
          foreach($plucked as $plucks) {
            foreach($list_table as $data) {
              if((DB::table($data->table)->where('participants','like','%'.session('userAktif').',%')->where('job_family',$plucks)->get())->isNotEmpty()) {
                $family[$plucks][] = DB::table($data->table)->where('participants','like','%'.session('userAktif').',%')->where('job_family',$plucks)->get();
                $filee[] = DB::table($data->table_detail)->where('job_family', $plucks)->where('peserta', session('userAktif'))->get();
              }
            }
          }  
             
        return view('my_certification')->with('family', $family)
                                     ->with('filee', $filee)
                                     ->with('user', $user);

    }
    
}
