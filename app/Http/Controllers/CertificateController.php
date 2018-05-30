<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumer;
use App\Business;
use App\Disp;
use App\Enterprise;
use App\Leadership;
use App\Mobile;
use App\Nits;
use App\Wins;
use App\Users;
use App\UserFix;
use App\CertificateTemp;
use App\ConsumerDetail;
use App\BusinessDetail;
use App\DispDetail;
use App\EnterpriseDetail;
use App\LeadershipDetail;
use App\MobileDetail;
use App\NitsDetail;
use App\WinsDetail;
use App\CertificateTempDetail;
use App\MainProgram;
use App\JobFamily;
use DB;
use Storage;
use Excel;
use Illuminate\Support\Facades\Input;

class CertificateController extends Controller
{
    //

    public static function showList() {
    	$all_certificate = [];
	    $all_certificate[] = CertificateTemp::getAllDraft();

	    return view('certification_list')->with('datas',$all_certificate);
    }

    public static function showListClarification() {
        $all_certificate = [];
        $all_certificate[] = CertificateTemp::getAllClarification();

        return view('need_clarification')->with('datas',$all_certificate);
    }

    public static function createNew() {
        session(['idx' => '1']);
        $listacademy = DB::table('academy')->where('flag', date("Y"))->pluck('name');
    	return view('form_sertificate')->with('listacademy', $listacademy);
    }

    public static function getParticipant(Request $request) {
        if (session('idx') === '1') {
            $data_baru = [];
            $data_baru[] = Input::post('cer_name');
            $data_baru[] = Input::post('start_date');
            $data_baru[] = Input::post('finish_date');
            $data_baru[] = Input::post('cer_location');
            $data_baru[] = Input::post('cer_academy');
            $data_baru[] = Input::post('cer_institution');
            $data_baru[] = Input::post('cer_category');
            $data_baru[] = Input::post('cer_internal');

            
            

            if($request->hasFile('cer_presence')) {
                $presence = $request->file('cer_presence');
                $filename = Input::post('cer_name').'.'. $presence->getClientOriginalExtension();
                $presence->storeAs('public/presence_upload',$filename);
                $data_baru[] = $filename;
            } 

            session(['detail' => $data_baru]);
            $participant_data = [];

            if($request->hasFile('cer_participant_excel')) {

                $avatar = $request->file('cer_participant_excel');
                $filename = Input::post('cer_name'). '.'. $avatar->getClientOriginalExtension();
                $avatar->storeAs('public/participant_excel',$filename);
                
                $participantdata = Excel::load($avatar,function($reader){

                })->get();

                \Log::info($participantdata);

                foreach ($participantdata as $datas) {
                    if(empty(Users::getParticipantFirst($datas->nik))) {

                        $participant_data[] = (object) array("nik"=>$datas->nik, "nama"=>"", "job"=>"", "division"=>"", "status"=>'readonly');
                    } else {
                        $participant_data[] = Users::getParticipantFirst($datas->nik);     
                    }
                
                }


                session(['peserta' => $participant_data]);
                return view('step_final')->with('participant_detail', collect(session('peserta')))
                                         ->with('data_detail', collect(session('detail')));
            } 
            else {
                $data_participant = explode(',', Input::post('cer_participant'));
            
                foreach ($data_participant as $datas) {
                    if(empty(Users::getParticipantFirst($datas))) {
                        $participant_data[] = (object) array("nik"=>$datas, "nama"=>"", "job"=>"", "division"=>"", "status"=>'readonly');
                    } else {
                        
                        $participant_data[] = Users::getParticipantFirst($datas);
                        
                    }
                
                } 

                
                session(['peserta' => $participant_data]);
                return view('step_final')->with('participant_detail', collect(session('peserta')))
                                         ->with('data_detail', collect(session('detail')));
            }
        } else {
            return view('step_final')->with('participant_detail', collect(session('peserta')))
                                         ->with('data_detail', collect(session('detail')));
        }
    	
    }

    public static function stepfinalcreate($name) {
            $data_baru = CertificateTemp::where('name', $name)->get();
            $participant_data = $data_baru[0]->participants;


            $participant = [];

            $data_participant = explode(',', $participant_data);
            
                foreach ($data_participant as $datas) {
                        $participant[] = Users::getParticipantFirst($datas);
                    }


            return view('step_final2')->with('data_detail', $data_baru)
                                      ->with('participant_detail', $participant);
    }

