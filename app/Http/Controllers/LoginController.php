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
use App\MainProgram;
use App\JobFamily;
use DB;

class LoginController extends Controller
{

    public static function index() {
        if(session('userAktif')) {
            return redirect('dashboard');
        } else {
            $data = DB::table('info')->get();
            $address = $data[0]->address;
            $phone_number = $data[0]->phone_number;
            $email = $data[0]->email;


            \Log::info($address);

            return view('login')->with('address', $address)
                                ->with('phone_number', $phone_number)
                                ->with('email', $email); 
        }
        
    }

    
    public function doLogin() {
        $list_table = DB::table('academy')->where('flag', date("Y"))->pluck('table');
        $list_table->all();
    	$nik = Input::get('nik');
    	$password = Input::get('password');
            $result = Login::validateLogin($nik, $password);
        	if ($result == 'false') {
                $err = new MessageBag(['failed' => 'Invalid Email and/or Password. Please try again!']);
                return redirect('/');
        	} else {
                $listacademy = DB::table('academy')->where('flag', date("Y"))->pluck('name');
                $listacademy->all();
                $user = Login::getUser($result);
                session(['userAktif' => $user->nik]);
        		session(['idUserAktif' => $result]);
                session(['nama' => $user->nama]);
                session(['email' => $user->email]);
                session(['roleUserAktif' => $user->role]);
                session(['avatarUserAktif' => $user->avatar]);
                session(['listacademy' => $listacademy]);
                session(['idx' => '1']);
        	}


        $totalcertificate = 0;

        foreach($list_table as $table) {
            $totalcertificate = $totalcertificate + DB::table($table)->count();
        }
                

        $totalparticipant = 0;

        foreach($list_table as $table) {
            $temp_table = DB::table($table)->get();
            foreach($temp_table as $data) {
                $totalparticipant = $totalparticipant + count(explode(',',$data->participants));
            }
        }
        
            session(['totalcertificate' => $totalcertificate]);
            session(['totalparticipants' => $totalparticipant]);


        $mainprogram = MainProgram::where('flag', date("Y"))->get();
        foreach($mainprogram as $program) {
            $temp_sum = 0;
            foreach($list_table as $table) {
                $temp_sum = $temp_sum + DB::table($table)->whereYear('start_date', date("Y"))->where('telkom_main', $program->name)->count();
            }
            $programs[] = $temp_sum;
            $labelprogram[] = $program->name;
        }


        $jobfamily = JobFamily::where('flag', date("Y"))->get();
        foreach($jobfamily as $family) {
            $temp_sum = 0;
            foreach($list_table as $table) {
                $temp_sum = $temp_sum + DB::table($table)->whereYear('start_date', date("Y"))->where('job_family', $family->name)->count();
            }
            $families[] = $temp_sum;
            $labelfamily[] = $family->name;
        }

        \Log::info($families);

        $chartprogram = app()->chartjs
        ->name('MainProgram')
        ->type('pie')
        ->size(['width' => 600, 'height' => 300])
        ->labels($labelprogram)
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB', '#58D68D'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB', '#58D68D'],
                'data' => $programs
            ]
        ])
        ->options([]);

        $chartfamily = app()->chartjs
        ->name('JobFamily')
        ->type('bar')
        ->size(['width' => 600, 'height' => 300])
        ->labels($labelfamily)
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB', '#58D68D', '#8E44AD', '#F7DC6F'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB', '#58D68D', '#8E44AD', '#F7DC6F'],
                'data' => $families
            ]
        ])
        ->options([]);



        $chartprogram->optionsRaw([
            'title' => [
                'display' => true,
                'text' => 'Telkom Main Program',
                'fontSize' => 16
            ],
            'legend' => [
                'display' => true,
                'position' => 'bottom',
                'labels' => [
                    'padding' => 12
                ]   
            ]

        ]);

        $chartfamily->optionsRaw([
            'scales' => [
                'yAxes' => [
                        [
                        'ticks' => [
                            'beginAtZero' => true
                        ]
                    ]
                ],
                'xAxes' => [
                        [
                        'ticks' => [
                            'beginAtZero' => true
                        ],
                        'gridLines' => [
                            'color' => 'rgba(0,0,0,0)'
                        ]
                    ]
                ]
            ],
            'legend' => [
                'display' => false,
            ],
            'title' => [
                'display' => true,
                'text' => 'Job Family',
                'fontSize' => 16
            ]
        ]);

        session(['listprogram' => $labelprogram]);
        session(['listfamily' => $labelfamily]);
        session(['chartfamily' => $chartfamily]);
        session(['chartprogram' => $chartprogram]);

            $roleUser = Login::validateUser($nik, $password);
            return view('dashboard');
        }

    public function getAllCertification() {
        $list_table = DB::table('academy')->where('flag', date("Y"))->get();
        $all = [];
            foreach($list_table as $data) {
                $all[] = DB::table($data->table)->get();   
            }
        return view('allcertification')->with('data', $all);
    }

    public static function updateByDate(Request $request) {
        $list_table = DB::table('academy')->where('flag', date("Y"))->get();
        if(Input::post('start_date') && Input::post('finish_date')) {
            $start = Input::post('start_date');
            $finish = Input::post('finish_date');
        } elseif(Input::post('start_date') && !Input::post('finish_date')) {
            $start = Input::post('start_date');
            $finish = '2100/12/12';
        } elseif(!Input::post('start_date') && Input::post('finish_date')) {
            $start = '1900/12/12';
            $finish = Input::post('finish_date');
        } else {
            $start = '1900/12/12';
            $finish = '2100/12/12';       
        }

        $all = [];
            foreach($list_table as $data) {
                $all[] = DB::table($data->table)->where('start_date','>=', $start)
                                                ->where('finish_date', '<=', $finish)
                                                ->get();
            }
        return view('allcertification')->with('data', $all);
    }

    public static function getAllParticipant() {
        $list_table = DB::table('academy')->where('flag', date("Y"))->get();
        $list = DB::table('academy')->where('flag', date("Y"))->pluck('name');
        $list->all();
        $all = [];
        foreach($list_table as $data) {
            $all[$data->name] = DB::table($data->table)->get();
        }

        $par_academy = [];
        

        foreach($list_table as $academy) {
            foreach($all[$academy->name] as $data) {
                $temp_participant = $data->participants;
                $temp_data = explode(',', $temp_participant);

                foreach($temp_data as $datas) {
                    $temp = (array) Users::getParticipantFirst($datas);
                    $temp_detail = (array) DB::table($academy->table_detail)->where('name', $data->name)->where('peserta', $datas)->first();
                    $temp['participant_status'] = $temp_detail['participant_status'];
                    $temp['divisi_ketika_sertifikasi'] = $temp_detail['division'];
                    $par_academy[$data->name][] = (object) $temp;
                }
            }
        }

        \Log::info($all);
        return view('allparticipant')->with('data', $all)
                                       ->with('paracademy', $par_academy)
                                       ->with('list', $list);
    }


    public static function advanceSearch() {
        $all = [];
        if(isset($_GET['filter'])) {
            $name = Input::get('fname');
            $academy = Input::get('facademy');
            $location = Input::get('flocation');
            $program = Input::get('fprogram');
            $family = Input::get('ffamily');

          
            if($academy != "") {
                $table = DB::table('academy')->where('flag', date("Y"))->where('name', $academy)->first();
                $all[] = DB::table($table->table)->where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
            } else {
                $list_table = DB::table('academy')->where('flag', date("Y"))->pluck('name');
                $list_table->all();

                foreach($list_table as $table) {
                    $all[] = DB::table($table)->where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
                }
            }
            
            
            
            if(count($all) === 0) {
                return redirect('dashboard')->with('status', 'No Certification Found!');
            }else {
                return view('resultsearch')->with('data', $all);
            }
        }
        else {
            return redirect('dashboard');
        }
    }


}

?>
