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
    	$nik = Input::get('nik');
    	$password = Input::get('password');
            $result = Login::validateLogin($nik, $password);
        	if ($result == 'false') {
                $err = new MessageBag(['failed' => 'Invalid Email and/or Password. Please try again!']);
                return redirect('/');
        	} else {
                $user = Login::getUser($result);
                session(['userAktif' => $user->nik]);
        		session(['idUserAktif' => $result]);
                session(['nama' => $user->nama]);
                session(['email' => $user->email]);
                session(['roleUserAktif' => $user->role]);
                session(['avatarUserAktif' => $user->avatar]);
                session(['idx' => '1']);
        	}

        $totalcertificate = Nits::count() + Consumer::count() + Disp::count() + Wins::count() + Mobile::count() + Enterprise::count() + Business::count() + Leadership::count();
                

        $totalnits = 0;
        $totalconsumer = 0;
        $totalbusiness = 0;
        $totaldisp = 0;
        $totalmobile = 0;
        $totalenterprise = 0;
        $totalleadership = 0;
        $totalwins = 0;

        $tnits = Nits::getAllData();
        foreach($tnits as $nits) {
            $totalnits = $totalnits + count(explode(',',$nits->participants));
        }

        $tconsumer = Consumer::getAllData();
        foreach($tconsumer as $consumer) {
            $totalconsumer = $totalconsumer + count(explode(',',$consumer->participants));
        }

        $tbusiness = Business::getAllData();
        foreach($tbusiness as $business) {
            $totalbusiness = $totalbusiness + count(explode(',',$business->participants));
        }

        $tdisp = Disp::getAllData();
        foreach($tdisp as $disp) {
            $totaldisp = $totaldisp + count(explode(',',$disp->participants));
        }

        $tmobile = Mobile::getAllData();
        foreach($tmobile as $mobile) {
            $totalmobile = $totalmobile + count(explode(',',$mobile->participants));
        }

        $tleadership = Leadership::getAllData();
        foreach($tleadership as $leadership) {
            $totalleadership = $totalleadership + count(explode(',',$leadership->participants));
        }

        $twins = Wins::getAllData();
        foreach($twins as $wins) {
            $totalwins = $totalwins + count(explode(',',$wins->participants));
        }

        $tenterprise = Enterprise::getAllData();
        foreach($tenterprise as $enterprise) {
            $totalenterprise = $totalenterprise + count(explode(',',$enterprise->participants));
        }
            $totalparticipants = $totalnits + $totalconsumer+$totalbusiness+$totaldisp+$totalmobile+$totalenterprise+$totalleadership+$totalwins;

            session(['totalcertificate' => $totalcertificate]);
            session(['totalparticipants' => $totalparticipants]);


        $mainprogram = MainProgram::get();
        foreach($mainprogram as $program) {
            $programs[$program->name] = Nits::getTotalByProgram($program->name) + Consumer::getTotalByProgram($program->name) + Business::getTotalByProgram($program->name) + Disp::getTotalByProgram($program->name) + Mobile::getTotalByProgram($program->name) + Enterprise::getTotalByProgram($program->name) + Leadership::getTotalByProgram($program->name) + Wins::getTotalByProgram($program->name);

            $labelprogram[] = $program->name;
        }

        $jobfamily = JobFamily::get();
        foreach($jobfamily as $family) {
            $families[$family->name] = Nits::getTotalByFamily($family->name) + Consumer::getTotalByFamily($family->name) + Business::getTotalByFamily($family->name) + Disp::getTotalByFamily($family->name) + Wins::getTotalByFamily($family->name) + Mobile::getTotalByFamily($family->name) + Leadership::getTotalByFamily($family->name) + Enterprise::getTotalByFamily($family->name); 
        
            $labelfamily[] = $family->name;
        }

        $chartprogram = app()->chartjs
        ->name('MainProgram')
        ->type('pie')
        ->size(['width' => 600, 'height' => 300])
        ->labels($labelprogram)
        ->datasets([
            [
                'backgroundColor' => ['#FF6384', '#36A2EB', '#58D68D'],
                'hoverBackgroundColor' => ['#FF6384', '#36A2EB', '#58D68D'],
                'data' => [$programs[$labelprogram[0]],$programs[$labelprogram[1]],$programs[$labelprogram[2]]]
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
                'data' => [$families[$labelfamily[0]],$families[$labelfamily[1]],$families[$labelfamily[2]],$families[$labelfamily[3]],$families[$labelfamily[4]]]
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
        $all = [];
        $all[] = Nits::getAllData();
        $all[] = Consumer::getAllData();
        $all[] = Disp::getAllData();
        $all[] = Wins::getAllData();
        $all[] = Mobile::getAllData();
        $all[] = Enterprise::getAllData();
        $all[] = Business::getAllData();
        $all[] = Leadership::getAllData();

        

        return view('allcertification')->with('data', $all);
    }

    public static function updateByDate(Request $request) {
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
        $all[] = Nits::getByDate($start, $finish);
        $all[] = Consumer::getByDate($start, $finish);
        $all[] = Disp::getByDate($start, $finish);
        $all[] = Wins::getByDate($start, $finish);
        $all[] = Mobile::getByDate($start, $finish);
        $all[] = Enterprise::getByDate($start, $finish);
        $all[] = Business::getByDate($start, $finish);
        $all[] = Leadership::getByDate($start, $finish);

        return view('allcertification')->with('data', $all);
    }

    public static function getAllParticipant() {
        $all = [];
        $all['nits'] = Nits::getAllData();
        $all['consumer'] = Consumer::getAllData();
        $all['disp'] = Disp::getAllData();
        $all['wins'] = Wins::getAllData();
        $all['mobile'] = Mobile::getAllData();
        $all['enterprise'] = Enterprise::getAllData();
        $all['business'] = Business::getAllData();
        $all['leadership'] = Leadership::getAllData();

        $par_nits = [];
        $par_consumer = [];
        $par_disp = [];
        $par_wins = [];
        $par_mobile = [];
        $par_enterprise = [];
        $par_business = [];
        $par_leadership = [];

        foreach($all['nits'] as $nits) {
            $participant_nits = $nits->participants;
            $data_nits = explode(',', $participant_nits);
            
            foreach($data_nits as $data) {
                $temp = (array) Users::getParticipantFirst($data);
                $temp_detail = NitsDetail::where('name', $nits->name)->where('peserta', $data)->first();
                $temp['participant_status'] = $temp_detail['participant_status'];
                $par_nits[$nits->name][] = (object) $temp;
            }

        }

        foreach($all['consumer'] as $consumer) {
            $participant_consumer = $consumer->participants;
            $data_consumer = explode(',', $participant_consumer);

            foreach($data_consumer as $data) {
                $temp = (array) Users::getParticipantFirst($data);
                $temp_detail = ConsumerDetail::where('name', $consumer->name)->where('peserta', $data)->first();
                $temp['participant_status'] = $temp_detail['participant_status'];

                $par_consumer[$consumer->name][] = (object) $temp;
            }

        }

        foreach($all['disp'] as $disp) {
            $participant_disp = $disp->participants;
            $data_disp = explode(',', $participant_disp);

            foreach($data_disp as $data) {
                $temp = (array) Users::getParticipantFirst($data);
                $temp_detail = DispDetail::where('name', $disp->name)->where('peserta', $data)->first();
                $temp['participant_status'] = $temp_detail['participant_status'];
                $par_disp[$disp->name][] = (object) $temp;
            }

        }

        foreach($all['wins'] as $wins) {
            $participant_wins = $wins->participants;
            $data_wins = explode(',', $participant_wins);

            foreach($data_wins as $data) {
                $temp = (array) Users::getParticipantFirst($data);
                $temp_detail = WinsDetail::where('name', $wins->name)->where('peserta', $data)->first();
                $temp['participant_status'] = $temp_detail['participant_status'];
                $par_wins[$wins->name][] = (object) $temp;
            }

        }

        foreach($all['mobile'] as $mobile) {
            $participant_mobile = $mobile->participants;
            $data_mobile = explode(',', $participant_mobile);

            foreach($data_mobile as $data) {
                $temp = (array) Users::getParticipantFirst($data);
                $temp_detail = MobileDetail::where('name', $mobile->name)->where('peserta', $data)->first();
                $temp['participant_status'] = $temp_detail['participant_status'];
                $par_mobile[$mobile->name][] = (object) $temp;
            }

        }

        foreach($all['business'] as $business) {
            $participant_business = $business->participants;
            $data_business = explode(',', $participant_business);

            foreach($data_business as $data) {
                $temp = (array) Users::getParticipantFirst($data);
                $temp_detail = BusinessDetail::where('name', $business->name)->where('peserta', $data)->first();
                $temp['participant_status'] = $temp_detail['participant_status'];
                $par_business[$business->name][] = (object) $temp;
            }

        }

        foreach($all['enterprise'] as $enterprise) {
            $participant_enterprise = $enterprise->participants;
            $data_enterprise = explode(',', $participant_enterprise);

            foreach($data_enterprise as $data) {
                $temp = (array) Users::getParticipantFirst($data);
                $temp_detail = EnterpriseDetail::where('name', $enterprise->name)->where('peserta', $data)->first();
                $temp['participant_status'] = $temp_detail['participant_status'];
                $par_enterprise[$enterprise->name][] = (object) $temp;
            }

        }

        foreach($all['leadership'] as $leadership) {
            $participant_leadership = $leadership->participants;
            $data_leadership = explode(',', $participant_leadership);

            foreach($data_leadership as $data) {
                $temp = (array) Users::getParticipantFirst($data);
                $temp_detail = LeadershipDetail::where('name', $leadership->name)->where('peserta', $data)->first();
                $temp['participant_status'] = $temp_detail['participant_status'];
                $par_leadership[$leadership->name][] = (object) $temp;
            }

        }


        return view('allparticipant')->with('datanits', $all['nits'])
                                       ->with('dataconsumer', $all['consumer'])
                                       ->with('datadisp', $all['disp'])
                                       ->with('datawins', $all['wins'])
                                       ->with('datamobile', $all['mobile'])
                                       ->with('databusiness', $all['business'])
                                       ->with('dataenterprise', $all['enterprise'])
                                       ->with('dataleadership', $all['leadership'])
                                       ->with('parnits', $par_nits)
                                       ->with('parconsumer', $par_consumer)
                                       ->with('pardisp', $par_disp)
                                       ->with('parwins', $par_wins)
                                       ->with('parmobile', $par_mobile)
                                       ->with('parbusiness', $par_business)
                                       ->with('parenterprise', $par_enterprise)
                                       ->with('parleadership', $par_leadership);
    }


    public static function updateParticipant(Request $request) {
        
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
                $newclass = 'App\\'.$academy;
                $all[] = $newclass::where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
            } else {
               
                $all[] = Nits::where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
                $all[] = Business::where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
                $all[] = Consumer::where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
                $all[] = Disp::where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
                $all[] = Enterprise::where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
                $all[] = Mobile::where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
                $all[] = Leadership::where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
                $all[] = Wins::where('name', 'like', '%'.$name.'%')->where('location', 'like', '%'.$location.'%')->where('telkom_main', 'like', '%'.$program.'%')->where('job_family', 'like', '%'.$family.'%')->get();
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


    public static function basicSearch(Request $request) {
        $input = $request->fsearch;

        $result = [];
        $result[] = DB::table('nits')->where('participants', 'like', '%'.$input.'%');
        $result[] = DB::table('consumer')->where('participants', 'like', '%'.$input.'%');
        $result[] = DB::table('disp')->where('participants', 'like', '%'.$input.'%');
        $result[] = DB::table('wins')->where('participants', 'like', '%'.$input.'%');
        $result[] = DB::table('mobile')->where('participants', 'like', '%'.$input.'%');
        $result[] = DB::table('business')->where('participants', 'like', '%'.$input.'%');
        $result[] = DB::table('enterprise')->where('participants', 'like', '%'.$input.'%');
        $result[] = DB::table('leadership')->where('participants', 'like', '%'.$input.'%');
        return response()->json();
    }

}

?>