    public static function clarificationfinal($name) {
            $data_baru = CertificateTemp::where('name', $name)->get();
            $participant_data = $data_baru[0]->participants;

            
            $participant = [];

            $data_participant = explode(',', $participant_data);
            
                foreach ($data_participant as $datas) {
                        $temp = (array) Users::getParticipantFirst($datas);
                        $temp_ubpp = CertificateTempDetail::where('name', $name)->where('peserta', $datas)->first();
                        $temp['ubpp'] = $temp_ubpp['ubpp'];
                        $participant[] = (object) $temp;
                    }

            return view('need_clarification_final')->with('data_detail', $data_baru[0])
                                                   ->with('participant_detail', $participant);
        
    }

    public static function validateCertification() {
        $academi = DB::table('academy')->where('flag', date("Y"))->where('niklde', session('userAktif'))->first();

        $all_certificate = [];
        $all_certificate[] = CertificateTemp::getAllValidation($academi->name);
        return view('validation_list')->with('datas',$all_certificate);

    }

    public static function complete() {
        

        $temp_data = DB::table('academy')->where('flag', date("Y"))->where('niklde', session('userAktif'))->orWhere('niknonlde', session('userAktif'))->first();

        $academi = $temp_data->name;

        $all_certificate = [];
        $all_certificate[] = CertificateTemp::getAllComplete($academi); 
        
        

        $all_presence = Storage::files('public/presence_upload');
        
        

        $bool_cert = [];
        foreach ($all_certificate as $dataa) {
            foreach($dataa as $data) {
                if(in_array('public/presence_upload/'.$data->name.'.xlsx',$all_presence)) {
                    $bool_cert[$data->name] = 'ya';
                } else {
                    $bool_cert[$data->name] = 'tidak';
                }
            }
            
        }

        
        return view('complete_certification')->with('datas',$all_certificate)
                                             ->with('have', $bool_cert);

    }

    public static function updateByDate() {

        $academi;
        if(session('userAktif') === 'ldenits') {
            $academi = 'NITS';
        } elseif(session('userAktif') === 'ldebusiness') {
            $academi = 'Business Enabler';
        } elseif(session('userAktif') === 'ldeconsumer') {
            $academi = 'Consumer';
        } elseif(session('userAktif') === 'ldedisp') {
            $academi = 'DISP';
        } elseif(session('userAktif') === 'ldeenterprise') {
            $academi = 'Enterprise';
        } elseif(session('userAktif') === 'ldeleadership') {
            $academi = 'Leadership';
        } elseif(session('userAktif') === 'ldemobile') {
            $academi = 'Mobile';
        } else {
            $academi = 'WINS';
        }


        if(Input::post('start_date') and Input::post('finish_date')) {
            $data = [];
            $data[] = CertificateTemp::getAllByDate($academi,Input::post('start_date'),Input::post('finish_date'));
            return view('validation_list')->with('datas',$data);
        } elseif(Input::post('start_date') and !Input::post('finish_date')) {
            $data = [];
            $data[] = CertificateTemp::getAllByDate($academi,Input::post('start_date'),date("Y/m/d"));
            return view('validation_list')->with('datas',$data);
        } elseif(!Input::post('start_date') and Input::post('finish_date')) {
            $data = [];
            $data[] = CertificateTemp::getAllByDate($academi,date("1900/01/01"),Input::post('finish_date'));
            return view('validation_list')->with('datas',$data);
        } else {
            $data = [];
            $data[] = CertificateTemp::getAllValidation($academi);
            return view('validation_list')->with('datas',$data);
        }
    }

