<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Help;
use DB;

class HelpController extends Controller
{
    //
    public function showContact() {
      $temp = Help::getAllData();
      \Log::info($temp);


    	$academi = DB::table('academy')->where('flag', date("Y"))->get();

      $datas = [];
      foreach($academi as $data) {
        $datas[$data->name][] = $data->name;
        $temp_user = Users::where('nik', $data->niklde)->first();
        $datas[$data->name][] = $temp_user->avatar;
        $datas[$data->name][] = $temp_user->nama;
        $datas[$data->name][] = $temp_user->nik;
        $datas[$data->name][] = $temp_user->email;
        $datas[$data->name][] = $temp_user->phone_number;
      }

      return view('help')->with('datas', $datas);


    }

    
}
