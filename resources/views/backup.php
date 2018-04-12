elseif($start && !$finish) {
    		if($academy === 'all') {
    			if($program === 'all' && $families === 'all') {
    				$nomor1 = 0;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = Nits::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Disp::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Wins::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Business::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram($start, '2100/12/12', $main->name);
			 			$nomor1++; 	
			 		}

			 		$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = Nits::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Consumer::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Disp::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Wins::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Mobile::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Business::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Leadership::getByFamily($start,'2100/12/12',$family->name);
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
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
 				elseif($program === 'all' && $families != 'all') {
    				$nomor1 = 0;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = Nits::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Disp::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Wins::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Business::getByProgram($start, '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram($start, '2100/12/12', $main->name);
			 			$nomor1++; 	
			 		}

				 	$nomor2 = 0;
			 			$datafamily[$nomor2][] = Nits::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Consumer::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Disp::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Wins::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Mobile::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Business::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Leadership::getByFamily($start,'2100/12/12',$families);

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
			        		'label'=>$families,
							'data'=>$datafamily[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);	
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
    			} 
    			elseif($program != 'all' && $families === 'all') {
    				$nomor1 = 0;
			 			$dataprogram[$nomor1][] = Nits::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Disp::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Wins::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Business::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram($start, '2100/12/12', $program);

				 	$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = Nits::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Consumer::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Disp::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Wins::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Mobile::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Business::getByFamily($start,'2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Leadership::getByFamily($start,'2100/12/12',$family->name);
			 			$nomor2++; 	
			 		}

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
			        ->datasets([
			        	[	
			        		'label'=>$program,
							'data'=>$dataprogram[0],
							'backgroundColor'=>"#FF6384"
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

			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
			 	elseif($program != 'all' && $families != 'all') {
			 		$nomor1 = 0;
			 			$dataprogram[$nomor1][] = Nits::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Disp::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Wins::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Business::getByProgram($start, '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram($start, '2100/12/12', $program);

			 		$nomor2 = 0;
			 			$datafamily[$nomor2][] = Nits::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Consumer::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Disp::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Wins::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Mobile::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Business::getByFamily($start,'2100/12/12',$families);
			 			$datafamily[$nomor2][] = Leadership::getByFamily($start,'2100/12/12',$families);


			 			$chartprogram = app()->chartjs
				        ->name('MainProgram')
				        ->type('bar')
				        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
				        ->datasets([
				        	[	
				        		'label'=>$program,
								'data'=>$dataprogram[0],
								'backgroundColor'=>"#FF6384"
				        	]
				        ])
				        ->options([]);

				        $chartfamily = app()->chartjs
				        ->name('JobFamily')
				        ->type('bar')
				        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
				        ->datasets([
				        	[	
				        		'label'=>$families,
								'data'=>$datafamily[0],
								'backgroundColor'=>"#FF6384"
				        	]
				        ])
				        ->options([]);

				        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
			} else {
				if($program === 'all' && $families === 'all') {
    				$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '12');
			 			$nomor1++; 	
			 		}
	
			 		$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '12');
			 			$nomor2++; 	
			 		}

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
 				elseif($program === 'all' && $families != 'all') {
    				$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $main->name, '12');
			 			$nomor1++; 	
			 		}
	
			 		$nomor2 = 0;
			
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '12');
			 			
			 		

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$families,
							'data'=>$datafamily[0],
							'backgroundColor'=>"#FF6384"
			        	]

			        ])
			        ->options([]);
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
    			elseif($program != 'all' && $families === 'all') {
    				$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '12');

			 		
			 		$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$family->name, '12');
			 			$nomor2++; 	
			 		}

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$program,
							'data'=>$dataprogram[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);

			        $chartfamily = app()->chartjs
			        ->name('JobFamily')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
			 	elseif($program != 'all' && $families != 'all') {
			 		$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram($start, '2100/12/12', $program, '12');

			 		
			 		$nomor2 = 0;
			 		
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily($start,'2100/12/12',$families, '12');
		
	

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$program,
							'data'=>$dataprogram[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);

			        $chartfamily = app()->chartjs
			        ->name('JobFamily')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$families,
							'data'=>$datafamily[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
    		} 

    	}} elseif(!$start && $finish) {
    		if($academy === 'all') {
    			if($program === 'all' && $families === 'all') {
    				$nomor1 = 0;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = Nits::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Disp::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Wins::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Business::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram('1900/12/12', $finish, $main->name);
			 			$nomor1++; 	
			 		}

			 		$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = Nits::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Consumer::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Disp::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Wins::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Mobile::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Business::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Leadership::getByFamily('1900/12/12',$finish,$family->name);
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
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
 				elseif($program === 'all' && $families != 'all') {
    				$nomor1 = 0;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = Nits::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Disp::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Wins::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Business::getByProgram('1900/12/12', $finish, $main->name);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram('1900/12/12', $finish, $main->name);
			 			$nomor1++; 	
			 		}

				 	$nomor2 = 0;
			 			$datafamily[$nomor2][] = Nits::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Consumer::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Disp::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Wins::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Mobile::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Business::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Leadership::getByFamily('1900/12/12',$finish,$families);

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
			        		'label'=>$families,
							'data'=>$datafamily[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);	
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
    			} 
    			elseif($program != 'all' && $families === 'all') {
    				$nomor1 = 0;
			 			$dataprogram[$nomor1][] = Nits::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Disp::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Wins::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Business::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram('1900/12/12', $finish, $program);

				 	$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = Nits::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Consumer::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Disp::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Wins::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Mobile::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Business::getByFamily('1900/12/12',$finish,$family->name);
			 			$datafamily[$nomor2][] = Leadership::getByFamily('1900/12/12',$finish,$family->name);
			 			$nomor2++; 	
			 		}

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
			        ->datasets([
			        	[	
			        		'label'=>$program,
							'data'=>$dataprogram[0],
							'backgroundColor'=>"#FF6384"
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

			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
			 	elseif($program != 'all' && $families != 'all') {
			 		$nomor1 = 0;
			 			$dataprogram[$nomor1][] = Nits::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Disp::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Wins::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Business::getByProgram('1900/12/12', $finish, $program);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram('1900/12/12', $finish, $program);

			 		$nomor2 = 0;
			 			$datafamily[$nomor2][] = Nits::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Consumer::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Disp::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Wins::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Mobile::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Business::getByFamily('1900/12/12',$finish,$families);
			 			$datafamily[$nomor2][] = Leadership::getByFamily('1900/12/12',$finish,$families);


			 			$chartprogram = app()->chartjs
				        ->name('MainProgram')
				        ->type('bar')
				        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
				        ->datasets([
				        	[	
				        		'label'=>$program,
								'data'=>$dataprogram[0],
								'backgroundColor'=>"#FF6384"
				        	]
				        ])
				        ->options([]);

				        $chartfamily = app()->chartjs
				        ->name('JobFamily')
				        ->type('bar')
				        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
				        ->datasets([
				        	[	
				        		'label'=>$families,
								'data'=>$datafamily[0],
								'backgroundColor'=>"#FF6384"
				        	]
				        ])
				        ->options([]);

				        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
			} else {
				if($program === 'all' && $families === 'all') {
    				$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '12');
			 			$nomor1++; 	
			 		}
	
			 		$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '12');
			 			$nomor2++; 	
			 		}

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
 				elseif($program === 'all' && $families != 'all') {
    				$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '12');
			 			$nomor1++; 	
			 		}
	
			 		$nomor2 = 0;
			
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '12');
			 			
			 		

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$families,
							'data'=>$datafamily[0],
							'backgroundColor'=>"#FF6384"
			        	]

			        ])
			        ->options([]);
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
    			elseif($program != 'all' && $families === 'all') {
    				$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '12');

			 		
			 		$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '12');
			 			$nomor2++; 	
			 		}

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$program,
							'data'=>$dataprogram[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);

			        $chartfamily = app()->chartjs
			        ->name('JobFamily')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
			 	elseif($program != 'all' && $families != 'all') {
			 		$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '12');

			 		
			 		$nomor2 = 0;
			 		
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '12');
		
	

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$program,
							'data'=>$dataprogram[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);

			        $chartfamily = app()->chartjs
			        ->name('JobFamily')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$family,
							'data'=>$datafamily[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
    		} 
    	}} else{
    		if($academy === 'all') {
    			if($program === 'all' && $families === 'all') {
    				$nomor1 = 0;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = Nits::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Disp::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Wins::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Business::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$nomor1++; 	
			 		}

			 		$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = Nits::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Consumer::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Disp::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Wins::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Mobile::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Business::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Leadership::getByFamily('1900/12/12','2100/12/12',$family->name);
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
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
 				elseif($program === 'all' && $families != 'all') {
    				$nomor1 = 0;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = Nits::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Disp::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Wins::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Business::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram('1900/12/12', '2100/12/12', $main->name);
			 			$nomor1++; 	
			 		}

				 	$nomor2 = 0;
			 			$datafamily[$nomor2][] = Nits::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Consumer::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Disp::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Wins::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Mobile::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Business::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Leadership::getByFamily('1900/12/12','2100/12/12',$families);

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
			        		'label'=>$families,
							'data'=>$datafamily[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);	
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
    			} 
    			elseif($program != 'all' && $families === 'all') {
    				$nomor1 = 0;
			 			$dataprogram[$nomor1][] = Nits::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Disp::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Wins::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Business::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram('1900/12/12', '2100/12/12', $program);

				 	$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = Nits::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Consumer::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Disp::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Wins::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Mobile::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Business::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$datafamily[$nomor2][] = Leadership::getByFamily('1900/12/12','2100/12/12',$family->name);
			 			$nomor2++; 	
			 		}

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
			        ->datasets([
			        	[	
			        		'label'=>$program,
							'data'=>$dataprogram[0],
							'backgroundColor'=>"#FF6384"
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

			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
			 	elseif($program != 'all' && $families != 'all') {
			 		$nomor1 = 0;
			 			$dataprogram[$nomor1][] = Nits::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Consumer::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Disp::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Wins::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Mobile::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Enterprise::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Business::getByProgram('1900/12/12', '2100/12/12', $program);
			 			$dataprogram[$nomor1][] = Leadership::getByProgram('1900/12/12', '2100/12/12', $program);

			 		$nomor2 = 0;
			 			$datafamily[$nomor2][] = Nits::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Consumer::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Disp::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Wins::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Mobile::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Enterprise::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Business::getByFamily('1900/12/12','2100/12/12',$families);
			 			$datafamily[$nomor2][] = Leadership::getByFamily('1900/12/12','2100/12/12',$families);


			 			$chartprogram = app()->chartjs
				        ->name('MainProgram')
				        ->type('bar')
				        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
				        ->datasets([
				        	[	
				        		'label'=>$program,
								'data'=>$dataprogram[0],
								'backgroundColor'=>"#FF6384"
				        	]
				        ])
				        ->options([]);

				        $chartfamily = app()->chartjs
				        ->name('JobFamily')
				        ->type('bar')
				        ->labels(['NITS', 'Consumer', 'DISP', 'WINS', 'Mobile', 'Enterprise', 'Business', 'Leadership'])
				        ->datasets([
				        	[	
				        		'label'=>$families,
								'data'=>$datafamily[0],
								'backgroundColor'=>"#FF6384"
				        	]
				        ])
				        ->options([]);

				        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
			} else {
				if($program === 'all' && $families === 'all') {
    				$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '12');
			 			$nomor1++; 	
			 		}
	
			 		$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '12');
			 			$nomor2++; 	
			 		}

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
 				elseif($program === 'all' && $families != 'all') {
    				$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		foreach($mainprogram as $main) {
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $main->name, '12');
			 			$nomor1++; 	
			 		}
	
			 		$nomor2 = 0;
			
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '12');
			 			
			 		

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$families,
							'data'=>$datafamily[0],
							'backgroundColor'=>"#FF6384"
			        	]

			        ])
			        ->options([]);
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
    			elseif($program != 'all' && $families === 'all') {
    				$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '12');

			 		
			 		$nomor2 = 0;
			 		foreach($jobfamily as $family) {
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$family->name, '12');
			 			$nomor2++; 	
			 		}

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$program,
							'data'=>$dataprogram[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);

			        $chartfamily = app()->chartjs
			        ->name('JobFamily')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
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
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
			 	}
			 	elseif($program != 'all' && $families != 'all') {
			 		$nomor1 = 0;
    				$className = 'App\\'.$academy;
			 		
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '01');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '02');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '03');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '04');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '05');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '06');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '07');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '08');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '09');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '10');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '11');
			 			$dataprogram[$nomor1][] = $className::getByMonthProgram('1900/12/12', '2100/12/12', $program, '12');

			 		
			 		$nomor2 = 0;
			 		
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '01');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '02');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '03');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '04');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '05');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '06');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '07');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '08');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '09');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '10');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '11');
			 			$datafamily[$nomor2][] = $className::getByMonthFamily('1900/12/12','2100/12/12',$families, '12');
		
	

			 		$chartprogram = app()->chartjs
			        ->name('MainProgram')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$program,
							'data'=>$dataprogram[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);

			        $chartfamily = app()->chartjs
			        ->name('JobFamily')
			        ->type('bar')
			        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
			        ->datasets([
			        	[	
			        		'label'=>$families,
							'data'=>$datafamily[0],
							'backgroundColor'=>"#FF6384"
			        	]
			        ])
			        ->options([]);
			        return view('reports')->with('mainprogram', $mainprogram)
        					  ->with('jobfamily', $jobfamily)
        					  ->with('chartprogram', $chartprogram)
        					  ->with('chartfamily', $chartfamily);
    		} 
    	}