     public static function updateComplete() {

        $academi;
        if(session('userAktif') === 'ldenits') {
            $academi = 'NITS';
        } elseif(session('userAktif') === 'ldebusiness') {
            $academi = 'Business Enabler';
        } elseif(session('userAktif') === 'ldeconsumer') {
            $academi = 'Consumer';
        } elseif(session('userAktif') === 'ldedisp') {
            $academi = 'DISP';
        } elseif(session('userAktif') === 'ldeenterprise') {
            $academi = 'Enterprise';
        } elseif(session('userAktif') === 'ldeleadership') {
            $academi = 'Leadership';
        } elseif(session('userAktif') === 'ldemobile') {
            $academi = 'Mobile';
        } else {
            $academi = 'WINS';
        }


        if(Input::post('start_date') and Input::post('finish_date')) {
            $data = [];
            $data[] = CertificateTemp::getAllByDateComplete($academi,Input::post('start_date'),Input::post('finish_date'));
            return view('complete_certification')->with('datas',$data);
        } elseif(Input::post('start_date') and !Input::post('finish_date')) {
            $data = [];
            $data[] = CertificateTemp::getAllByDateComplete($academi,Input::post('start_date'),date("Y/m/d"));
            return view('complete_certification')->with('datas',$data);
        } elseif(!Input::post('start_date') and Input::post('finish_date')) {
            $data = [];
            $data[] = CertificateTemp::getAllByDateComplete($academi,date("1900/01/01"),Input::post('finish_date'));
            return view('complete_certification')->with('datas',$data);
        } else {
            $data = [];
            $data[] = CertificateTemp::getAllComplete($academi);
            return view('complete_certification')->with('datas',$data);
        }
    }


    public function editValidation(Request $request) {
        $locked = [];
        $locked[] = $request->fnomor;
        $locked[] = $request->fnama;
        $locked[] = $request->fstartdate;
        $locked[] = $request->ffinishdate;
        $locked[] = $request->flocation;
        $locked[] = $request->facademy;

        session(['locked' => $locked]);

        return response()->json();
    }


    public static function formValidate() {
        $datas = session('locked');
        $data = CertificateTemp::where('name', $datas[1])->get();
        $list_participant = CertificateTemp::where('name',$datas[1])->first();

        $pluckedprogram = MainProgram::where('flag', date("Y"))->get()->pluck('name');
        $pluckedprogram->all();

        $pluckedfamily = JobFamily::where('flag', date("Y"))->get()->pluck('name');
        $pluckedfamily->all();

        $data_participant = explode(',', $list_participant->participants);
            
                foreach ($data_participant as $dataa) {
                        $participant_data[] = Users::getParticipantFirst($dataa);
                    }


        $details = CertificateTempDetail::where('name', $datas[1])->get();
        
        return view('form_validation')->with('datas',$data)
                                      ->with('mainprogram',$pluckedprogram)
                                      ->with('jobfamily',$pluckedfamily)
                                      ->with('participant',$participant_data)
                                      ->with('details',$details);
    }

    public static function uploadCertificate(Request $request) {
        $datas = session('locked');


        $list_participant = CertificateTemp::where('name',$datas[1])->first();
        $data_participant = explode(',', $list_participant->participants);

        if($request->hasFile('multiple_certificate')) {
            $myCertificate = $request->file('multiple_certificate');
            foreach($myCertificate as $certs) {
                $filename = $certs->getClientOriginalName();
                $arr = explode('.', $filename, 2);
                $nikpeserta = $arr[0];
                $certs->storeAs('public/'.$datas[1],$filename);
                CertificateTempDetail::where('name', $datas[1])->where('peserta', $nikpeserta   )->update(['file_name' => $filename]);
            }
        }

        foreach($data_participant as $dataa) {
            if($request->hasFile($dataa)) {
                $certificate = $request->file($dataa);
                $filename = $dataa.'.'. $certificate->getClientOriginalExtension();
                $certificate->storeAs('public/'.$datas[1],$filename);
                CertificateTempDetail::where('name', $datas[1])->where('peserta', $dataa)->update(['file_name' => $filename]);
            }

            $temp_status = Input::post('status_'.$dataa);
            \Log::info($temp_status);
            CertificateTempDetail::where('name', $datas[1])->where('peserta', $dataa)->update(['participant_status' => $temp_status]);

            $participant_data[]  = Users::getParticipantFirst($dataa);
        }

        $all_data = [];
        $all_data[] = Input::post('cer_name');
        $all_data[] = Input::post('start_date');
        $all_data[] = Input::post('finish_date');
        $all_data[] = Input::post('cer_location');
        $all_data[] = Input::post('cer_academy');
        $all_data[] = Input::post('cer_institution');
        $all_data[] = Input::post('cer_category');
        $all_data[] = Input::post('cer_internal');
        $all_data[] = Input::post('cfu/fu');
        if(Input::post('level-radios') === 'Others') {
            $all_data[] = Input::post('cer_others');
        } else {
            $all_data[] = Input::post('level-radios');
        }
        $all_data[] = Input::post('cer_released');
        $all_data[] = Input::post('cer_outline');
        if(Input::post('inline-radios') === 'date') {
            $all_data[] = Input::post('expired_date');
        } elseif(Input::post('inline-radios') === 'year') {
            $end = Input::post('cer_released');
            $end = date('Y-m-d', strtotime('+'.Input::post('expired_years').' years'));
            $all_data[] = $end;
        } elseif(Input::post('inline-radios') === 'all-time') {
            $all_data[] = '2100/12/12';
        } else {
            $all_data[] = '';
        }
        $all_data[] = Input::post('main_program');
        $all_data[] = Input::post('job_family');
        

        $details = CertificateTempDetail::where('name', $datas[1])->get();
        
        \Log::info($details);
        return view('validation_final')->with('data_detail', $all_data)
                                       ->with('participant_detail', $participant_data)
                                       ->with('details', $details);
                                       
    }


