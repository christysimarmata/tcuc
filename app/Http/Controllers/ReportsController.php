<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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

    	$list_table = DB::table('academy')->where('flag', date("Y"))->get();
    	if($finish <= $start) {
    		return redirect('reports')->with('status', 'Finish years cannot be greater than Starting Years');
    	} elseif($countTahun > 20) {
    		return redirect('reports')->with('status', 'Maximum range is 20 years');
    	} else {
    		$label_name = [];
				for($x = 0; $x < $countTahun; $x++) {
						$temp = $start + $x;
						$label_name[] = $temp;
						$sum_lulus = 0;
						$sum_tidak_lulus = 0;
						$sum_valid = 0;
						$sum_tidak_valid = 0;
						foreach($list_table as $list) {
							$temp_lulus = DB::table($list->table)->whereYear('start_date', '<=', $start+$x)
																			->whereYear('finish_date', '>=', $start+$x)
									 										->get(); 

							$temp_lulus_valid = DB::table($list->table)->whereYear('start_date', '<=', $start+$x)
																			 ->whereYear('finish_date', '>=', $start+$x)
																			 ->where('expired_at', '>=', date("Y/m/d"))
																			 ->get();

							$temp_lulus_tidak_valid = DB::table($list->table)->whereYear('start_date', '<=', $start+$x)
																			 ->whereYear('finish_date', '>=', $start+$x)
																			 ->where('expired_at', '<', date("Y/m/d"))
																			 ->get();								

							
							foreach($temp_lulus as $data) {
								$sum_lulus = $sum_lulus + DB::table($list->table_detail)->where('name', $data->name)->where('participant_status', 'Certified')->count();

								$sum_tidak_lulus = $sum_tidak_lulus + DB::table($list->table_detail)->where('name', $data->name)->where('participant_status', '<>', 'Certified')->count();

							}

							foreach($temp_lulus_valid as $data) {
								$sum_valid = $sum_valid + DB::table($list->table_detail)->where('name', $data->name)->where('participant_status', 'Certified')->count();
							}

							foreach($temp_lulus_tidak_valid as $data) {
								$sum_tidak_valid = $sum_tidak_valid + DB::table($list->table_detail)->where('name', $data->name)->where('participant_status', 'Certified')->count();
							}
							
							
						}
						$dataLulus[] = $sum_lulus;
						$dataTidakLulus[] = $sum_tidak_lulus;
						$total1[] = $sum_lulus + $sum_tidak_lulus;

						$valid[] = $sum_valid;
						$tidakvalid[] = $sum_tidak_valid;
						$total2[] = $sum_valid + $sum_tidak_valid;

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
			}


	public static function updateReportsYear(Request $request) {
		$list_table = DB::table('academy')->where('flag', date("Y"))->get();
    	$years = Input::get('years');

			foreach($list_table as $table) {
				$temp_data = DB::table($table->table)->whereYear('start_date', '<=', $years)
								 ->whereYear('finish_date', '>=', $years)
								 ->get();

				$temp_lulus_valid = DB::table($table->table)->whereYear('start_date', '<=', $years)
																			 ->whereYear('finish_date', '>=', $years)
																			 ->where('expired_at', '>=', date("Y/m/d"))
																			 ->get();

				$temp_lulus_tidak_valid = DB::table($table->table)->whereYear('start_date', '<=', $years)
																			 ->whereYear('finish_date', '>=', $years)
																			 ->where('expired_at', '<', date("Y/m/d"))
																			 ->get();		

				$temp_sum_lulus = 0;
				$temp_sum_tidak_lulus = 0;
				$sum_valid = 0;
				$sum_tidak_valid = 0;

				foreach($temp_data as $data) {
					$temp_sum_lulus = $temp_sum_lulus + DB::table($table->table_detail)->where('name', $data->name)->where('participant_status', 'Certified')->count();
					$temp_sum_tidak_lulus = $temp_sum_tidak_lulus + DB::table($table->table_detail)->where('name', $data->name)->where('participant_status', '<>', 'Certified')->count();
				}

				foreach($temp_lulus_valid as $data) {
					$sum_valid = $sum_valid + DB::table($table->table_detail)->where('name', $data->name)->where('participant_status', 'Certified')->count();
				}

				foreach($temp_lulus_tidak_valid as $data) {
					$sum_tidak_valid = $sum_tidak_valid + DB::table($table->table_detail)->where('name', $data->name)->where('participant_status', 'Certified')->count();
				}				

				$dataLulus[] = $temp_sum_lulus;
				$dataTidakLulus[] = $temp_sum_tidak_lulus;
				$total1[] = $temp_sum_lulus + $temp_sum_tidak_lulus;

				$valid[] = $sum_valid;
				$tidakvalid[] = $sum_tidak_valid;
				$total2[] = $sum_valid + $sum_tidak_valid;


			}

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

    	
					
