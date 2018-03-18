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
use Illuminate\Support\Facades\Input;

class ReportsController extends Controller
{
    //
    public static function showReports() {
        return view('reports');
    }
}