    public function commendtoSSO(Request $request) {
        $nama = $request->name;
        $commend = $request->comment;
        
        CertificateTemp::where('name', $request->name)->update(['cfu_fu' => $request->cfu_fu,
                                                                'level' => $request->level,
                                                                'released_date' => $request->released_date,
                                                                'outline' => $request->outline,
                                                                'expired_at' => $request->expired_date,
                                                                'telkom_main' => $request->main_program,
                                                                'job_family' => $request->job_family
                                                                ]);

        CertificateTempDetail::where('name', $request->name)->update(['job_family' => $request->job_family]);

        CertificateTemp::where('name', $nama)->update(['commend' => $commend, 'status' => 'needclarification']);
        return response()->json();
    }

    public function editItem2(Request $request) {
        $edited = ($request->fnik);
        if(UserFix::where('nik', $edited)->exists()) {
            Users::where('nik', $edited)->update(['nik' => $request->fnik, 'nama' => $request->fnama, 'job' => $request->fjob, 'division' => $request->fdivision]);
            UserFix::where('nik', $edited)->update(['nik' => $request->fnik, 'nama' => $request->fnama, 'job' => $request->fjob, 'division' => $request->fdivision]);

            CertificateTempDetail::where('name', $request->fname)->where('peserta', $request->fnik)->update(['division' => $request->fdivision]);
        } else {
            Users::where('nik', $edited)->update(['nik' => $request->fnik, 'nama' => $request->fnama, 'job' => $request->fjob, 'division' => $request->fdivision]);
            CertificateTempDetail::where('name', $request->fname)->where('peserta', $request->fnik)->update(['division' => $request->fdivision]);
        } 
        
        return response()->json();
    }

    public function createItem2(Request $request) {
        if(Users::where('nik', $request->fnik)->exists()) {
            $data = CertificateTemp::where('name', $request->fname)->get();
            $datausers = Users::where('nik', $request->fnik)->get();

            $division = $datausers[0]->division;
            $participant = $data[0]->participants;

            $participant = $participant.','.$request->fnik;
            CertificateTempDetail::insert(['name' => $request->fname, 'peserta' => $request->fnik, 'division' => $division]);
            

            CertificateTemp::where('name', $request->fname)->update(['participants' => $participant]);
        } else {
            Users::insert(['nik' => $request->fnik, 'nama' => $request->fnama, 'job' => $request->fjob, 'division' => $request->fdivision, 'status' => 'readonly']);
            CertificateTempDetail::insert(['name' => $request->fname, 'peserta' => $request->fnik]);
            $data = CertificateTemp::where('name', $request->fname)->get();
            $participant = $data[0]->participants;

            $participant = $participant.','.$request->fnik;

            CertificateTemp::where('name', $request->fname)->update(['participants' => $participant]);

        }

       return response()->json(); 
    }

    public function deleteItem2(Request $request) {
        $deleted = ($request->fnomor) - 1;
        $name = ($request->fname);

        \Log::info($name);

        $data_baru = CertificateTemp::where('name', $name)->get();
        $participant_data = $data_baru[0]->participants;
        $participantdata = explode(',', $participant_data);
        array_splice($participantdata,$deleted,1);
        $participantdat = implode(',', $participantdata);
        CertificateTemp::where('name', $name)->update(['participants' => $participantdat]);

        CertificateTempDetail::where('name', $name)->where('peserta', $request->fnik)->delete();
        
        return response()->json();
    }

