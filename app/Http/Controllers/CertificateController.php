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
use App\Certificate;
use App\CertificateTemp;
use App\MainProgram;
use App\JobFamily;
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
    	return view('form_sertificate');
    }

    public static function getParticipant(Request $request) {
        if (session('idx') === '1') {
            $data_baru = [];
            $data_baru[] = Input::post('cer_name');
            $data_baru[] = Input::post('start_date');
            $data_baru[] = Input::post('finish_date');
            $data_baru[] = Input::post('cer_location');
            $data_baru[] = Input::post('cer_academy');

            session(['detail' => $data_baru]);
            $participant_data = [];

            if($request->hasFile('cer_presence')) {
                $presence = $request->file('cer_presence');
                $filename = Input::post('cer_presence').'.'. $presence->getClientOriginalExtension();
                $presence->storeAs('public/presence_upload',$filename);
            } 

            if($request->hasFile('cer_participant_excel')) {

                $avatar = $request->file('cer_participant_excel');
                $filename = Input::post('cer_name'). '.'. $avatar->getClientOriginalExtension();
                $avatar->storeAs('public/participant_excel',$filename);
                
                $participant_data = Excel::load($avatar,function($reader){

                })->get();


                session(['peserta' => $participant_data]);
                return view('step_final')->with('participant_detail', collect(session('peserta')))
                                         ->with('data_detail', collect(session('detail')));


            } 
            else {
                $data_participant = explode(',', Input::post('cer_participant'));
            
                foreach ($data_participant as $datas) {
                    if(empty(Users::getParticipantFirst($datas))) {
                        $participant_data[] = $datas;
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

    public static function clarificationfinal($name) {
            $data_baru = CertificateTemp::where('name', $name)->get();
            $participant_data = $data_baru[0]->participants;

            \Log::info($participant_data);
            $participant = [];

            $data_participant = explode(',', $participant_data);
            
                foreach ($data_participant as $datas) {
                        $participant[] = Users::getParticipantFirst($datas);
                    }

            return view('need_clarification_final')->with('data_detail', $data_baru[0])
                                                   ->with('participant_detail', $participant);
        
    }

    public static function validateCertification() {
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

        $all_certificate = [];
        $all_certificate[] = CertificateTemp::getAllValidation($academi);
        return view('validation_list')->with('datas',$all_certificate);

    }

    public static function complete() {
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

        $all_certificate = [];
        $all_certificate[] = CertificateTemp::getAllComplete($academi);
        return view('complete_certification')->with('datas',$all_certificate);

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
        $list_participant = CertificateTemp::where('name',$datas[1])->first();

        $pluckedprogram = MainProgram::get()->pluck('name');
        $pluckedprogram->all();

        $pluckedfamily = JobFamily::get()->pluck('name');
        $pluckedfamily->all();

        $data_participant = explode(',', $list_participant->participants);
            
                foreach ($data_participant as $dataa) {
                        $participant_data[] = Users::getParticipantFirst($dataa);
                    }

        return view('form_validation')->with('datas',$datas)
                                      ->with('mainprogram',$pluckedprogram)
                                      ->with('jobfamily',$pluckedfamily)
                                      ->with('participant',$participant_data);
    }

    public static function uploadCertificate(Request $request) {
        $datas = session('locked');


        $list_participant = CertificateTemp::where('name',$datas[1])->first();
        $data_participant = explode(',', $list_participant->participants);

        foreach($data_participant as $dataa) {
            if($request->hasFile($dataa)) {
                $certificate = $request->file($dataa);
                $filename = $dataa.'.'. $certificate->getClientOriginalExtension();
                $certificate->storeAs('public/'.$datas[1],$filename);
            }

            $participant_data[]  = Users::getParticipantFirst($dataa);
        }

        $all_data = [];
        $all_data[] = Input::post('cer_name');
        $all_data[] = Input::post('start_date');
        $all_data[] = Input::post('finish_date');
        $all_data[] = Input::post('cer_location');
        $all_data[] = Input::post('cer_academy');
        $all_data[] = Input::post('cer_released');
        $all_data[] = Input::post('cer_outline');
        if(Input::post('inline-radios') === 'date') {
            $all_data[] = Input::post('expired_date');
        } elseif(Input::post('inline-radios') === 'year') {
            $end = Input::post('cer_released');
            $end = date('Y-m-d', strtotime('+'.Input::post('expired_years').' years'));
            $all_data[] = $end;
        } else {
            $all_data[] = '';
        }
        $all_data[] = Input::post('main_program');
        $all_data[] = Input::post('job_family');
        



        $all_certificate = Storage::files(Input::post('cer_name'));
        

        $bool_cert = [];
        foreach ($data_participant as $dataa) {
            if(in_array(Input::post('cer_name').'/'.$dataa.'.jpg',$all_certificate)) {
                $bool_cert[] = 'ya';
            } else {
                $bool_cert[] = 'tidak';
            }
        }




        return view('validation_final')->with('data_detail', $all_data)
                                       ->with('participant_detail', $participant_data)
                                       ->with('have',$bool_cert);
    }


    public function commendtoSSO(Request $request) {
        $nama = $request->fnama;
        $commend = $request->fcommend;
        \Log::info($commend);

        CertificateTemp::where('name', $nama)->update(['commend' => $commend, 'status' => 'needclarification']);
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
        return response()->json();
    }


    public function editClarification(Request $request) {
        $name = $request->fnameafter;
        $start_date = $request->fstart;
        $finish_date = $request->ffinish;
        $location = $request->flocation;
        $academy = $request->facademy;
        $namebefore = $request->fnamebefore;

        \Log::info($name);

        CertificateTemp::where('name', $namebefore)->update(
            ['name' => $name, 'start_date' => $start_date, 'finish_date' => $finish_date, 'location' => $location, 'academy' => $academy]
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
            \Log::info($nama);
            Users::where('nik', $nik)->update(['nik' => $nik, 'nama' => $nama, 'job' => $job, 'division' => $division, 'ubpp' => $ubpp]);

        return response()->json();

    }

    

    public function deleteItem(Request $request) {
        $deleted = ($request->fnomor);
     
        $datas = session('peserta');
        array_splice($datas,$deleted,1);
        session(['peserta' => $datas]); 
        session(['idx' => '2']);
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
        \Log::info($data_participant);
        return response()->json();

    }

    public function deleteValidation(Request $request) {
        $deleted = $request->fnama;

        CertificateTemp::where('name',$deleted)->delete();
        return response()->json();
    }

    public function deleteClarification(Request $request) {
        $deleted = $request->fnama;

        CertificateTemp::where('name',$deleted)->delete();
        return response()->json();
    }

    public function draftForm() {
        $participants = session('peserta');
        $participant = '';
        foreach($participants as $data) {
            $participant = $participant . $data->nik . ',';
        }
        $participant = substr($participant,0,-1);
        $details = session('detail');
        
        CertificateTemp::insert(
            [
                'name' => $details[0],
                'date' => $details[1],
                'location' => $details[2],
                'academy' => $details[3],
                'participants' => $participant
            ]);

        return response()->json();
    }

    public function draftFormClarification() {

        return response()->json();
    }

    public function submitFormClarification() {
        CertificateTemp::where('name', $request->fname)->update(['status' => 'validateLDE']);

        return response()->json();
    }


    public function draftLDE(Request $request) {
        CertificateTemp::where('name', $request->name)->update(['released_date' => $request->released_date,
                                                                'outline' => $request->outline,
                                                                'expired_at' => $request->expired_date,
                                                                'telkom_main' => $request->main_program,
                                                                'job_family' => $request->job_family
                                                                ]);
        return response()->json();

    }



    public function submitForm() {
        $participants = session('peserta');
        $participant = '';
        foreach($participants as $data) {
            $participant = $participant . $data->nik . ',';
        }
        $participant = substr($participant,0,-1);
        \Log::info($participant);
        $details = session('detail');
        
        CertificateTemp::insert(
            [
                'name' => $details[0],
                'start_date' => $details[1],
                'finish_date' => $details[2],
                'location' => $details[3],
                'academy' => $details[4],
                'participants' => $participant,
                'status' => 'validateLDE'
            ]);

        return response()->json();
    }

    

    public function submitComplete(Request $request) {
        CertificateTemp::where('name', $request->name)->update(['released_date' => $request->released_date,
                                                                'outline' => $request->outline,
                                                                'expired_at' => $request->expired_date,
                                                                'telkom_main' => $request->main_program,
                                                                'job_family' => $request->job_family,
                                                                'status' => 'complete'
                                                                ]);

        $tes = CertificateTemp::where('name', $request->name)->first();
        $participant = $tes['participants'];

        $akademi;
        if($request->academy === 'NITS') {
            Nits::insert(
            ['name' => $request->name,
            'start_date' => $request->start,
            'finish_date' => $request->finish,
            'location' => $request->location,
            'academy' => $request->academy,
            'outline' => $request->outline,
            'telkom_main' => $request->main_program,
            'job_family' => $request->job_family,
            'participants' => $participant,
            'released_date' => $request->released_date,
            'expired_at' => $request->expired_date,
            'status' => 'complete'
            ]);
        } elseif($request->academy === 'WINS') {
            Wins::insert(
            ['name' => $request->name,
            'start_date' => $request->start,
            'finish_date' => $request->finish,
            'location' => $request->location,
            'academy' => $request->academy,
            'outline' => $request->outline,
            'telkom_main' => $request->main_program,
            'job_family' => $request->job_family,
            'participants' => $participant,
            'released_date' => $request->released_date,
            'expired_at' => $request->expired_date,
            'status' => 'complete'
            ]);
        } elseif($request->academy === 'DISP') {
            Disp::insert(
            ['name' => $request->name,
            'start_date' => $request->start,
            'finish_date' => $request->finish,
            'location' => $request->location,
            'academy' => $request->academy,
            'outline' => $request->outline,
            'telkom_main' => $request->main_program,
            'job_family' => $request->job_family,
            'participants' => $participant,
            'released_date' => $request->released_date,
            'expired_at' => $request->expired_date,
            'status' => 'complete'
            ]);
        } elseif($request->academy === 'Business Enabler') {
            Business::insert(
            ['name' => $request->name,
            'start_date' => $request->start,
            'finish_date' => $request->finish,
            'location' => $request->location,
            'academy' => $request->academy,
            'outline' => $request->outline,
            'telkom_main' => $request->main_program,
            'job_family' => $request->job_family,
            'participants' => $participant,
            'released_date' => $request->released_date,
            'expired_at' => $request->expired_date,
            'status' => 'complete'
            ]);
        } elseif($request->academy === 'Consumer') {
            Consumer::insert(
            ['name' => $request->name,
            'start_date' => $request->start,
            'finish_date' => $request->finish,
            'location' => $request->location,
            'academy' => $request->academy,
            'outline' => $request->outline,
            'telkom_main' => $request->main_program,
            'job_family' => $request->job_family,
            'participants' => $participant,
            'released_date' => $request->released_date,
            'expired_at' => $request->expired_date,
            'status' => 'complete'
            ]);
        } elseif($request->academy === 'Mobile') {
            Mobile::insert(
            ['name' => $request->name,
            'start_date' => $request->start,
            'finish_date' => $request->finish,
            'location' => $request->location,
            'academy' => $request->academy,
            'outline' => $request->outline,
            'telkom_main' => $request->main_program,
            'job_family' => $request->job_family,
            'participants' => $participant,
            'released_date' => $request->released_date,
            'expired_at' => $request->expired_date,
            'status' => 'complete'
            ]);
        } elseif($request->academy === 'Leadership') {
            Leadership::insert(
            ['name' => $request->name,
            'start_date' => $request->start,
            'finish_date' => $request->finish,
            'location' => $request->location,
            'academy' => $request->academy,
            'outline' => $request->outline,
            'telkom_main' => $request->main_program,
            'job_family' => $request->job_family,
            'participants' => $participant,
            'released_date' => $request->released_date,
            'expired_at' => $request->expired_date,
            'status' => 'complete'
            ]);
        } elseif($request->academy === 'Enterprise') {
            Enterprise::insert(
            ['name' => $request->name,
            'start_date' => $request->start,
            'finish_date' => $request->finish,
            'location' => $request->location,
            'academy' => $request->academy,
            'outline' => $request->outline,
            'telkom_main' => $request->main_program,
            'job_family' => $request->job_family,
            'participants' => $participant,
            'released_date' => $request->released_date,
            'expired_at' => $request->expired_date,
            'status' => 'complete'
            ]);
        }
        
        return response()->json();
    }


    
}
