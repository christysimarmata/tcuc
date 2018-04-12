<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\MessageBag;
use App\Login;
use Illuminate\Support\Facades\Input;
use App\Consumer;
use App\Business;
use App\Disp;
use App\Enterprise;
use App\Leadership;
use App\Mobile;
use App\Nits;
use App\Wins;
use App\Users;
use App\MainProgram;
use App\JobFamily;
use Excel;
use Storage;
use DB;

class SettingsController extends Controller
{

    public static function index() {
        $data = DB::table('info')->get();
        $address = $data[0]->address;
        $phone_number = $data[0]->phone_number;
        $email = $data[0]->email;
        $listprogram = DB::table('mainprogram')->get();
        $listfamily = DB::table('jobfamily')->get();
        return view('settings')->with('address', $address)
                               ->with('phone_number', $phone_number)
                               ->with('email', $email)
                               ->with('listprogram', $listprogram)
                               ->with('listfamily', $listfamily);

    }

    public static function indexuser() {
        return view('createuser');
    }

    public static function changeinfo(Request $request) {
        $address = Input::post('faddress');
        $phone_number = Input::post('fphone');
        $email = Input::post('femail');

        DB::table('info')->where('id', '1')->update(['address' => $address, 'phone_number' => $phone_number, 'email' => $email]);
        return redirect('settings')->with('status', 'Changes Succedd !');
    }

    public static function addprogram(Request $request) {
        $added = Input::post('newprogram');

        DB::table('mainprogram')->insert(['name' => $added]);

        return redirect('settings')->with('status', 'Changes Succedd !');
    }

    public static function addfamily(Request $request) {
        $added = Input::post('newfamily');

        DB::table('jobfamily')->insert(['name' => $added]);

        return redirect('settings')->with('status', 'Changes Succedd !');
    }

    public static function deleteprogram(Request $request) {
        $deleted = Input::post('deletedprogram');

        DB::table('mainprogram')->where('name', $deleted)->delete();

        return redirect('settings')->with('status', 'Changes Succedd !');
    }

    public static function deletefamily(Request $request) {
        $deleted = Input::post('deletedfamily');

        DB::table('jobfamily')->where('name', $deleted)->delete();

        return redirect('settings')->with('status', 'Changes Succedd !');
    }
    
    public static function addusersingle(Request $request) {
        $nik = Input::post('fnik');
        $name = Input::post('fname');
        $password = Input::post('fpassword');
        $role = Input::post('frole');
        $email = Input::post('femail');
        $phone = Input::post('fphone');
        $job = Input::post('fjob');
        $division = Input::post('fdivision');

        Users::insert(['nik' => $nik, 'nama' => $name, 'password' => $password, 'role' => $role, 'email' => $email, 'phone_number' => $phone, 'job' => $job, 'division' => $division]);

        return redirect('createuser')->with('status', 'User Added !');

    }

    public static function addusermultiple(Request $request) {
                $avatar = $request->file('participant_excel');     
                $participant_data = Excel::load($avatar,function($reader){

                })->get();       

                $datas = collect($participant_data);
                
                foreach($datas as $data) {
                    Users::insert(['nik' => $data->nik, 'nama' => $data->nama, 'password' => $data->password, 'role' => $data->role, 'email' => $data->email, 'phone_number' => $data->phone_number, 'job' => $data->job, 'division' => $data->division]);
                } 

        return redirect('createuser')->with('status', 'User Added !');

    }

    public static function requestUser() {
        $data = Users::where('status', 'requested')->get();

        return view('request_user')->with('datas', $data);
    }


    public static function createRequest(Request $request) {
        $edited = ($request->fnik);
        Users::where('nik', $edited)->update(['nik' => $request->fnik, 'nama' => $request->fnama, 'password' => $request->fpassword, 'role' => $request->frole, 'email' => $request->femail, 'phone_number' => $request->fphone, 'job' => $request->fjob, 'division' => $request->fdivision, 'status' => 'fix']);

        DB::table('user_fix')->insert(['nik' => $request->fnik, 'nama' => $request->fnama, 'password' => $request->fpassword, 'role' => $request->frole, 'email' => $request->femail, 'phone_number' => $request->fphone, 'job' => $request->fjob, 'division' => $request->fdivision]);
        
        return response()->json();
    }

    public static function deleteRequest(Request $request) {
        $edited = ($request->fnik);
        Users::where('nik', $edited)->update(['status' => 'readonly']);

        return response()->json();
    }
}

?>