    public function deleteItem(Request $request) {
        $deleted = ($request->fnomor) - 1;
        $datas = session('peserta');
        array_splice($datas,$deleted,1);
        session(['peserta' => $datas]); 
        session(['idx' => '2']);

        return response()->json();

    }

    public function editItem(Request $request) {
        $edited = ($request->fnomor) - 1;
        $datas = session('peserta');
        
            $datas[$edited]->nik = $request->fnik;
            $datas[$edited]->nama = $request->fnama;
            $datas[$edited]->job = $request->fjob;
            $datas[$edited]->division = $request->fdivision;
            $datas[$edited]->ubpp = $request->fubpp;

            session(['peserta' => $datas]);
            session(['idx' => '2']);


            \Log::info(session('peserta'));
            
            
        return response()->json();
    }

    public function requestItem(Request $request) {
        $requested = $request->fnik;

        

        if(Users::where('nik', $requested)->exists()) {
            Users::where('nik', $requested)->update(['status'=>'requested']);
        } else {
            Users::insert(['nik'=>$requested, 'status'=>'requested']);
        }

        $datas = session('peserta');

        foreach($datas as $data) {
            if($data->nik === $requested) {
                $data->status = 'requested';
            }
        } 
        return response()->json();

    }


    public function editClarification(Request $request) {
        $name = $request->fnameafter;
        $start_date = $request->fstart;
        $finish_date = $request->ffinish;
        $location = $request->flocation;
        $academy = $request->facademy;
        $institution = $request->finstitution;
        $category = $request->fcategory;
        $internal = $request->finternal;
        $namebefore = $request->fnamebefore;

  


        CertificateTemp::where('name', $namebefore)->update(
            ['name' => $name, 'start_date' => $start_date, 'finish_date' => $finish_date, 'location' => $location, 'academy' => $academy, 'institution' => $institution, 'category' => $category, 'internal' => $internal]
        );

        return response()->json();

    }

    public function editCertification(Request $request) {
        $name = $request->fnameafter;
        $start_date = $request->fstart;
        $finish_date = $request->ffinish;
        $location = $request->flocation;
        $academy = $request->facademy;
        $institution = $request->finstitution;
        $category = $request->fcategory;
        $internal = $request->finternal;
        $namebefore = $request->fnamebefore;



        CertificateTemp::where('name', $namebefore)->update(
            ['name' => $name, 'start_date' => $start_date, 'finish_date' => $finish_date, 'location' => $location, 'academy' => $academy, 'institution' => $institution, 'category' => $category, 'internal' => $internal]
        );

        return response()->json();

    }

    public function editItemClarification(Request $request) {
        $edited = ($request->fnomor);
        $name = ($request->fname);
        $nik = ($request->fnik);
        $nama = ($request->fnama);
        $job = ($request->fjob);
        $division = ($request->fdivision);
        $ubpp = ($request->fubpp);


            $data_baru = CertificateTemp::where('name', $name)->first();

        
            Users::where('nik', $nik)->update(['nik' => $nik, 'nama' => $nama, 'job' => $job, 'division' => $division]);
            UserFix::where('nik', $nik)->update(['nik' => $nik, 'nama' => $nama, 'job' => $job, 'division' => $division]);
            CertificateTempDetail::where('name', $name)->where('peserta', $nik)->update(['division' => $division]);
            return response()->json();

    }


     public function deleteItemClarification(Request $request) {
        $deleted = ($request->fnomor);

        $nik = ($request->fnik);
        $name = ($request->fname);
        
            $data_baru = CertificateTemp::where('name', $name)->first();
            $participant_data = $data_baru->participants;

            $data_participant = explode(',', $participant_data);

        array_splice($data_participant,$deleted-1,1);

        CertificateTemp::where('name', $name)->update(['participants' => implode(',',$data_participant)]);
        CertificateTempDetail::where('name', $name)->where('peserta', $nik)->delete();
  
        return response()->json();

    }

    public function deleteValidation(Request $request) {
        $nama = $request->fnama;
        $commend = $request->fcommend;
        

        CertificateTemp::where('name', $nama)->update(['commend' => $commend, 'status' => 'needclarification']);
        return response()->json();
    }

