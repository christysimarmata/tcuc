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
use App\CertificateTemp;
use App\MainProgram;
use App\JobFamily;
use Illuminate\Support\Facades\Input;

class ReportsController extends Controller
{
    //
    public static function showReports() {

    	$mainprogram = MainProgram::get();
    	$jobfamily = JobFamily::get();

    	$nomor1 = 0;
		 		foreach($mainprogram as $main) {
		 			$dataprogram[$nomor1][] = Nits::getTotalByProgram($main->name);
		 			$dataprogram[$nomor1][] = Consumer::getTotalByProgram($main->name);
		 			$dataprogram[$nomor1][] = Disp::getTotalByProgram($main->name);
		 			$dataprogram[$nomor1][] = Wins::getTotalByProgram($main->name);
		 			$dataprogram[$nomor1][] = Mobile::getTotalByProgram($main->name);
		 			$dataprogram[$nomor1][] = Enterprise::getTotalByProgram($main->name);
		 			$dataprogram[$nomor1][] = Business::getTotalByProgram($main->name);
		 			$dataprogram[$nomor1][] = Leadership::getTotalByProgram($main->name);


		 			$nomor1++; 	
		 		}

		 	$nomor2 = 0;
		 		foreach($jobfamily as $family) {
		 			$datafamily[$nomor2][] = Nits::getTotalByFamily($family->name);
		 			$datafamily[$nomor2][] = Consumer::getTotalByFamily($family->name);
		 			$datafamily[$nomor2][] = Disp::getTotalByFamily($family->name);
		 			$datafamily[$nomor2][] = Wins::getTotalByFamily($family->name);
		 			$datafamily[$nomor2][] = Mobile::getTotalByFamily($family->name);
		 			$datafamily[$nomor2][] = Enterprise::getTotalByFamily($family->name);
		 			$datafamily[$nomor2][] = Business::getTotalByFamily($family->name);
		 			$datafamily[$nomor2][] = Leadership::getTotalByFamily($family->name);
		 			$nomor2++; 	
		 		}

    	$chartprogram = app()->chartjs
        ->name('MainProgram')
        ->type('bar')
        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
        ->datasets([
        	[	
        		'label'=>"Main Program 1",
				'data'=>$dataprogram[0],
				'backgroundColor'=>"#FF6384"
        	],
        	[	
        		'label'=>"Main Program 2",
				'data'=>$dataprogram[1],
				
				'backgroundColor'=>"#36A2EB"
        	],
        	[	
        		'label'=>"Main Program 3",
				'data'=>$dataprogram[2],
			
				'backgroundColor'=>"#58D68D"
        	]
        ])
        ->options([]);

        $chartfamily = app()->chartjs
        ->name('JobFamily')
        ->type('bar')
        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
        ->datasets([
        	[	
        		'label'=>"Job Family 1",
				'data'=>$datafamily[0],
				'backgroundColor'=>"#FF6384"
        	],
        	[	
        		'label'=>"Job Family 2",
				'data'=>$datafamily[1],
				'backgroundColor'=>"#36A2EB"
        	],
        	[	
        		'label'=>"Job Family 3",
				'data'=>$datafamily[2],
				'backgroundColor'=>"#58D68D"
        	],
        	[	
        		'label'=>"Job Family 4",
				'data'=>$datafamily[3],
				'backgroundColor'=>"#8E44AD"
        	],
        	[	
        		'label'=>"Job Family 5",
				'data'=>$datafamily[4],
				'backgroundColor'=>"#F7DC6F"
        	]

        ])
        ->options([]);

        
        $chartprogram->optionsRaw([
        	'scales' => [
		        'yAxes' => [
		            	[
		                'ticks' => [
		                	'beginAtZero' => true
		                ]
		            ]
		        ]
		    ],
		    'title' => [
		    	'display' => true,
		    	'text' => 'Main Program Graph',
		    	'fontSize' => 16
		    ],
		    'legend' => [
		    	'display' => true,
		    	'position' => 'right',
		    	'labels' => [
		    		'padding' => 16
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
		    'title' => [
		    	'display' => true,
		    	'text' => 'Job Family Graph',
		    	'fontSize' => 16
		    ],
		    'legend' => [
		    	'display' => true,
		    	'position' => 'right',
		    	'labels' => [
		    		'padding' => 16
		    	]	
		    ]

        ]);



        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);

    }



    public static function updateReports(Request $request) {
    	$start = Input::get('start_date');
    	$finish = Input::get('finish_date');
    	$program = Input::get('mainprogram');
    	$families = Input::get('jobfamily');
    	$academy = Input::get('academy');
    	$mainprogram = MainProgram::get();
    	$jobfamily = JobFamily::get();

    	$data;
    	$label_name = [];
    	$label_family = [];
    		if($academy === 'all') {
    			if($program === 'all' && $families === 'all') {
    					
    					$nomor1 = 0;
    					foreach($mainprogram as $main) {
    						$label_name[] = $main->name;

				 			for($x = 1; $x <= $finish; $x++) {
				 			
				 			$dataprogram[$nomor1][$x][] = Nits::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Consumer::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Disp::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Wins::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Mobile::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Enterprise::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Business::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Leadership::getByProgram($start, $x, $main->name);
				 			}
				 			$nomor1++;
				 		}
				 			
				 		$nomor2 = 0;
				 		foreach($jobfamily as $family) {
				 			$label_family[] = $family->name;

				 			for($x = 1; $x <= $finish; $x++) {
				 			$datafamily[$nomor2][$x][] = Nits::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Consumer::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Disp::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Wins::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Mobile::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Enterprise::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Business::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Leadership::getByFamily($start,$x,$family->name);
				 			}	
				 			$nomor2++; 	
				 		}

				 		$label_temp = [];
				 		for($x = 1; $x <= $finish; $x++) {
				 			$label_temp[] = $start+$x;
				 		}
				 		
				 		if($finish == 1) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	]
				        	
				        ])
				        ->options([]);

				        	$chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],

					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	]
					        	
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 2) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][2],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][2],
									'backgroundColor'=>"#CB4335"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 3) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][2],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][2],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#FADBD8"
					        	]
					        	
					        ])
					        ->options([]);

					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 4) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#FEF9E7"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][2],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][4],
									'backgroundColor'=>"#EBF5FB"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][2],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#FADBD8"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][4],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][4],
									'backgroundColor'=>"#48C9B0"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[3],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][4],
									'backgroundColor'=>"#D7DBDD"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[3],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][4],
									'backgroundColor'=>"#F1948A"
					        	]
					        	
					        ])
					        ->options([]);


				 		} else {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#7E5109"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][5],
									'backgroundColor'=>"#FEF9E7"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#1B4F72"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][2],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][4],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[4],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][5],
									'backgroundColor'=>"#EBF5FB"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#7B241C"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][2],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][4],
									'backgroundColor'=>"#FADBD8"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[4],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][5],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][5],
									'backgroundColor'=>"#EBDEF0"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][4],
									'backgroundColor'=>"#48C9B0"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[4],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][5],
									'backgroundColor'=>"#D1F2EB"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][4],
									'backgroundColor'=>"#F7DC6F"
					        	],

					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[4],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][5],
									'backgroundColor'=>"#FCF3CF"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[3],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][4],
									'backgroundColor'=>"#D7DBDD"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[4],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][5],
									'backgroundColor'=>"#F2F3F4"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[3],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][4],
									'backgroundColor'=>"#F1948A"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[4],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][5],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);

				 		}
				 		
			        $chartprogram->optionsRaw([
			        	'scales' => [
					        'yAxes' => [
					            	[
					            	'stacked' => true,
					                'ticks' => [
					                	'beginAtZero' => true
					                ]
					            ]
					        ],
					        'xAxes' => [
					            	[
					            	'stacked' => true,
					                'ticks' => [
					                	'beginAtZero' => true
					                ]
					            ]
					        ]
					    ],
					    'title' => [
					    	'display' => true,
					    	'text' => 'Main Program Graph',
					    	'fontSize' => 16
					    ],
					    'legend' => [
					    	'display' => true,
					    	'position' => 'right',
					    	'labels' => [
					    		'padding' => 16
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
					    'title' => [
					    	'display' => true,
					    	'text' => 'Job Family Graph',
					    	'fontSize' => 16
					    ],
					    'legend' => [
					    	'display' => true,
					    	'position' => 'right',
					    	'labels' => [
					    		'padding' => 16
					    	]	
					    ]

			        ]);

			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);

			 	}
 				elseif($program == 'all' && $families != 'all') {
    				$nomor1 = 0;
    					foreach($mainprogram as $main) {
    						$label_name[] = $main->name;

				 			for($x = 1; $x <= $finish; $x++) {
				 			
				 			$dataprogram[$nomor1][$x][] = Nits::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Consumer::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Disp::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Wins::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Mobile::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Enterprise::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Business::getByProgram($start, $x, $main->name);
				 			$dataprogram[$nomor1][$x][] = Leadership::getByProgram($start, $x, $main->name);
				 			}
				 			$nomor1++;
				 		}


				 		
				 			
				 			for($x = 1; $x <= $finish; $x++) {
				 			$datafamily[0][$x][] = Nits::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Consumer::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Disp::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Wins::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Mobile::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Enterprise::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Business::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Leadership::getByFamily($start,$x,$families);
				 			}	
				 			

				 		$label_temp = [];
				 		for($x = 1; $x <= $finish; $x++) {
				 			$label_temp[] = $start+$x;
				 		}


				 		if($finish == 1) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	]
				        	
				        ])
				        ->options([]);

				        	$chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	
					        	
					        	
					        	
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 2) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][2],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][2],
									'backgroundColor'=>"#CB4335"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	
					        	
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 3) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#FADBD8"
					        	]
					        	
					        ])
					        ->options([]);

					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 4) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#FEF9E7"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][4],
									'backgroundColor'=>"#EBF5FB"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#FADBD8"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][4],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	]
					        	
					        ])
					        ->options([]);


				 		} else {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#7E5109"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][5],
									'backgroundColor'=>"#FEF9E7"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#1B4F72"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][4],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[4],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][5],
									'backgroundColor'=>"#EBF5FB"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#7B241C"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][4],
									'backgroundColor'=>"#FADBD8"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[4],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][5],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][5],
									'backgroundColor'=>"#EBDEF0"
					        	]
					        	
					        ])
					        ->options([]);
					    }

			        $chartprogram->optionsRaw([
			        	'scales' => [
					        'yAxes' => [
					            	[
					            	'stacked' => true,
					                'ticks' => [
					                	'beginAtZero' => true
					                ]
					            ]
					        ],
					        'xAxes' => [
					            	[
					            	'stacked' => true,
					                'ticks' => [
					                	'beginAtZero' => true
					                ]
					            ]
					        ]
					    ],
					    'title' => [
					    	'display' => true,
					    	'text' => 'Main Program Graph',
					    	'fontSize' => 16
					    ],
					    'legend' => [
					    	'display' => true,
					    	'position' => 'right',
					    	'labels' => [
					    		'padding' => 16
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
					    'title' => [
					    	'display' => true,
					    	'text' => 'Job Family Graph',
					    	'fontSize' => 16
					    ],
					    'legend' => [
					    	'display' => true,
					    	'position' => 'right',
					    	'labels' => [
					    		'padding' => 16
					    	]	
					    ]

			        ]);

			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			       
    			} 
    			elseif($program != 'all' && $families == 'all') {
    		
				 			for($x = 1; $x <= $finish; $x++) {
				 			
				 			$dataprogram[0][$x][] = Nits::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Consumer::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Disp::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Wins::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Mobile::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Enterprise::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Business::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Leadership::getByProgram($start, $x, $program);
				 			}
				 			
				 		$nomor2 = 0;
				 		foreach($jobfamily as $family) {
				 			$label_family[] = $family->name;

				 			for($x = 1; $x <= $finish; $x++) {
				 			$datafamily[$nomor2][$x][] = Nits::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Consumer::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Disp::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Wins::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Mobile::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Enterprise::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Business::getByFamily($start,$x,$family->name);
				 			$datafamily[$nomor2][$x][] = Leadership::getByFamily($start,$x,$family->name);
				 			}	
				 			$nomor2++; 	
				 		}

				 		$label_temp = [];
				 		for($x = 1; $x <= $finish; $x++) {
				 			$label_temp[] = $start+$x;
				 		}
				 		
				 		if($finish == 1) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	]
				        	
				        ])
				        ->options([]);

				        	$chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],

					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	]
					        	
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 2) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 3) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	]
					        	
					        ])
					        ->options([]);

					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 4) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#FEF9E7"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][4],
									'backgroundColor'=>"#48C9B0"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[3],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][4],
									'backgroundColor'=>"#D7DBDD"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[3],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][4],
									'backgroundColor'=>"#F1948A"
					        	]
					        	
					        ])
					        ->options([]);
					    }
					    else {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#7E5109"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][5],
									'backgroundColor'=>"#FEF9E7"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][5],
									'backgroundColor'=>"#EBDEF0"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][4],
									'backgroundColor'=>"#48C9B0"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[4],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][5],
									'backgroundColor'=>"#D1F2EB"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][4],
									'backgroundColor'=>"#F7DC6F"
					        	],

					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[4],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][5],
									'backgroundColor'=>"#FCF3CF"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[3],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][4],
									'backgroundColor'=>"#D7DBDD"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[4],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][5],
									'backgroundColor'=>"#F2F3F4"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[3],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][4],
									'backgroundColor'=>"#F1948A"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[4],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][5],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);

				 		}
				 		
					        $chartprogram->optionsRaw([
					        	'scales' => [
							        'yAxes' => [
							            	[
							            	'stacked' => true,
							                'ticks' => [
							                	'beginAtZero' => true
							                ]
							            ]
							        ],
							        'xAxes' => [
							            	[
							            	'stacked' => true,
							                'ticks' => [
							                	'beginAtZero' => true
							                ]
							            ]
							        ]
							    ],
							    'title' => [
							    	'display' => true,
							    	'text' => 'Main Program Graph',
							    	'fontSize' => 16
							    ],
							    'legend' => [
							    	'display' => true,
							    	'position' => 'right',
							    	'labels' => [
							    		'padding' => 16
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
							    'title' => [
							    	'display' => true,
							    	'text' => 'Job Family Graph',
							    	'fontSize' => 16
							    ],
							    'legend' => [
							    	'display' => true,
							    	'position' => 'right',
							    	'labels' => [
							    		'padding' => 16
							    	]	
							    ]

					        ]);

					        return view('reports')->with('mainprogram', $mainprogram)
		        					  ->with('jobfamily', $jobfamily)
		        					  ->with('chartprogram', $chartprogram)
		        					  ->with('chartfamily', $chartfamily);
			 	}
			 	elseif($program != 'all' && $families != 'all') {
			 				for($x = 1; $x <= $finish; $x++) {
				 			$dataprogram[0][$x][] = Nits::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Consumer::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Disp::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Wins::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Mobile::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Enterprise::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Business::getByProgram($start, $x, $program);
				 			$dataprogram[0][$x][] = Leadership::getByProgram($start, $x, $program);
				 			}
				 			
				 			for($x = 1; $x <= $finish; $x++) {
				 			$datafamily[0][$x][] = Nits::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Consumer::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Disp::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Wins::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Mobile::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Enterprise::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Business::getByFamily($start,$x,$families);
				 			$datafamily[0][$x][] = Leadership::getByFamily($start,$x,$families);
				 			}	
				 			
				 		$label_temp = [];
				 		for($x = 1; $x <= $finish; $x++) {
				 			$label_temp[] = $start+$x;
				 		}
				 		
				 		if($finish == 1) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	]
				        	
				        ])
				        ->options([]);

				        	$chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	]
	
					        ])
					        ->options([]);

				 		} elseif($finish == 2) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 3) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	]
					        	
					        ])
					        ->options([]);

					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 4) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#FEF9E7"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	]
					        	
					        ])
					        ->options([]);
					    }
					    else {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#7E5109"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][5],
									'backgroundColor'=>"#FEF9E7"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][5],
									'backgroundColor'=>"#EBDEF0"
					        	]
					        	
					        ])
					        ->options([]);

				 		}
				 		
					        $chartprogram->optionsRaw([
					        	'scales' => [
							        'yAxes' => [
							            	[
							            	'stacked' => true,
							                'ticks' => [
							                	'beginAtZero' => true
							                ]
							            ]
							        ],
							        'xAxes' => [
							            	[
							            	'stacked' => true,
							                'ticks' => [
							                	'beginAtZero' => true
							                ]
							            ]
							        ]
							    ],
							    'title' => [
							    	'display' => true,
							    	'text' => 'Main Program Graph',
							    	'fontSize' => 16
							    ],
							    'legend' => [
							    	'display' => true,
							    	'position' => 'right',
							    	'labels' => [
							    		'padding' => 16
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
							    'title' => [
							    	'display' => true,
							    	'text' => 'Job Family Graph',
							    	'fontSize' => 16
							    ],
							    'legend' => [
							    	'display' => true,
							    	'position' => 'right',
							    	'labels' => [
							    		'padding' => 16
							    	]	
							    ]

					        ]);

					        return view('reports')->with('mainprogram', $mainprogram)
		        					  ->with('jobfamily', $jobfamily)
		        					  ->with('chartprogram', $chartprogram)
		        					  ->with('chartfamily', $chartfamily);
			 	
			 		
			}} else {
				$className = 'App\\'.$academy;
				if($program == 'all' && $families == 'all') {
    					
    					$nomor1 = 0;
    					foreach($mainprogram as $main) {
    						$label_name[] = $main->name;

				 			for($x = 1; $x <= $finish; $x++) {
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '01');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '02');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '03');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '04');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '05');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '06');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '07');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '08');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '09');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '10');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '11');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '12');
				 			}
				 			$nomor1++;
				 		}
				 			
				 		$nomor2 = 0;
				 		foreach($jobfamily as $family) {
				 			$label_family[] = $family->name;

				 			for($x = 1; $x <= $finish; $x++) {
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '01');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '02');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '03');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '04');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '05');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '06');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '07');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '08');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '09');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '10');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '11');
				 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '12');
				 			}	
				 			$nomor2++; 	
				 		}

				 		$label_temp = [];
				 		for($x = 1; $x <= $finish; $x++) {
				 			$label_temp[] = $start+$x;
				 		}
				 		
				 		if($finish == 1) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	]
				        	
				        ])
				        ->options([]);

				        	$chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],

					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	]
					        	
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 2) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][2],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][2],
									'backgroundColor'=>"#CB4335"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 3) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][2],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][2],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#FADBD8"
					        	]
					        	
					        ])
					        ->options([]);

					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 4) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#FEF9E7"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][2],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][4],
									'backgroundColor'=>"#EBF5FB"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][2],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#FADBD8"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][4],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][4],
									'backgroundColor'=>"#48C9B0"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[3],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][4],
									'backgroundColor'=>"#D7DBDD"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[3],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][4],
									'backgroundColor'=>"#F1948A"
					        	]
					        	
					        ])
					        ->options([]);


				 		} else {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#7E5109"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][5],
									'backgroundColor'=>"#FEF9E7"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#1B4F72"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][2],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][4],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[4],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][5],
									'backgroundColor'=>"#EBF5FB"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#7B241C"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][2],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][4],
									'backgroundColor'=>"#FADBD8"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[4],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][5],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][5],
									'backgroundColor'=>"#EBDEF0"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][4],
									'backgroundColor'=>"#48C9B0"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[4],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][5],
									'backgroundColor'=>"#D1F2EB"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][4],
									'backgroundColor'=>"#F7DC6F"
					        	],

					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[4],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][5],
									'backgroundColor'=>"#FCF3CF"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[3],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][4],
									'backgroundColor'=>"#D7DBDD"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[4],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][5],
									'backgroundColor'=>"#F2F3F4"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[3],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][4],
									'backgroundColor'=>"#F1948A"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[4],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][5],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);

				 		}
				 		
			        $chartprogram->optionsRaw([
			        	'scales' => [
					        'yAxes' => [
					            	[
					            	'stacked' => true,
					                'ticks' => [
					                	'beginAtZero' => true
					                ]
					            ]
					        ],
					        'xAxes' => [
					            	[
					            	'stacked' => true,
					                'ticks' => [
					                	'beginAtZero' => true
					                ]
					            ]
					        ]
					    ],
					    'title' => [
					    	'display' => true,
					    	'text' => 'Main Program Graph',
					    	'fontSize' => 16
					    ],
					    'legend' => [
					    	'display' => true,
					    	'position' => 'right',
					    	'labels' => [
					    		'padding' => 16
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
					    'title' => [
					    	'display' => true,
					    	'text' => 'Job Family Graph',
					    	'fontSize' => 16
					    ],
					    'legend' => [
					    	'display' => true,
					    	'position' => 'right',
					    	'labels' => [
					    		'padding' => 16
					    	]	
					    ]

			        ]);

			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);

			 	}
 				elseif($program == 'all' && $families != 'all') {
    				$nomor1 = 0;
    					foreach($mainprogram as $main) {
    						$label_name[] = $main->name;

				 			for($x = 1; $x <= $finish; $x++) {
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '01');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '02');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '03');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '04');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '05');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '06');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '07');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '08');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '09');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '10');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '11');
				 			$dataprogram[$nomor1][$x][] = $className::getByMonthProgram($start, $finish, $main->name, '12');
				 			}
				 			$nomor1++;
				 		}
				 			
				 		
				 		
				 			

				 			for($x = 1; $x <= $finish; $x++) {
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '01');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '02');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '03');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '04');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '05');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '06');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '07');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '08');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '09');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '10');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '11');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '12');
				 			}	
				 		
				 			

				 		$label_temp = [];
				 		for($x = 1; $x <= $finish; $x++) {
				 			$label_temp[] = $start+$x;
				 		}


				 		if($finish == 1) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	]
				        	
				        ])
				        ->options([]);

				        	$chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	
					        	
					        	
					        	
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 2) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][1],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][2],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][1],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][2],
									'backgroundColor'=>"#CB4335"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	
					        	
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 3) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#FADBD8"
					        	]
					        	
					        ])
					        ->options([]);

					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 4) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#FEF9E7"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][4],
									'backgroundColor'=>"#EBF5FB"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#FADBD8"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][4],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	]
					        	
					        ])
					        ->options([]);


				 		} else {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#7E5109"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_name[0].' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][5],
									'backgroundColor'=>"#FEF9E7"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#1B4F72"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#21618C"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][3],
									'backgroundColor'=>"#2E86C1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][4],
									'backgroundColor'=>"#AED6F1"
					        	],
					        	[	
					        		'label'=>$label_name[1].' - '.$label_temp[4],
					        		'stack'=>'Stack 2',
									'data'=>$dataprogram[1][5],
									'backgroundColor'=>"#EBF5FB"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#7B241C"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#943126"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][3],
									'backgroundColor'=>"#CB4335"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][4],
									'backgroundColor'=>"#FADBD8"
					        	],
					        	[	
					        		'label'=>$label_name[2].' - '.$label_temp[4],
					        		'stack'=>'Stack 3',
									'data'=>$dataprogram[2][5],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][5],
									'backgroundColor'=>"#EBDEF0"
					        	]
					        	
					        ])
					        ->options([]);
					    }

			        $chartprogram->optionsRaw([
			        	'scales' => [
					        'yAxes' => [
					            	[
					            	'stacked' => true,
					                'ticks' => [
					                	'beginAtZero' => true
					                ]
					            ]
					        ],
					        'xAxes' => [
					            	[
					            	'stacked' => true,
					                'ticks' => [
					                	'beginAtZero' => true
					                ]
					            ]
					        ]
					    ],
					    'title' => [
					    	'display' => true,
					    	'text' => 'Main Program Graph',
					    	'fontSize' => 16
					    ],
					    'legend' => [
					    	'display' => true,
					    	'position' => 'right',
					    	'labels' => [
					    		'padding' => 16
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
					    'title' => [
					    	'display' => true,
					    	'text' => 'Job Family Graph',
					    	'fontSize' => 16
					    ],
					    'legend' => [
					    	'display' => true,
					    	'position' => 'right',
					    	'labels' => [
					    		'padding' => 16
					    	]	
					    ]

			        ]);

			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			       
    			} 
    			elseif($program != 'all' && $families == 'all') {
    		
				 			
					 			for($x = 1; $x <= $finish; $x++) {
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '01');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '02');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '03');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '04');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '05');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '06');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '07');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '08');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '09');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '10');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '11');
					 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '12');
					 			}
					 		
					 			
					 		$nomor2 = 0;
					 		foreach($jobfamily as $family) {
					 			$label_family[] = $family->name;

					 			for($x = 1; $x <= $finish; $x++) {
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '01');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '02');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '03');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '04');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '05');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '06');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '07');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '08');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '09');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '10');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '11');
					 			$datafamily[$nomor2][$x][] = $className::getByMonthFamily($start,$finish,$family->name, '12');
					 			}	
					 			$nomor2++; 	
					 		}

				 		$label_temp = [];
				 		for($x = 1; $x <= $finish; $x++) {
				 			$label_temp[] = $start+$x;
				 		}
				 		
				 		if($finish == 1) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	]
				        	
				        ])
				        ->options([]);

				        	$chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],

					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	]
					        	
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 2) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 3) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	]
					        	
					        ])
					        ->options([]);

					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 4) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#FEF9E7"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][4],
									'backgroundColor'=>"#48C9B0"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[3],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][4],
									'backgroundColor'=>"#D7DBDD"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[3],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][4],
									'backgroundColor'=>"#F1948A"
					        	]
					        	
					        ])
					        ->options([]);
					    }
					    else {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#7E5109"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][5],
									'backgroundColor'=>"#FEF9E7"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	[	
					        		'label'=>$label_family[0].' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][5],
									'backgroundColor'=>"#EBDEF0"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[0],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][1],
									'backgroundColor'=>"#0E6251"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[1],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][2],
									'backgroundColor'=>"#148F77"
					        	],
					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[2],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][3],
									'backgroundColor'=>"#1ABC9C"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[3],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][4],
									'backgroundColor'=>"#48C9B0"
					        	],

					        	[	
					        		'label'=>$label_family[1].' - '.$label_temp[4],
					        		'stack'=>'Stack 2',
									'data'=>$datafamily[1][5],
									'backgroundColor'=>"#D1F2EB"
					        	],
					        	
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[0],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][1],
									'backgroundColor'=>"#7D6608"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[1],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][2],
									'backgroundColor'=>"#B7950B"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[2],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][3],
									'backgroundColor'=>"#F1C40F"
					        	],
					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[3],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][4],
									'backgroundColor'=>"#F7DC6F"
					        	],

					        	[	
					        		'label'=>$label_family[2].' - '.$label_temp[4],
					        		'stack'=>'Stack 3',
									'data'=>$datafamily[2][5],
									'backgroundColor'=>"#FCF3CF"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[0],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][1],
									'backgroundColor'=>"#4D5656"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[1],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][2],
									'backgroundColor'=>"#717D7E"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[2],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][3],
									'backgroundColor'=>"#95A5A6"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[3],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][4],
									'backgroundColor'=>"#D7DBDD"
					        	],
					        	[	
					        		'label'=>$label_family[3].' - '.$label_temp[4],
					        		'stack'=>'Stack 4',
									'data'=>$datafamily[3][5],
									'backgroundColor'=>"#F2F3F4"
					        	],

					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[0],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][1],
									'backgroundColor'=>"#78281F"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[1],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][2],
									'backgroundColor'=>"#B03A2E"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[2],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][3],
									'backgroundColor'=>"#E74C3C"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[3],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][4],
									'backgroundColor'=>"#F1948A"
					        	],
					        	[	
					        		'label'=>$label_family[4].' - '.$label_temp[4],
					        		'stack'=>'Stack 5',
									'data'=>$datafamily[4][5],
									'backgroundColor'=>"#FDEDEC"
					        	]
					        	
					        ])
					        ->options([]);

				 		}
				 		
					        $chartprogram->optionsRaw([
					        	'scales' => [
							        'yAxes' => [
							            	[
							            	'stacked' => true,
							                'ticks' => [
							                	'beginAtZero' => true
							                ]
							            ]
							        ],
							        'xAxes' => [
							            	[
							            	'stacked' => true,
							                'ticks' => [
							                	'beginAtZero' => true
							                ]
							            ]
							        ]
							    ],
							    'title' => [
							    	'display' => true,
							    	'text' => 'Main Program Graph',
							    	'fontSize' => 16
							    ],
							    'legend' => [
							    	'display' => true,
							    	'position' => 'right',
							    	'labels' => [
							    		'padding' => 16
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
							    'title' => [
							    	'display' => true,
							    	'text' => 'Job Family Graph',
							    	'fontSize' => 16
							    ],
							    'legend' => [
							    	'display' => true,
							    	'position' => 'right',
							    	'labels' => [
							    		'padding' => 16
							    	]	
							    ]

					        ]);

					        return view('reports')->with('mainprogram', $mainprogram)
		        					  ->with('jobfamily', $jobfamily)
		        					  ->with('chartprogram', $chartprogram)
		        					  ->with('chartfamily', $chartfamily);
			 	}
			 	elseif($program != 'all' && $families != 'all') {
			 				
				 			for($x = 1; $x <= $finish; $x++) {
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '01');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '02');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '03');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '04');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '05');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '06');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '07');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '08');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '09');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '10');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '11');
				 			$dataprogram[0][$x][] = $className::getByMonthProgram($start, $finish, $program, '12');
				 			}

				 			for($x = 1; $x <= $finish; $x++) {
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '01');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '02');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '03');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '04');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '05');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '06');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '07');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '08');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '09');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '10');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '11');
				 			$datafamily[0][$x][] = $className::getByMonthFamily($start,$finish,$families, '12');
				 			}	
				 	
				 			
				 		$label_temp = [];
				 		for($x = 1; $x <= $finish; $x++) {
				 			$label_temp[] = $start+$x;
				 		}
				 		
				 		if($finish == 1) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	]
				        	
				        ])
				        ->options([]);

				        	$chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	]
	
					        ])
					        ->options([]);

				 		} elseif($finish == 2) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 3) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	]
					        	
					        ])
					        ->options([]);

					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	]
					        	
					        ])
					        ->options([]);

				 		} elseif($finish == 4) {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#FEF9E7"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	]
					        	
					        ])
					        ->options([]);
					    }
					    else {
				 			$chartprogram = app()->chartjs
					        ->name('MainProgram')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$program.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][1],
									'backgroundColor'=>"#7E5109"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][2],
									'backgroundColor'=>"#9A7D0A"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][3],
									'backgroundColor'=>"#D4AC0D"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][4],
									'backgroundColor'=>"#F7DC6F"
					        	],
					        	[	
					        		'label'=>$program.' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$dataprogram[0][5],
									'backgroundColor'=>"#FEF9E7"
					        	]
					        	
					        ])
					        ->options([]);


					        $chartfamily = app()->chartjs
					        ->name('JobFamily')
					        ->type('bar')
					        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
					        ->datasets([
					        	[	
					        		'label'=>$families.' - '.$label_temp[0],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][1],
									'backgroundColor'=>"#512E5F"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[1],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][2],
									'backgroundColor'=>"#76448A"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[2],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][3],
									'backgroundColor'=>"#9B59B6"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[3],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][4],
									'backgroundColor'=>"#C39BD3"
					        	],
					        	[	
					        		'label'=>$families.' - '.$label_temp[4],
					        		'stack'=>'Stack 1',
									'data'=>$datafamily[0][5],
									'backgroundColor'=>"#EBDEF0"
					        	]
					        	
					        ])
					        ->options([]);

				 		}
				 		
					        $chartprogram->optionsRaw([
					        	'scales' => [
							        'yAxes' => [
							            	[
							            	'stacked' => true,
							                'ticks' => [
							                	'beginAtZero' => true
							                ]
							            ]
							        ],
							        'xAxes' => [
							            	[
							            	'stacked' => true,
							                'ticks' => [
							                	'beginAtZero' => true
							                ]
							            ]
							        ]
							    ],
							    'title' => [
							    	'display' => true,
							    	'text' => 'Main Program Graph',
							    	'fontSize' => 16
							    ],
							    'legend' => [
							    	'display' => true,
							    	'position' => 'right',
							    	'labels' => [
							    		'padding' => 16
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
							    'title' => [
							    	'display' => true,
							    	'text' => 'Job Family Graph',
							    	'fontSize' => 16
							    ],
							    'legend' => [
							    	'display' => true,
							    	'position' => 'right',
							    	'labels' => [
							    		'padding' => 16
							    	]	
							    ]

					        ]);

					        return view('reports')->with('mainprogram', $mainprogram)
		        					  ->with('jobfamily', $jobfamily)
		        					  ->with('chartprogram', $chartprogram)
		        					  ->with('chartfamily', $chartfamily);
			 	
    		}
    	}
    	
    }
}
					
