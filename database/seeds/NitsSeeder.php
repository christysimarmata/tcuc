<?php

use Illuminate\Database\Seeder;
use App\Nits;

class NitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nits')->delete();

        $ba1 = Nits::create(array(
        	'name' => 'CSAM Batch 1',
	   	 	'start_date' => '2018-03-04',
	   	 	'finish_date' => '2018-03-07',
	    	'location' => 'Telkom University Bandung',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '651225,591825,670288,633056,622290,780026',	
	    	'cfu_fu' => 'CEO OFFICE',
	    	'level' => 'Basic',
	    	'released_date' => '2018-01-01',
	    	'expired_at' => '2022-12-12',
	    	'filename' => 'CSAM Batch 1.xlsx',
	    	'status' => 'complete'
        ));

        $bb1 = Nits::create(array(
        	'name' => 'TCIF Batch 1',
	   	 	'start_date' => '2015-02-17',
	   	 	'finish_date' => '2015-02-20',
	    	'location' => 'Istana Kayana Bandung',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '640188,650456,690355,622355,601362',
	    	'cfu_fu' => 'CFU DIGITAL SERVICE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-02-01',
	    	'expired_at' => '2017-10-01',
	    	'filename' => 'TCIF Batch 1.xlsx',
	    	'status' => 'complete'
        ));

        $bc1 = Nits::create(array(
        	'name' => 'TCBPM Batch 1',
	   	 	'start_date' => '2016-04-24',
	   	 	'finish_date' => '2016-04-27',
	    	'location' => 'Gedung Sabuga ITB',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651093,640953,633092',
	    	'cfu_fu' => 'CFU MOBILE',
	    	'level' => 'Advance',
	    	'released_date' => '2017-04-01',
	    	'expired_at' => '2020-02-01',
	    	'filename' => 'TCBPM Batch 1.xlsx',
	    	'status' => 'complete'
        ));


        $bd1 = Nits::create(array(
        	'name' => 'Service Operation Batch 1',
	   	 	'start_date' => '2017-05-19',
	   	 	'finish_date' => '2017-05-23',
	    	'location' => 'Telkom Corpu Bandung Gedung B',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '660404,720565,730561,601626',
	    	'cfu_fu' => 'CFU NITS',
	    	'level' => 'Basic',
	    	'released_date' => '2017-06-01',
	    	'expired_at' => '2100-12-12',
	    	'filename' => 'Service Operation Batch 1.xlsx',
	    	'status' => 'complete'
        ));


        $be1 = Nits::create(array(
        	'name' => 'TCOOA Batch 1',
	   	 	'start_date' => '2017-06-09',
	   	 	'finish_date' => '2017-06-15',
	    	'location' => 'Telkom Corpu Bandung Gedung ABC',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 2',
	    	'participants' => '890006,850111,820022,810073,800045,880007',
	    	'cfu_fu' => 'FU FINANCE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-07-01',
	    	'expired_at' => '2020-07-01',
	    	'filename' => 'TCOOA Batch 1.xlsx',
	    	'status' => 'complete'
        ));


        $bf1 = Nits::create(array(
        	'name' => 'Sertifikasi CMPM Batch 1',
	   	 	'start_date' => '2017-07-23',
	   	 	'finish_date' => '2017-07-28',
	    	'location' => 'Learning Area 3',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '631183,830012,633329,730245,650481,610215',
	    	'cfu_fu' => 'FU HCM',
	    	'level' => 'Advance',
	    	'released_date' => '2017-08-01',
	    	'expired_at' => '2017-12-01',
	    	'filename' => 'Sertifikasi CMPM Batch 1.xlsx',
	    	'status' => 'complete'
        ));


        $bg1 = Nits::create(array(
        	'name' => 'BARJAS Batch 1',
	   	 	'start_date' => '2017-08-01',
	   	 	'finish_date' => '2017-08-14',
	    	'location' => 'Learning Area 2 Jakarta',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651225,830012,670288,730245,622290,650481',
	    	'cfu_fu' => 'FU ISP',
	    	'level' => 'Advance',
	    	'released_date' => '2017-09-01',
	    	'expired_at' => '2100-12-12',
	    	'filename' => 'BARJAS Batch 1.xlsx',
	    	'status' => 'complete'
        ));

        $bh1 = Nits::create(array(
        	'name' => 'CCNP Batch 1',
	   	 	'start_date' => '2018-09-14',
	   	 	'finish_date' => '2018-09-15',
	    	'location' => 'Yogyakarta',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '640188,850111,820022,622355,601362',
	    	'cfu_fu' => 'CFU ENTERPRISE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2018-09-20',
	    	'expired_at' => '2020-09-20',
	    	'filename' => 'CCNP Batch 1.xlsx',
	    	'status' => 'complete'
        ));

        $bi1 = Nits::create(array(
        	'name' => 'Sertifikasi CISO Batch 1',
	   	 	'start_date' => '2015-10-24',
	   	 	'finish_date' => '2015-10-27',
	    	'location' => 'Intercontinental Hotel Bali',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '670288,730245,633092,850111,601362',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Advance',
	    	'released_date' => '2016-10-01',
	    	'expired_at' => '2017-10-01',
	    	'filename' => 'Sertifikasi CISO Batch 1.xlsx',
	    	'status' => 'complete'
        ));


        $bj1 = Nits::create(array(
        	'name' => 'TCGT Batch 1',
	   	 	'start_date' => '2014-11-23',
	   	 	'finish_date' => '2014-12-27',
	    	'location' => 'Loker masing-masing',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '660404,633329,730245,730561,601626',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Basic',
	    	'released_date' => '2017-12-15',
	    	'expired_at' => '2022-12-15',
	    	'filename' => 'TCGT Batch 1.xlsx',
	    	'status' => 'complete'
        ));
        
    }
}