    public function deleteClarification(Request $request) {
        $deleted = $request->fnama;

        CertificateTemp::where('name',$deleted)->delete();
        return response()->json();
    }

    public function deleteCertification(Request $request) {
        $deleted = $request->fnama;

        CertificateTemp::where('name',$deleted)->delete();
        return response()->json();
    }

    public function draftForm() {
        $details = session('detail');
        $participants = session('peserta');
        $participant = '';
        foreach($participants as $data) {
            $participant = $participant . $data->nik . ',';
            if(Users::where('nik', $data->nik)->exists()) {
                Users::where('nik', $data->nik)->update(['nik'=>$data->nik, 'nama'=>$data->nama, 'job'=>$data->job, 'division'=>$data->division]);
                UserFix::where('nik', $data->nik)->update(['nik'=>$data->nik, 'nama'=>$data->nama, 'job'=>$data->job, 'division'=>$data->division]);
                CertificateTempDetail::insert(['name' => $details[0], 'peserta' => $data->nik, 'division' => $data->division]);
            } else {
                Users::insert(['nik'=>$data->nik, 'nama'=>$data->nama, 'job'=>$data->job, 'division'=>$data->division, 'status'=>'readonly']);
                CertificateTempDetail::insert(['name' => $details[0], 'peserta' => $data->nik, 'division' => $data->division]);
            }
        }
        $participant = substr($participant,0,-1);
            if(count($details) == 8) {
                CertificateTemp::insert(
                [
                    'name' => $details[0],
                    'start_date' => $details[1],
                    'finish_date' => $details[2],
                    'location' => $details[3],
                    'academy' => $details[4],
                    'institution' => $details[5],
                    'category' => $details[6],
                    'internal' => $details[7],
                    'participants' => $participant,
                    'status' => 'draftSSO'
                ]);    
            } else {
                CertificateTemp::insert(
                [
                    'name' => $details[0],
                    'start_date' => $details[1],
                    'finish_date' => $details[2],
                    'location' => $details[3],
                    'academy' => $details[4],
                    'institution' => $details[5],
                    'category' => $details[6],
                    'internal' => $details[7],
                    'filename' => $details[8],
                    'participants' => $participant,
                    'status' => 'draftSSO'
                ]);
            }    
        return response()->json();
    }

    public function draftFormClarification() {

        return response()->json();
    }

    public function draftFormNew() {

        return response()->json();
    }

    public function submitFormNew(Request $request) {
        $name = $request->fname;
        $cansubmit = 1;
        $datas = CertificateTempDetail::where('name', $name)->get();

        foreach($datas as $data) {
            
            $temp_user = Users::where('nik', $data->peserta)->get();
            
            if($temp_user[0]->nama == '' || $temp_user[0]->job == '' || $temp_user[0]->division == '') {
                $cansubmit = 0;
            }
        }

        if($cansubmit == 1) {
            CertificateTemp::where('name', $name)->update(['status' => 'validateLDE']);
            return response()->json();
        } else {
            die(header("HTTP/1.0 404 Not Found"));
        }
        
    }

    public function submitFormClarification(Request $request) {
        CertificateTemp::where('name', $request->fname)->update(['status' => 'validateLDE']);

        return response()->json();
    }


    public function draftLDE(Request $request) {
        CertificateTemp::where('name', $request->name)->update(['cfu_fu' => $request->cfu_fu,
                                                                'level' => $request->level,
                                                                'released_date' => $request->released_date,
                                                                'outline' => $request->outline,
                                                                'expired_at' => $request->expired_date,
                                                                'telkom_main' => $request->main_program,
                                                                'job_family' => $request->job_family
                                                                ]);

        CertificateTempDetail::where('name', $request->name)->update(['job_family' => $request->job_family]);
        
        return response()->json();

    }



