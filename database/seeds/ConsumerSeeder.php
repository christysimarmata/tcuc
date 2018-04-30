<?php

use Illuminate\Database\Seeder;
use App\Consumer;

class ConsumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('consumer')->delete();

        $ba1 = Consumer::create(array(
        	'name' => 'CSAM Batch 3',
	   	 	'start_date' => '2014-03-04',
	   	 	'finish_date' => '2014-03-07',
	    	'location' => 'Telkom University Bandung',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '651225,591825,670288,633056,622290,780026',	
	    	'cfu_fu' => 'CEO OFFICE',
	    	'level' => 'Basic',
	    	'released_date' => '2017-01-01',
	    	'expired_at' => '2022-12-12',
	    	'filename' => 'CSAM Batch 3.xlsx',
	    	'status' => 'complete'
        ));

        $bb1 = Consumer::create(array(
        	'name' => 'TCIF Batch 3',
	   	 	'start_date' => '2018-02-17',
	   	 	'finish_date' => '2018-02-20',
	    	'location' => 'Istana Kayana Bandung',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '640188,650456,690355,622355,601362',
	    	'cfu_fu' => 'CFU DIGITAL SERVICE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2018-02-01',
	    	'expired_at' => '2021-02-01',
	    	'filename' => 'TCIF Batch 3.xlsx',
	    	'status' => 'complete'
        ));

        $bc1 = Consumer::create(array(
        	'name' => 'TCBPM Batch 3',
	   	 	'start_date' => '2017-04-24',
	   	 	'finish_date' => '2017-04-27',
	    	'location' => 'Gedung Sabuga ITB',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651093,640953,633092',
	    	'cfu_fu' => 'CFU MOBILE',
	    	'level' => 'Advance',
	    	'released_date' => '2017-04-01',
	    	'expired_at' => '2020-02-01',
	    	'filename' => 'TCBPM Batch 3.xlsx',
	    	'status' => 'complete'
        ));


        $bd1 = Consumer::create(array(
        	'name' => 'Service Operation Batch 3',
	   	 	'start_date' => '2016-05-19',
	   	 	'finish_date' => '2016-05-23',
	    	'location' => 'Telkom Corpu Bandung Gedung B',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '660404,720565,730561,601626',
	    	'cfu_fu' => 'CFU CONSUMER',
	    	'level' => 'Basic',
	    	'released_date' => '2017-06-01',
	    	'expired_at' => '2100-12-12',
	    	'filename' => 'Service Operation Batch 3.xlsx',
	    	'status' => 'complete'
        ));


        $be1 = Consumer::create(array(
        	'name' => 'TCOOA Batch 3',
	   	 	'start_date' => '2018-06-09',
	   	 	'finish_date' => '2018-06-15',
	    	'location' => 'Telkom Corpu Bandung Gedung ABC',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 2',
	    	'participants' => '890006,850111,820022,810073,800045,880007',
	    	'cfu_fu' => 'FU FINANCE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-07-01',
	    	'expired_at' => '2020-07-01',
	    	'filename' => 'TCOOA Batch 3.xlsx',
	    	'status' => 'complete'
        ));


        $bf1 = Consumer::create(array(
        	'name' => 'Sertifikasi CMPM Batch 3',
	   	 	'start_date' => '2015-07-23',
	   	 	'finish_date' => '2015-07-28',
	    	'location' => 'Learning Area 3',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '631183,830012,633329,730245,650481,610215',
	    	'cfu_fu' => 'FU HCM',
	    	'level' => 'Advance',
	    	'released_date' => '2017-08-01',
	    	'expired_at' => '2021-08-01',
	    	'filename' => 'Sertifikasi CMPM Batch 3.xlsx',
	    	'status' => 'complete'
        ));


        $bg1 = Consumer::create(array(
        	'name' => 'BARJAS Batch 3',
	   	 	'start_date' => '2013-08-01',
	   	 	'finish_date' => '2013-08-14',
	    	'location' => 'Learning Area 2 Jakarta',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651225,830012,670288,730245,622290,650481',
	    	'cfu_fu' => 'FU ISP',
	    	'level' => 'Advance',
	    	'released_date' => '2017-09-01',
	    	'expired_at' => '2100-12-12',
	    	'filename' => 'BARJAS Batch 3.xlsx',
	    	'status' => 'complete'
        ));

        $bh1 = Consumer::create(array(
        	'name' => 'CCNP Batch 3',
	   	 	'start_date' => '2017-09-14',
	   	 	'finish_date' => '2017-09-15',
	    	'location' => 'Yogyakarta',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '640188,850111,820022,622355,601362',
	    	'cfu_fu' => 'CFU ENTERPRISE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-09-20',
	    	'expired_at' => '2020-09-20',
	    	'filename' => 'CCNP Batch 3.xlsx',
	    	'status' => 'complete'
        ));

        $bi1 = Consumer::create(array(
        	'name' => 'Sertifikasi CISO Batch 3',
	   	 	'start_date' => '2014-10-24',
	   	 	'finish_date' => '2014-10-27',
	    	'location' => 'Intercontinental Hotel Bali',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '670288,730245,633092,850111,601362',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Advance',
	    	'released_date' => '2017-10-01',
	    	'expired_at' => '2021-10-01',
	    	'filename' => 'Sertifikasi CISO Batch 3.xlsx',
	    	'status' => 'complete'
        ));


        $bj1 = Consumer::create(array(
        	'name' => 'TCGT Batch 3',
	   	 	'start_date' => '2018-11-23',
	   	 	'finish_date' => '2018-12-27',
	    	'location' => 'Loker masing-masing',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '660404,633329,730245,730561,601626',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Basic',
	    	'released_date' => '2017-12-15',
	    	'expired_at' => '2022-12-15',
	    	'filename' => 'TCGT Batch 3.xlsx',
	    	'status' => 'complete'
        ));
    }
}
