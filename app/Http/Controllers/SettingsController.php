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
use App\ConsumerDetail;
use App\BusinessDetail;
use App\DispDetail;
use App\EnterpriseDetail;
use App\LeadershipDetail;
use App\MobileDetail;
use App\NitsDetail;
use App\WinsDetail;
use App\Users;
use App\UserFix;
use App\MainProgram;
use App\JobFamily;
use App\Help;
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
        $listprogram = DB::table('mainprogram')->where('flag', date("Y"))->get();
        $listfamily = DB::table('jobfamily')->where('flag', date("Y"))->get();
        $listacademy = DB::table('academy')->where('flag', date("Y"))->get();
        return view('settings')->with('address', $address)
                               ->with('phone_number', $phone_number)
                               ->with('email', $email)
                               ->with('listprogram', $listprogram)
                               ->with('listfamily', $listfamily)
                               ->with('listacademy', $listacademy);

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

    public static function createprogram(Request $request) {
        $program = $request->fprogram;
        if(DB::table('mainprogram')->where('flag', date("Y"))->exists()) {
            DB::table('mainprogram')->insert(['flag' => date("Y"), 'name' => $program]);
        } else {
            $listbefore = DB::table('mainprogram')->where('flag', date("Y")-1)->pluck('name');
            DB::table('mainprogram')->insert(['flag' => date("Y"), 'name' => $program]);
            foreach($listbefore as $data) {
                DB::table('mainprogram')->insert(['flag' => date("Y"), 'name' => $data]);
            }
        }
        return response()->json();

    }

    public static function deleteprogram(Request $request) {
        $deleted = $request->fprogram;
        DB::table('mainprogram')->where('flag', date("Y"))->where('name', $deleted)->delete();

        return response()->json();
    }

    public static function createfamily(Request $request) {
        $family = $request->ffamily;
        if(DB::table('jobfamily')->where('flag', date("Y"))->exists()) {
            DB::table('jobfamily')->insert(['flag' => date("Y"), 'name' => $family]);
        } else {
            $listbefore = DB::table('jobfamily')->where('flag', date("Y")-1)->pluck('name');
            DB::table('jobfamily')->insert(['flag' => date("Y"), 'name' => $family]);
            foreach($listbefore as $data) {
                DB::table('jobfamily')->insert(['flag' => date("Y"), 'name' => $data]);
            }
        }
        return response()->json();

    }

    public static function deletefamily(Request $request) {
        $deleted = $request->ffamily;
        DB::table('jobfamily')->where('flag', date("Y"))->where('name', $deleted)->delete();

        return response()->json();
    }

    public static function createacademy(Request $request) {
        $academy = $request->facademy;
        if(DB::table('academy')->where('flag', date("Y"))->exists()) {
            DB::table('academy')->insert(['flag' => date("Y"), 'name' => $academy]);
        } else {
            $listbefore = DB::table('academy')->where('flag', date("Y")-1)->pluck('name');
            DB::table('academy')->insert(['flag' => date("Y"), 'name' => $academy]);
            foreach($listbefore as $data) {
                DB::table('academy')->insert(['flag' => date("Y"), 'name' => $data]);
            }
        }
        return response()->json();

    }

    public static function deleteacademy(Request $request) {
        $deleted = $request->facademy;
        DB::table('academy')->where('flag', date("Y"))->where('name', $deleted)->delete();

        return response()->json();
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

        if(UserFix::where('nik', $nik)->exists()) {
            Users::where('nik', $nik)->update(['nik' => $nik, 'nama' => $name, 'password' => $password, 'role' => $role, 'email' => $email, 'phone_number' => $phone, 'job' => $job, 'division' => $division, 'status' => 'fix']);

            UserFix::where('nik', $nik)->update(['nik' => $nik, 'nama' => $name, 'password' => $password, 'role' => $role, 'email' => $email, 'phone_number' => $phone, 'job' => $job, 'division' => $division ]);
        } else {
            Users::insert(['nik' => $nik, 'nama' => $name, 'password' => $password, 'role' => $role, 'email' => $email, 'phone_number' => $phone, 'job' => $job, 'division' => $division, 'status' => 'fix' ]);

            UserFix::insert(['nik' => $nik, 'nama' => $name, 'password' => $password, 'role' => $role, 'email' => $email, 'phone_number' => $phone, 'job' => $job, 'division' => $division ]);

        }
        
        return redirect('createuser')->with('status', 'User Added !');

    }

    public static function addusermultiple(Request $request) {
                $avatar = $request->file('participant_excel');     
                $participant_data = Excel::load($avatar,function($reader){

                })->get();       

                $datas = collect($participant_data);
                
                foreach($datas as $data) {
                    if(UserFix::where('nik', $data->nik)->exists()) {
                    Users::where('nik', $data->nik)->update(['nik' => $data->nik, 'nama' => $data->nama, 'password' => $data->password, 'role' => $data->role, 'email' => $data->email, 'phone_number' => $data->phone_number, 'job' => $data->job, 'division' => $data->division, 'status' => 'fix']);

                    UserFix::where('nik', $data->nik)->update(['nik' => $data->nik, 'nama' => $data->nama, 'password' => $data->password, 'role' => $data->role, 'email' => $data->email, 'phone_number' => $data->phone_number, 'job' => $data->job, 'division' => $data->division]);
                    } else {
                        Users::insert(['nik' => $data->nik, 'nama' => $data->nama, 'password' => $data->password, 'role' => $data->role, 'email' => $data->email, 'phone_number' => $data->phone_number, 'job' => $data->job, 'division' => $data->division, 'status' => 'fix' ]);

                        UserFix::insert(['nik' => $data->nik, 'nama' => $data->nama, 'password' => $data->password, 'role' => $data->role, 'email' => $data->email, 'phone_number' => $data->phone_number, 'job' => $data->job, 'division' => $data->division ]);
                    }
                } 

        return redirect('createuser')->with('status', 'User Added !');

    }

    public static function addcertificatemultiple(Request $request) {
                $avatar = $request->file('certificate_excel');     
                $participant_data = Excel::load($avatar,function($reader){

                })->get();       

                $datas = collect($participant_data);
                $x = 0;
                while($x < count($datas)) {

                    $temp = $datas[$x]->certification_name;
                    $y = $x;
                    $list_participant = [];

                    $bool = '1';
                    while($y < count($datas) && $bool == '1') {
                        if($datas[$y]->certification_name == $temp) {
                            $list_participant[] = $datas[$y]->nik;
                            if(Users::where('nik', $datas[$y])->exists()) {
                                Users::where('nik', $datas[$y])->update(['nama' => $datas[$y]->name, 'role' => 'user', 'email' => $datas[$y]->email, 'phone_number' => $datas[$y]->phone_number, 'job' => $datas[$y]->job_position]);
                            } else {
                                Users::insert(['nik' => $datas[$y]->nik, 'nama' => $datas[$y]->name, 'role' => 'user', 'password' => 'password', 'email' => $datas[$y]->email, 'phone_number' => $datas[$y]->phone_number, 'job' => $datas[$y]->job_position, 'division' => $datas[$y]->division, 'status' => 'readonly']);
                            }


                            if($datas[$x]->academy == 'NITS') {
                                NitsDetail::insert(['name' => $datas[$x]->certification_name, 'job_family' => $datas[$x]->job_family, 'peserta' => $datas[$y]->nik, 'participant_status' => $datas[$y]->participant_status, 'division' => $datas[$y]->division]); 
                            } elseif($datas[$x]->academy == 'Business Enabler') {
                                BusinessDetail::insert(['name' => $datas[$x]->certification_name, 'job_family' => $datas[$x]->job_family, 'peserta' => $datas[$y]->nik, 'participant_status' => $datas[$y]->participant_status, 'division' => $datas[$y]->division]); 
                            } elseif($datas[$x]->academy == 'Consumer') {
                                ConsumerDetail::insert(['name' => $datas[$x]->certification_name, 'job_family' => $datas[$x]->job_family, 'peserta' => $datas[$y]->nik, 'participant_status' => $datas[$y]->participant_status, 'division' => $datas[$y]->division]); 
                            } elseif($datas[$x]->academy == 'DISP') {
                                DispDetail::insert(['name' => $datas[$x]->certification_name, 'job_family' => $datas[$x]->job_family, 'peserta' => $datas[$y]->nik, 'participant_status' => $datas[$y]->participant_status, 'division' => $datas[$y]->division]); 
                            } elseif($datas[$x]->academy == 'Enterprise') {
                                EnterpriseDetail::insert(['name' => $datas[$x]->certification_name, 'job_family' => $datas[$x]->job_family, 'peserta' => $datas[$y]->nik, 'participant_status' => $datas[$y]->participant_status, 'division' => $datas[$y]->division]); 
                            } elseif($datas[$x]->academy == 'Leadership') {
                                LeadershipDetail::insert(['name' => $datas[$x]->certification_name, 'job_family' => $datas[$x]->job_family, 'peserta' => $datas[$y]->nik, 'participant_status' => $datas[$y]->participant_status, 'division' => $datas[$y]->division]); 
                            } elseif($datas[$x]->academy == 'Mobile') {
                                MobileDetail::insert(['name' => $datas[$x]->certification_name, 'job_family' => $datas[$x]->job_family, 'peserta' => $datas[$y]->nik, 'participant_status' => $datas[$y]->participant_status, 'division' => $datas[$y]->division]); 
                            } elseif($datas[$x]->academy == 'WINS') {
                                WinsDetail::insert(['name' => $datas[$x]->certification_name, 'job_family' => $datas[$x]->job_family, 'peserta' => $datas[$y]->nik, 'participant_status' => $datas[$y]->participant_status, 'division' => $datas[$y]->division]); 
                            }
                            
                            $y++;
                        } else {
                            $bool = '0';
                        }
   
                    }
                    $participantdata = implode(',', $list_participant);
                    
                    if($datas[$x]->academy == 'NITS') {
                        Nits::insert(['name' => $datas[$x]->certification_name, 'start_date' => $datas[$x]->start_date, 'finish_date' => $datas[$x]->finish_date, 'location' => $datas[$x]->location, 'academy' => $datas[$x]->academy, 'institution' => $datas[$x]->certification_institution, 'category' => $datas[$x]->category, 'internal' => $datas[$x]->internal, 'cfu_fu' => $datas[$x]->cfufu, 'level' => $datas[$x]->certification_level, 'outline' => $datas[$x]->outline, 'telkom_main' => $datas[$x]->telkom_main, 'job_family' => $datas[$x]->job_family, 'participants' => $participantdata, 'released_date' => $datas[$x]->released_date, 'expired_at' => $datas[$x]->expired_at, 'status' => 'complete']);
                    } elseif($datas[$x]->academy == 'Business Enabler') {
                        Business::insert(['name' => $datas[$x]->certification_name, 'start_date' => $datas[$x]->start_date, 'finish_date' => $datas[$x]->finish_date, 'location' => $datas[$x]->location, 'academy' => $datas[$x]->academy, 'institution' => $datas[$x]->certification_institution, 'category' => $datas[$x]->category, 'internal' => $datas[$x]->internal, 'cfu_fu' => $datas[$x]->cfufu, 'level' => $datas[$x]->certification_level, 'outline' => $datas[$x]->outline, 'telkom_main' => $datas[$x]->telkom_main, 'job_family' => $datas[$x]->job_family, 'participants' => $participantdata, 'released_date' => $datas[$x]->released_date, 'expired_at' => $datas[$x]->expired_at, 'status' => 'complete']);
                    } elseif($datas[$x]->academy == 'Consumer') {
                        Consumer::insert(['name' => $datas[$x]->certification_name, 'start_date' => $datas[$x]->start_date, 'finish_date' => $datas[$x]->finish_date, 'location' => $datas[$x]->location, 'academy' => $datas[$x]->academy, 'institution' => $datas[$x]->certification_institution, 'category' => $datas[$x]->category, 'internal' => $datas[$x]->internal, 'cfu_fu' => $datas[$x]->cfufu, 'level' => $datas[$x]->certification_level, 'outline' => $datas[$x]->outline, 'telkom_main' => $datas[$x]->telkom_main, 'job_family' => $datas[$x]->job_family, 'participants' => $participantdata, 'released_date' => $datas[$x]->released_date, 'expired_at' => $datas[$x]->expired_at, 'status' => 'complete']);
                    } elseif($datas[$x]->academy == 'DISP') {
                        Disp::insert(['name' => $datas[$x]->certification_name, 'start_date' => $datas[$x]->start_date, 'finish_date' => $datas[$x]->finish_date, 'location' => $datas[$x]->location, 'academy' => $datas[$x]->academy, 'institution' => $datas[$x]->certification_institution, 'category' => $datas[$x]->category, 'internal' => $datas[$x]->internal, 'cfu_fu' => $datas[$x]->cfufu, 'level' => $datas[$x]->certification_level, 'outline' => $datas[$x]->outline, 'telkom_main' => $datas[$x]->telkom_main, 'job_family' => $datas[$x]->job_family, 'participants' => $participantdata, 'released_date' => $datas[$x]->released_date, 'expired_at' => $datas[$x]->expired_at, 'status' => 'complete']);
                    } elseif($datas[$x]->academy == 'Enterprise') {
                        Enterprise::insert(['name' => $datas[$x]->certification_name, 'start_date' => $datas[$x]->start_date, 'finish_date' => $datas[$x]->finish_date, 'location' => $datas[$x]->location, 'academy' => $datas[$x]->academy, 'institution' => $datas[$x]->certification_institution, 'category' => $datas[$x]->category, 'internal' => $datas[$x]->internal, 'cfu_fu' => $datas[$x]->cfufu, 'level' => $datas[$x]->certification_level, 'outline' => $datas[$x]->outline, 'telkom_main' => $datas[$x]->telkom_main, 'job_family' => $datas[$x]->job_family, 'participants' => $participantdata, 'released_date' => $datas[$x]->released_date, 'expired_at' => $datas[$x]->expired_at, 'status' => 'complete']);
                    } elseif($datas[$x]->academy == 'Leadership') {
                        Leadership::insert(['name' => $datas[$x]->certification_name, 'start_date' => $datas[$x]->start_date, 'finish_date' => $datas[$x]->finish_date, 'location' => $datas[$x]->location, 'academy' => $datas[$x]->academy, 'institution' => $datas[$x]->certification_institution, 'category' => $datas[$x]->category, 'internal' => $datas[$x]->internal, 'cfu_fu' => $datas[$x]->cfufu, 'level' => $datas[$x]->certification_level, 'outline' => $datas[$x]->outline, 'telkom_main' => $datas[$x]->telkom_main, 'job_family' => $datas[$x]->job_family, 'participants' => $participantdata, 'released_date' => $datas[$x]->released_date, 'expired_at' => $datas[$x]->expired_at, 'status' => 'complete']);
                    } elseif($datas[$x]->academy == 'Mobile') {
                        Mobile::insert(['name' => $datas[$x]->certification_name, 'start_date' => $datas[$x]->start_date, 'finish_date' => $datas[$x]->finish_date, 'location' => $datas[$x]->location, 'academy' => $datas[$x]->academy, 'institution' => $datas[$x]->certification_institution, 'category' => $datas[$x]->category, 'internal' => $datas[$x]->internal, 'cfu_fu' => $datas[$x]->cfufu, 'level' => $datas[$x]->certification_level, 'outline' => $datas[$x]->outline, 'telkom_main' => $datas[$x]->telkom_main, 'job_family' => $datas[$x]->job_family, 'participants' => $participantdata, 'released_date' => $datas[$x]->released_date, 'expired_at' => $datas[$x]->expired_at, 'status' => 'complete']);
                    } elseif($datas[$x]->academy == 'WINS') {
                        Wins::insert(['name' => $datas[$x]->certification_name, 'start_date' => $datas[$x]->start_date, 'finish_date' => $datas[$x]->finish_date, 'location' => $datas[$x]->location, 'academy' => $datas[$x]->academy, 'institution' => $datas[$x]->certification_institution, 'category' => $datas[$x]->category, 'internal' => $datas[$x]->internal, 'cfu_fu' => $datas[$x]->cfufu, 'level' => $datas[$x]->certification_level, 'outline' => $datas[$x]->outline, 'telkom_main' => $datas[$x]->telkom_main, 'job_family' => $datas[$x]->job_family, 'participants' => $participantdata, 'released_date' => $datas[$x]->released_date, 'expired_at' => $datas[$x]->expired_at, 'status' => 'complete']);
                    }
                    $x = $y;
                }
                

        return redirect('createuser')->with('status', 'Certificate Added !');

    }

    public static function requestUser() {
        $data = Users::where('status', 'readonly')->get();

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
        Users::where('nik', $edited)->update(['status' => 'fix']);

        return response()->json();
    }

    public static function edithelp() {
        $datas = Help::getAllData();

        return view('edit_help')->with('datas', $datas);
    }

    public static function changeHelp(Request $request) {
        $academy = $request->facademy;
        $nik = $request->fnik;

        if(UserFix::where('nik', $nik)->exists()) {
            Help::where('academy', $academy)->update(['nik' => $nik]);
            return response()->json();
        } else {
            die(header("HTTP/1.0 404 Not Found"));
        }
    }
}

?>