    public function submitForm() {
        $participants = session('peserta');
        $details = session('detail');
        $cansubmit = 1;
        foreach($participants as $data) {
            if($data->nik == '' || $data->job == '' || $data->division == '' || $data->nama == '') {
                $cansubmit = 0;
            }
        }

        if($cansubmit == 1) {
           
            $participant = '';
            foreach($participants as $data) {
                $participant = $participant . $data->nik . ',';
                if(Users::where('nik', $data->nik)->exists()) {
                    Users::where('nik', $data->nik)->update(['nik'=>$data->nik, 'nama'=>$data->nama, 'job'=>$data->job, 'division'=>$data->division]);
                    UserFix::where('nik', $data->nik)->update(['nik'=>$data->nik, 'nama'=>$data->nama, 'job'=>$data->job, 'division'=>$data->division]);

                    CertificateTempDetail::insert(['name' => $details[0], 'peserta' => $data->nik, 'division' => $data->division]);
                } else {
                    Users::insert(['nik'=>$data->nik, 'nama'=>$data->nama, 'job'=>$data->job, 'division'=>$data->division, 'status'=>'readonly']);
                    CertificateTempDetail::insert(['name' => $details[0], 'peserta' => $data->nik, 'division' => $data->division]);
                }
            }
            $participant = substr($participant,0,-1);
            
            if(count($details) == 8) {
                CertificateTemp::insert(
                [
                    'name' => $details[0],
                    'start_date' => $details[1],
                    'finish_date' => $details[2],
                    'location' => $details[3],
                    'academy' => $details[4],
                    'institution' => $details[5],
                    'category' => $details[6],
                    'internal' => $details[7],
                    'participants' => $participant,
                    'status' => 'validateLDE'
                ]);    
            } else {
                CertificateTemp::insert(
                [
                    'name' => $details[0],
                    'start_date' => $details[1],
                    'finish_date' => $details[2],
                    'location' => $details[3],
                    'academy' => $details[4],
                    'institution' => $details[5],
                    'category' => $details[6],
                    'internal' => $details[7],
                    'filename' => $details[8],
                    'participants' => $participant,
                    'status' => 'validateLDE'
                ]);
            }    
            return response()->json();
        } else {
            die(header("HTTP/1.0 404 Not Found"));
        }
        
    }

    

    public function submitComplete(Request $request) {
        $cansubmit = 1;
        $tes = CertificateTemp::where('name', $request->name)->first();

        $temp_detail = CertificateTempDetail::where('name', $request->name)->get();
        foreach($temp_detail as $datas) {
            if($datas->participant_status == '' || $datas->file_name == '') {
                $cansubmit = 0;
            }
        }
        


        if($request->cfu_fu == '' || $request->level == '' || $request->released_date == '' || $request->outline == '' || $request->expired_date == '' || $request->main_program == '' || $request->job_family == '') {
            $cansubmit = 0;
        }
    

        if($cansubmit == 1) {
            CertificateTemp::where('name', $request->name)->update(['cfu_fu' => $request->cfu_fu,
                                                                    'level' => $request->level,
                                                                    'released_date' => $request->released_date,
                                                                    'outline' => $request->outline,
                                                                    'expired_at' => $request->expired_date,
                                                                    'telkom_main' => $request->main_program,
                                                                    'job_family' => $request->job_family,
                                                                    'status' => 'complete'
                                                                    ]);

            
            $participant = $tes['participants'];



            $temp_academy = DB::table('academy')->where('flag', date("Y"))->where('name', $request->academy)->first();
            $name_table = $temp_academy->table;
            $temp_table_detail = DB::table('academy_detail')->where('flag', date("Y"))->where('name', $request->academy)->first();
            $name_detail = $temp_table_detail->table;

            DB::table($name_table)->insert([
                'name' => $request->name,
                'start_date' => $request->start,
                'finish_date' => $request->finish,
                'location' => $request->location,
                'academy' => $request->academy,
                'institution' => $request->institution,
                'category' => $request->category,
                'internal' => $request->internal,
                'cfu_fu' => $request->cfu_fu,
                'level' => $request->level,
                'outline' => $request->outline,
                'telkom_main' => $request->main_program,
                'job_family' => $request->job_family,
                'participants' => $participant,
                'released_date' => $request->released_date,
                'expired_at' => $request->expired_date,
                'status' => 'complete'
            ]);

            foreach($temp_detail as $datas) {
                    DB::table($name_detail)->insert(
                    [
                        'name' => $datas->name,
                        'peserta' => $datas->peserta,
                        'job_family' => $request->job_family,
                        'participant_status' => $datas->participant_status,
                        'division' => $datas->division,
                        'file_name' => $datas->file_name
                    ]);
                }
            
            return response()->json();
        } else {

            die(header("HTTP/1.0 404 Not Found"));
        
        } 
    }

}
