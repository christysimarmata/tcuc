<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
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
use Schema;

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
        $niklde = $request->fniklde;
        $niknonlde = $request->fniknonlde;
        $academy_table = strtolower(str_replace(' ', '_', $academy));
        $academy_detail = ''.strtolower(str_replace(' ', '_', $academy)).'_detail';

        if(DB::table('academy')->where('flag', date("Y"))->exists()) {
            DB::table('academy')->insert(['flag' => date("Y"), 'name' => $academy, 'table' => $academy_table, 'table_detail' => $academy_detail, 'niklde' => $niklde, 'niknonlde' => $niknonlde]);
            DB::table('academy_detail')->insert(['flag' => date("Y"), 'name' => $academy, 'table' => $academy_detail]);

            Schema::create($academy_table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->date('start_date');
                $table->date('finish_date');
                $table->string('location');
                $table->string('academy');
                $table->string('institution')->nullable();
                $table->string('category')->nullable();
                $table->string('internal')->nullable();
                $table->string('cfu_fu')->nullable();
                $table->string('level')->nullable();
                $table->text('outline')->nullable();
                $table->string('telkom_main')->nullable();
                $table->string('job_family')->nullable();
                $table->text('participants')->nullable();
                $table->date('released_date')->nullable();
                $table->date('expired_at')->nullable();
                $table->string('filename')->nullable();
                $table->string('status')->nullable();
                $table->timestamps();
            });

            Schema::create($academy_detail, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('job_family')->nullable();
                $table->string('peserta')->nullable();
                $table->string('participant_status')->nullable();
                $table->string('division')->nullable();
                $table->string('file_name')->nullable();
                $table->timestamps();
            });

            

        } else {
            $listbefore = DB::table('academy')->where('flag', date("Y")-1)->get();
            DB::table('academy')->insert(['flag' => date("Y"), 'name' => $academy, 'table' => $academy_table, 'niklde' => $niklde, 'niknonlde' => $niknonlde]);
            foreach($listbefore as $data) {
                $temp_name = strtolower(str_replace(' ', '_', $data->name));
                $temp_detail_name = ''.strtolower(str_replace(' ', '_', $data->name)).'_detail';
                DB::table('academy')->insert(['flag' => date("Y"), 'name' => $data->name, 'table' => $temp_name, 'table_detail' => $temp_detail_name, 'niklde' => $data->niklde, 'niknonlde' => $data->niknonlde]);
                DB::table('academy_detail')->insert(['flag' => date("Y"), 'name' => $data, 'table' => $temp_detail_name]);
            }

            Schema::create($academy_table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->date('start_date');
                $table->date('finish_date');
                $table->string('location');
                $table->string('academy');
                $table->string('institution')->nullable();
                $table->string('category')->nullable();
                $table->string('internal')->nullable();
                $table->string('cfu_fu')->nullable();
                $table->string('level')->nullable();
                $table->text('outline')->nullable();
                $table->string('telkom_main')->nullable();
                $table->string('job_family')->nullable();
                $table->text('participants')->nullable();
                $table->date('released_date')->nullable();
                $table->date('expired_at')->nullable();
                $table->string('filename')->nullable();
                $table->string('status')->nullable();
                $table->timestamps();
            });

            Schema::create($academy_detail, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('job_family')->nullable();
                $table->string('peserta')->nullable();
                $table->string('participant_status')->nullable();
                $table->string('division')->nullable();
                $table->string('file_name')->nullable();
                $table->timestamps();
            });

        }
        $listacademy = DB::table('academy')->where('flag', date("Y"))->pluck('name');
            $listacademy->all();

            session(['listacademy' => $listacademy]);
        return response()->json();

    }

    public static function deleteacademy(Request $request) {
        $deleted = $request->facademy;
        DB::table('academy')->where('flag', date("Y"))->where('name', $deleted)->delete();
        DB::table('academy_detail')->where('flag', date("Y"))->where('name', $deleted)->delete();
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
                $list_table = DB::table('academy')->where('flag', date("Y"))->get();
                $table_main;
                $table_detail;


                $avatar = $request->file('certificate_excel');     
                $participant_data = Excel::load($avatar,function($reader){

                })->get();       

                $datas = collect($participant_data);
                $x = 0;
                while($x < count($datas)) {

                    foreach($list_table as $list) {
                        if($list->name == $datas[$x]->academy) {
                            $table_main = $list->table;
                            $table_detail = $list->table_detail;
                        }
                    }

                    \Log::info($table_main);
                    \Log::info($table_detail);
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

                            if(DB::table($table_detail)->where('name', $datas[$x]->certification_name)->where('peserta', $datas[$y]->nik)->doesntExist()) {
                                DB::table($table_detail)->insert(['name' => $datas[$x]->certification_name, 'job_family' => $datas[$x]->job_family, 'peserta' => $datas[$y]->nik, 'participant_status' => $datas[$y]->participant_status, 'division' => $datas[$y]->division]);
                            } else {
                                DB::table($table_detail)->where('name', $datas[$x]->certification_name)->where('peserta', $datas[$y]->nik)->update(['job_family' => $datas[$x]->job_family, 'peserta' => $datas[$y]->nik, 'participant_status' => $datas[$y]->participant_status, 'division' => $datas[$y]->division])
                            }
                            
                            $y++;
                        } else {
                            $bool = '0';
                        }
   
                    }
                    $participantdata = implode(',', $list_participant);
                    if(DB::table($table_main)->where('name', $datas[$x]->certification_name)->doesntExist()) {
                    DB::table($table_main)->insert(['name' => $datas[$x]->certification_name, 'start_date' => $datas[$x]->start_date, 'finish_date' => $datas[$x]->finish_date, 'location' => $datas[$x]->location, 'academy' => $datas[$x]->academy, 'institution' => $datas[$x]->certification_institution, 'category' => $datas[$x]->category, 'internal' => $datas[$x]->internal, 'cfu_fu' => $datas[$x]->cfufu, 'level' => $datas[$x]->certification_level, 'outline' => $datas[$x]->outline, 'telkom_main' => $datas[$x]->telkom_main, 'job_family' => $datas[$x]->job_family, 'participants' => $participantdata, 'released_date' => $datas[$x]->released_date, 'expired_at' => $datas[$x]->expired_at, 'status' => 'complete']);
                } else {
                    DB::table($table_main)->where('name', $datas[$x]->certification_name)->update(['start_date' => $datas[$x]->start_date, 'finish_date' => $datas[$x]->finish_date, 'location' => $datas[$x]->location, 'academy' => $datas[$x]->academy, 'institution' => $datas[$x]->certification_institution, 'category' => $datas[$x]->category, 'internal' => $datas[$x]->internal, 'cfu_fu' => $datas[$x]->cfufu, 'level' => $datas[$x]->certification_level, 'outline' => $datas[$x]->outline, 'telkom_main' => $datas[$x]->telkom_main, 'job_family' => $datas[$x]->job_family, 'participants' => $participantdata, 'released_date' => $datas[$x]->released_date, 'expired_at' => $datas[$x]->expired_at, 'status' => 'complete']);
                    $x = $y;
                }
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
