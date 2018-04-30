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

        return view('reports')->with('finish', 0);
        					  

    }



    public static function updateReports(Request $request) {
    	$start = Input::get('start_date');
    	$finish = Input::get('finish_date');

    	$countTahun = $finish-$start+1;
    	$label_name = [];
				for($x = 0; $x < $countTahun; $x++) {
						$temp = $start + $x;
						$label_name[] = $temp;
			 			$sumLulus = Nits::jumlahLulus($start+$x) + Consumer::jumlahLulus($start+$x) + Disp::jumlahLulus($start+$x) + Wins::jumlahLulus($start+$x) + Mobile::jumlahLulus($start+$x) + Enterprise::jumlahLulus($start+$x) + Business::jumlahLulus($start+$x) + Leadership::jumlahLulus($start+$x) ;
			 			$dataLulus[] = $sumLulus;


			 			$sumTidakLulus = Nits::jumlahTidakLulus($start+$x) + Consumer::jumlahTidakLulus($start+$x) + Disp::jumlahTidakLulus($start+$x) + Wins::jumlahTidakLulus($start+$x) + Mobile::jumlahTidakLulus($start+$x) + Enterprise::jumlahTidakLulus($start+$x) + Business::jumlahTidakLulus($start+$x) + Leadership::jumlahTidakLulus($start+$x) ;
			 			$dataTidakLulus[] = $sumTidakLulus;
			 			$total1[] = $sumLulus + $sumTidakLulus; 


			 			$sumValid = Nits::lulusValid($start+$x, date("Y/m/d")) + Consumer::lulusValid($start+$x, date("Y/m/d")) + Disp::lulusValid($start+$x, date("Y/m/d")) + Wins::lulusValid($start+$x, date("Y/m/d")) + Mobile::lulusValid($start+$x, date("Y/m/d")) + Enterprise::lulusValid($start+$x, date("Y/m/d")) + Business::lulusValid($start+$x, date("Y/m/d")) + Leadership::lulusValid($start+$x, date("Y/m/d")) ;
			 			$valid[] = $sumValid;

			 			$sumTidakValid = Nits::lulusTidakValid($start+$x, date("Y/m/d")) + Consumer::lulusTidakValid($start+$x, date("Y/m/d")) + Disp::lulusTidakValid($start+$x, date("Y/m/d")) + Wins::lulusTidakValid($start+$x, date("Y/m/d")) + Mobile::lulusTidakValid($start+$x, date("Y/m/d")) + Enterprise::lulusTidakValid($start+$x, date("Y/m/d")) + Business::lulusTidakValid($start+$x, date("Y/m/d")) + Leadership::lulusTidakValid($start+$x, date("Y/m/d")) ;
			 			$tidakvalid[] = $sumTidakValid;

			 			$total2[] = $sumValid + $sumTidakValid;

		 			}

			 		$chartlulus = app()->chartjs
				        ->name('Lulus')
				        ->type('bar')
				        ->labels($label_name)
				        ->datasets([
				        	[	
				        		'label'=>'Lulus',
								'data'=>$dataLulus,
								'backgroundColor'=>"#82E0AA"
				        	],
				        	[	
				        		'label'=>'Tidak Lulus',
								'data'=>$dataTidakLulus,
								'backgroundColor'=>"#F08080"
				        	],
				        	[	
				        		'label'=>'Total',
								'data'=>$total1,
								'borderColor'=>"#2E4053",
								'borderWith'=>'2',
								'fill'=>'false',
								'type'=>'line'	
				        	]
			        	
			        	])
			        	->options([]);


			        	$chartlulus->optionsRaw([
			        		'scales' => [
						        'yAxes' => [
						            	[
						                'ticks' => [
						                	'beginAtZero' => true
						                ],
						                'gridLines' => [
						                	'color' => 'rgba(0,0,0,0)'
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
						    'title' => [
						    	'display' => true,
						    	'text' => 'Lulus dan Tidak Lulus',
						    	'fontSize' => 16
						    ],
						    'legend' => [
						    	'display' => true,
						    	'position' => 'right',
						    	'labels' => [
						    		'padding' => 12
						    	]	
						    ]
			        	]);

			        $chartvalid = app()->chartjs
				        ->name('Valid')
				        ->type('bar')
				        ->labels($label_name)
				        ->datasets([
				        	[	
				        		'label'=>'Valid',
								'data'=>$valid,
								'backgroundColor'=>"#82E0AA"
				        	],
				        	[	
				        		'label'=>'Tidak Valid',
								'data'=>$tidakvalid,
								'backgroundColor'=>"#F08080"
				        	],
				        	[	
				        		'label'=>'Total',
								'data'=>$total2,
								'borderColor'=>"#2E4053",
								'borderWith'=>'2',
								'fill'=>'false',
								'type'=>'line'	
				        	]
			        	
			        	])
			        	->options([]);


			        	$chartvalid->optionsRaw([
			        		'scales' => [
						        'yAxes' => [
						            	[
						                'ticks' => [
						                	'beginAtZero' => true
						                ],
						                'gridLines' => [
						                	'color' => 'rgba(0,0,0,0)'
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
						    'title' => [
						    	'display' => true,
						    	'text' => 'Valid dan Tidak Valid',
						    	'fontSize' => 16
						    ],
						    'legend' => [
						    	'display' => true,
						    	'position' => 'right',
						    	'labels' => [
						    		'padding' => 12
						    	]	
						    ]
			        	]);
			        		
			        	
		        	return view('reports')->with('finish', 1)
        					  			  ->with('chartlulus', $chartlulus)
        					  			  ->with('chartvalid', $chartvalid);
        					  
	        	
			
				}


	public static function updateReportsYear(Request $request) {
    	$years = Input::get('years');
				
	 			$dataLulus[] = Nits::jumlahLulus($years);
	 			$dataLulus[] = Consumer::jumlahLulus($years);
	 			$dataLulus[] = Disp::jumlahLulus($years);
	 			$dataLulus[] = Wins::jumlahLulus($years);
	 			$dataLulus[] = Mobile::jumlahLulus($years);
	 			$dataLulus[] = Enterprise::jumlahLulus($years);
	 			$dataLulus[] = Business::jumlahLulus($years);
	 			$dataLulus[] = Leadership::jumlahLulus($years);

	 			$dataTidakLulus[] = Nits::jumlahTidakLulus($years);
	 			$dataTidakLulus[] = Consumer::jumlahTidakLulus($years);
	 			$dataTidakLulus[] = Disp::jumlahTidakLulus($years);
	 			$dataTidakLulus[] = Wins::jumlahTidakLulus($years);
	 			$dataTidakLulus[] = Mobile::jumlahTidakLulus($years);
	 			$dataTidakLulus[] = Enterprise::jumlahTidakLulus($years);
	 			$dataTidakLulus[] = Business::jumlahTidakLulus($years);
	 			$dataTidakLulus[] = Leadership::jumlahTidakLulus($years);

	 			$total1[] = Nits::jumlahLulus($years) + Nits::jumlahTidakLulus($years);
	 			$total1[] = Consumer::jumlahLulus($years) + Consumer::jumlahTidakLulus($years);
	 			$total1[] = Disp::jumlahLulus($years) + Disp::jumlahTidakLulus($years);
	 			$total1[] = Wins::jumlahLulus($years) + Wins::jumlahTidakLulus($years);
	 			$total1[] = Mobile::jumlahLulus($years) + Mobile::jumlahTidakLulus($years);
	 			$total1[] = Enterprise::jumlahLulus($years) + Enterprise::jumlahTidakLulus($years);
	 			$total1[] = Business::jumlahLulus($years) + Business::jumlahTidakLulus($years);
	 			$total1[] = Leadership::jumlahLulus($years) + Leadership::jumlahTidakLulus($years);
	 			

	 			$valid[] = Nits::lulusValid($years, date("Y/m/d"));
	 			$valid[] = Consumer::lulusValid($years, date("Y/m/d"));
	 			$valid[] = Disp::lulusValid($years, date("Y/m/d"));
	 			$valid[] = Wins::lulusValid($years, date("Y/m/d"));
	 			$valid[] = Mobile::lulusValid($years, date("Y/m/d"));
	 			$valid[] = Enterprise::lulusValid($years, date("Y/m/d"));
	 			$valid[] = Business::lulusValid($years, date("Y/m/d"));
	 			$valid[] = Leadership::lulusValid($years, date("Y/m/d"));

	 			$tidakvalid[] = Nits::lulusTidakValid($years, date("Y/m/d"));
	 			$tidakvalid[] = Consumer::lulusTidakValid($years, date("Y/m/d"));
	 			$tidakvalid[] = Disp::lulusTidakValid($years, date("Y/m/d"));
	 			$tidakvalid[] = Wins::lulusTidakValid($years, date("Y/m/d"));
	 			$tidakvalid[] = Mobile::lulusTidakValid($years, date("Y/m/d"));
	 			$tidakvalid[] = Enterprise::lulusTidakValid($years, date("Y/m/d"));
	 			$tidakvalid[] = Business::lulusTidakValid($years, date("Y/m/d"));
	 			$tidakvalid[] = Leadership::lulusTidakValid($years, date("Y/m/d"));
	 			
	 			$total2[] = Nits::lulusValid($years, date("Y/m/d")) + Nits::lulusTidakValid($years, date("Y/m/d"));
	 			$total2[] = Consumer::lulusValid($years, date("Y/m/d")) + Consumer::lulusTidakValid($years, date("Y/m/d"));
	 			$total2[] = Disp::lulusValid($years, date("Y/m/d")) + Disp::lulusTidakValid($years, date("Y/m/d"));
	 			$total2[] = Wins::lulusValid($years, date("Y/m/d")) + Wins::lulusTidakValid($years, date("Y/m/d"));
	 			$total2[] = Mobile::lulusValid($years, date("Y/m/d")) + Mobile::lulusTidakValid($years, date("Y/m/d"));
	 			$total2[] = Enterprise::lulusValid($years, date("Y/m/d")) + Enterprise::lulusTidakValid($years, date("Y/m/d"));
	 			$total2[] = Business::lulusValid($years, date("Y/m/d")) + Business::lulusTidakValid($years, date("Y/m/d"));
	 			$total2[] = Leadership::lulusValid($years, date("Y/m/d")) + Leadership::lulusTidakValid($years, date("Y/m/d"));

			 		$chartlulus = app()->chartjs
				        ->name('Lulus')
				        ->type('bar')
				        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business Enabler', 'Leadership'])
				        ->datasets([
				        	[	
				        		'label'=>'Lulus',
								'data'=>$dataLulus,
								'backgroundColor'=>"#5DADE2"
				        	],
				        	[	
				        		'label'=>'Tidak Lulus',
								'data'=>$dataTidakLulus,
								'backgroundColor'=>"#F4D03F"
				        	],
				        	[	
				        		'label'=>'Total',
								'data'=>$total1,
								'borderColor'=>"#17202A",
								'borderWith'=>'2',
								'fill'=>'false',
								'type'=>'line'	
				        	]
			        	
			        	])
			        	->options([]);


			        	$chartlulus->optionsRaw([
			        		'scales' => [
						        'yAxes' => [
						            	[
						                'ticks' => [
						                	'beginAtZero' => true
						                ],
						                'gridLines' => [
						                	'color' => 'rgba(0,0,0,0)'
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
						    'title' => [
						    	'display' => true,
						    	'text' => 'Lulus dan Tidak Lulus',
						    	'fontSize' => 16
						    ],
						    'legend' => [
						    	'display' => true,
						    	'position' => 'right',
						    	'labels' => [
						    		'padding' => 12
						    	]	
						    ]
			        	]);

			        $chartvalid = app()->chartjs
				        ->name('Valid')
				        ->type('bar')
				        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business Enabler', 'Leadership'])
				        ->datasets([
				        	[	
				        		'label'=>'Valid',
								'data'=>$valid,
								'backgroundColor'=>"#5DADE2"
				        	],
				        	[	
				        		'label'=>'Tidak Valid',
								'data'=>$tidakvalid,
								'backgroundColor'=>"#F4D03F"
				        	],
				        	[	
				        		'label'=>'Total',
								'data'=>$total2,
								'borderColor'=>"#17202A",
								'borderWith'=>'2',
								'fill'=>'false',
								'type'=>'line'	
				        	]
			        	
			        	])
			        	->options([]);


			        	$chartvalid->optionsRaw([
			        		'scales' => [
						        'yAxes' => [
						            	[
						                'ticks' => [
						                	'beginAtZero' => true
						                ],
						                'gridLines' => [
						                	'color' => 'rgba(0,0,0,0)'
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
						    'title' => [
						    	'display' => true,
						    	'text' => 'Valid dan Tidak Valid',
						    	'fontSize' => 16
						    ],
						    'legend' => [
						    	'display' => true,
						    	'position' => 'right',
						    	'labels' => [
						    		'padding' => 12
						    	]	
						    ]
			        	]);
			        		
			        	
		        	return view('reports')->with('finish', 2)
        					  			  ->with('chartlulus', $chartlulus)
        					  			  ->with('chartvalid', $chartvalid);
        					  
	        	
			
				}

    	
}
					
