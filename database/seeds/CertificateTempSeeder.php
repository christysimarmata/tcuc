<?php

use Illuminate\Database\Seeder;
use App\CertificateTemp;

class CertificateTempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('certificate_temp')->delete();

        $ba1 = CertificateTemp::create(array(
        	'name' => 'CSAM Batch 2',
	   	 	'start_date' => '2014-03-04',
	   	 	'finish_date' => '2014-03-07',
	    	'location' => 'Telkom University Bandung',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '651225,591825,670288,633056,622290,780026',	
	    	'cfu_fu' => 'CEO OFFICE',
	    	'level' => 'Basic',
	    	'released_date' => '2017-01-01',
	    	'expired_at' => '2022-12-12',
	    	'status' => 'complete'
        ));

        $bb1 = CertificateTemp::create(array(
        	'name' => 'TCIF Batch 2',
	   	 	'start_date' => '2015-02-17',
	   	 	'finish_date' => '2015-02-20',
	    	'location' => 'Istana Kayana Bandung',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '640188,650456,690355,622355,601362',
	    	'cfu_fu' => 'CFU DIGITAL SERVICE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-02-01',
	    	'expired_at' => '2021-02-01',
	    	'status' => 'complete'
        ));

        $bc1 = CertificateTemp::create(array(
        	'name' => 'TCBPM Batch 2',
	   	 	'start_date' => '2016-04-24',
	   	 	'finish_date' => '2016-04-27',
	    	'location' => 'Gedung Sabuga ITB',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651093,640953,633092',
	    	'cfu_fu' => 'CFU MOBILE',
	    	'level' => 'Advance',
	    	'released_date' => '2017-04-01',
	    	'expired_at' => '2020-02-01',
	    	'status' => 'complete'
        ));


        $bd1 = CertificateTemp::create(array(
        	'name' => 'Service Operation Batch 2',
	   	 	'start_date' => '2017-05-19',
	   	 	'finish_date' => '2017-05-23',
	    	'location' => 'Telkom Corpu Bandung Gedung B',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '660404,720565,730561,601626',
	    	'cfu_fu' => 'CFU CONSUMER',
	    	'level' => 'Basic',
	    	'released_date' => '2017-06-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));


        $be1 = CertificateTemp::create(array(
        	'name' => 'TCOOA Batch 2',
	   	 	'start_date' => '2017-06-09',
	   	 	'finish_date' => '2017-06-15',
	    	'location' => 'Telkom Corpu Bandung Gedung ABC',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 2',
	    	'participants' => '890006,850111,820022,810073,800045,880007',
	    	'cfu_fu' => 'FU FINANCE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-07-01',
	    	'expired_at' => '2020-07-01',
	    	'status' => 'complete'
        ));


        $bf1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CMPM Batch 2',
	   	 	'start_date' => '2014-07-23',
	   	 	'finish_date' => '2014-07-28',
	    	'location' => 'Learning Area 3',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '631183,830012,633329,730245,650481,610215',
	    	'cfu_fu' => 'FU HCM',
	    	'level' => 'Advance',
	    	'released_date' => '2017-08-01',
	    	'expired_at' => '2021-08-01',
	    	'status' => 'complete'
        ));


        $bg1 = CertificateTemp::create(array(
        	'name' => 'BARJAS Batch 2',
	   	 	'start_date' => '2015-08-01',
	   	 	'finish_date' => '2015-08-14',
	    	'location' => 'Learning Area 2 Jakarta',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651225,830012,670288,730245,622290,650481',
	    	'cfu_fu' => 'FU ISP',
	    	'level' => 'Advance',
	    	'released_date' => '2017-09-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));

        $bh1 = CertificateTemp::create(array(
        	'name' => 'CCNP Batch 2',
	   	 	'start_date' => '2015-09-14',
	   	 	'finish_date' => '2015-09-15',
	    	'location' => 'Yogyakarta',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '640188,850111,820022,622355,601362',
	    	'cfu_fu' => 'CFU ENTERPRISE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-09-20',
	    	'expired_at' => '2020-09-20',
	    	'status' => 'complete'
        ));

        $bi1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CISO Batch 2',
	   	 	'start_date' => '2018-10-24',
	   	 	'finish_date' => '2018-10-27',
	    	'location' => 'Intercontinental Hotel Bali',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '670288,730245,633092,850111,601362',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Advance',
	    	'released_date' => '2018-10-01',
	    	'expired_at' => '2021-10-01',
	    	'status' => 'complete'
        ));


        $bj1 = CertificateTemp::create(array(
        	'name' => 'TCGT Batch 2',
	   	 	'start_date' => '2017-11-23',
	   	 	'finish_date' => '2017-12-27',
	    	'location' => 'Loker masing-masing',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '660404,633329,730245,730561,601626',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Basic',
	    	'released_date' => '2017-12-15',
	    	'expired_at' => '2022-12-15',
	    	'status' => 'complete'
        ));

        $ba1 = CertificateTemp::create(array(
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
	    	'status' => 'complete'
        ));

        $bb1 = CertificateTemp::create(array(
        	'name' => 'TCIF Batch 3',
	   	 	'start_date' => '2017-02-17',
	   	 	'finish_date' => '2017-02-20',
	    	'location' => 'Istana Kayana Bandung',
	   		'academy' => 'Consumer',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '640188,650456,690355,622355,601362',
	    	'cfu_fu' => 'CFU DIGITAL SERVICE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-02-01',
	    	'expired_at' => '2021-02-01',
	    	'status' => 'complete'
        ));

        $bc1 = CertificateTemp::create(array(
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
	    	'status' => 'complete'
        ));


        $bd1 = CertificateTemp::create(array(
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
	    	'status' => 'complete'
        ));


        $be1 = CertificateTemp::create(array(
        	'name' => 'TCOOA Batch 3',
	   	 	'start_date' => '2016-06-09',
	   	 	'finish_date' => '2016-06-15',
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
	    	'status' => 'complete'
        ));


        $bf1 = CertificateTemp::create(array(
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
	    	'status' => 'complete'
        ));


        $bg1 = CertificateTemp::create(array(
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
	    	'status' => 'complete'
        ));

        $bh1 = CertificateTemp::create(array(
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
	    	'status' => 'complete'
        ));

        $bi1 = CertificateTemp::create(array(
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
	    	'status' => 'complete'
        ));


        $bj1 = CertificateTemp::create(array(
        	'name' => 'TCGT Batch 3',
	   	 	'start_date' => '2017-11-23',
	   	 	'finish_date' => '2017-12-27',
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
	    	'status' => 'complete'
        ));

        $ba1 = CertificateTemp::create(array(
        	'name' => 'CSAM Batch 4',
	   	 	'start_date' => '2013-03-04',
	   	 	'finish_date' => '2013-03-07',
	    	'location' => 'Telkom University Bandung',
	   		'academy' => 'DISP',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '651225,591825,670288,633056,622290,780026',	
	    	'cfu_fu' => 'CEO OFFICE',
	    	'level' => 'Basic',
	    	'released_date' => '2017-01-01',
	    	'expired_at' => '2022-12-12',
	    	'status' => 'complete'
        ));

        $bb1 = CertificateTemp::create(array(
        	'name' => 'TCIF Batch 4',
	   	 	'start_date' => '2014-02-17',
	   	 	'finish_date' => '2014-02-20',
	    	'location' => 'Istana Kayana Bandung',
	   		'academy' => 'DISP',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '640188,650456,690355,622355,601362',
	    	'cfu_fu' => 'CFU DIGITAL SERVICE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-02-01',
	    	'expired_at' => '2021-02-01',
	    	'status' => 'complete'
        ));

        $bc1 = CertificateTemp::create(array(
        	'name' => 'TCBPM Batch 4',
	   	 	'start_date' => '2017-04-24',
	   	 	'finish_date' => '2017-04-27',
	    	'location' => 'Gedung Sabuga ITB',
	   		'academy' => 'DISP',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651093,640953,633092',
	    	'cfu_fu' => 'CFU MOBILE',
	    	'level' => 'Advance',
	    	'released_date' => '2017-04-01',
	    	'expired_at' => '2020-02-01',
	    	'status' => 'complete'
        ));


        $bd1 = CertificateTemp::create(array(
        	'name' => 'Service Operation Batch 4',
	   	 	'start_date' => '2017-05-19',
	   	 	'finish_date' => '2017-05-23',
	    	'location' => 'Telkom Corpu Bandung Gedung B',
	   		'academy' => 'DISP',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '660404,720565,730561,601626',
	    	'cfu_fu' => 'CFU DISP',
	    	'level' => 'Basic',
	    	'released_date' => '2017-06-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));


        $be1 = CertificateTemp::create(array(
        	'name' => 'TCOOA Batch 4',
	   	 	'start_date' => '2015-06-09',
	   	 	'finish_date' => '2015-06-15',
	    	'location' => 'Telkom Corpu Bandung Gedung ABC',
	   		'academy' => 'DISP',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 2',
	    	'participants' => '890006,850111,820022,810073,800045,880007',
	    	'cfu_fu' => 'FU FINANCE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-07-01',
	    	'expired_at' => '2020-07-01',
	    	'status' => 'complete'
        ));


        $bf1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CMPM Batch 4',
	   	 	'start_date' => '2015-07-23',
	   	 	'finish_date' => '2015-07-28',
	    	'location' => 'Learning Area 3',
	   		'academy' => 'DISP',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '631183,830012,633329,730245,650481,610215',
	    	'cfu_fu' => 'FU HCM',
	    	'level' => 'Advance',
	    	'released_date' => '2017-08-01',
	    	'expired_at' => '2021-08-01',
	    	'status' => 'complete'
        ));


        $bg1 = CertificateTemp::create(array(
        	'name' => 'BARJAS Batch 4',
	   	 	'start_date' => '2016-08-01',
	   	 	'finish_date' => '2016-08-14',
	    	'location' => 'Learning Area 2 Jakarta',
	   		'academy' => 'DISP',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651225,830012,670288,730245,622290,650481',
	    	'cfu_fu' => 'FU ISP',
	    	'level' => 'Advance',
	    	'released_date' => '2017-09-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));

        $bh1 = CertificateTemp::create(array(
        	'name' => 'CCNP Batch 4',
	   	 	'start_date' => '2016-09-14',
	   	 	'finish_date' => '2016-09-15',
	    	'location' => 'Yogyakarta',
	   		'academy' => 'DISP',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '640188,850111,820022,622355,601362',
	    	'cfu_fu' => 'CFU ENTERPRISE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-09-20',
	    	'expired_at' => '2020-09-20',
	    	'status' => 'complete'
        ));

        $bi1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CISO Batch 4',
	   	 	'start_date' => '2017-10-24',
	   	 	'finish_date' => '2017-10-27',
	    	'location' => 'Intercontinental Hotel Bali',
	   		'academy' => 'DISP',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '670288,730245,633092,850111,601362',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Advance',
	    	'released_date' => '2017-10-01',
	    	'expired_at' => '2021-10-01',
	    	'status' => 'complete'
        ));


        $bj1 = CertificateTemp::create(array(
        	'name' => 'TCGT Batch 4',
	   	 	'start_date' => '2017-11-23',
	   	 	'finish_date' => '2017-12-27',
	    	'location' => 'Loker masing-masing',
	   		'academy' => 'DISP',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '660404,633329,730245,730561,601626',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Basic',
	    	'released_date' => '2017-12-15',
	    	'expired_at' => '2022-12-15',
	    	'status' => 'complete'
        ));

        $ba1 = CertificateTemp::create(array(
        	'name' => 'CSAM Batch 5',
	   	 	'start_date' => '2013-03-04',
	   	 	'finish_date' => '2013-03-07',
	    	'location' => 'Telkom University Bandung',
	   		'academy' => 'Enterprise',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '651225,591825,670288,633056,622290,780026',	
	    	'cfu_fu' => 'CEO OFFICE',
	    	'level' => 'Basic',
	    	'released_date' => '2017-01-01',
	    	'expired_at' => '2022-12-12',
	    	'status' => 'complete'
        ));

        $bb1 = CertificateTemp::create(array(
        	'name' => 'TCIF Batch 5',
	   	 	'start_date' => '2014-02-17',
	   	 	'finish_date' => '2014-02-20',
	    	'location' => 'Istana Kayana Bandung',
	   		'academy' => 'Enterprise',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '640188,650456,690355,622355,601362',
	    	'cfu_fu' => 'CFU DIGITAL SERVICE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-02-01',
	    	'expired_at' => '2021-02-01',
	    	'status' => 'complete'
        ));

        $bc1 = CertificateTemp::create(array(
        	'name' => 'TCBPM Batch 5',
	   	 	'start_date' => '2016-04-24',
	   	 	'finish_date' => '2016-04-27',
	    	'location' => 'Gedung Sabuga ITB',
	   		'academy' => 'Enterprise',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651093,640953,633092',
	    	'cfu_fu' => 'CFU MOBILE',
	    	'level' => 'Advance',
	    	'released_date' => '2017-04-01',
	    	'expired_at' => '2020-02-01',
	    	'status' => 'complete'
        ));


        $bd1 = CertificateTemp::create(array(
        	'name' => 'Service Operation Batch 5',
	   	 	'start_date' => '2015-05-19',
	   	 	'finish_date' => '2015-05-23',
	    	'location' => 'Telkom Corpu Bandung Gedung B',
	   		'academy' => 'Enterprise',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '660404,720565,730561,601626',
	    	'cfu_fu' => 'CFU Enterprise',
	    	'level' => 'Basic',
	    	'released_date' => '2017-06-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));


        $be1 = CertificateTemp::create(array(
        	'name' => 'TCOOA Batch 5',
	   	 	'start_date' => '2017-06-09',
	   	 	'finish_date' => '2017-06-15',
	    	'location' => 'Telkom Corpu Bandung Gedung ABC',
	   		'academy' => 'Enterprise',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 2',
	    	'participants' => '890006,850111,820022,810073,800045,880007',
	    	'cfu_fu' => 'FU FINANCE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-07-01',
	    	'expired_at' => '2020-07-01',
	    	'status' => 'complete'
        ));


        $bf1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CMPM Batch 5',
	   	 	'start_date' => '2017-07-23',
	   	 	'finish_date' => '2017-07-28',
	    	'location' => 'Learning Area 3',
	   		'academy' => 'Enterprise',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '631183,830012,633329,730245,650481,610215',
	    	'cfu_fu' => 'FU HCM',
	    	'level' => 'Advance',
	    	'released_date' => '2017-08-01',
	    	'expired_at' => '2021-08-01',
	    	'status' => 'complete'
        ));


        $bg1 = CertificateTemp::create(array(
        	'name' => 'BARJAS Batch 5',
	   	 	'start_date' => '2013-08-01',
	   	 	'finish_date' => '2013-08-14',
	    	'location' => 'Learning Area 2 Jakarta',
	   		'academy' => 'Enterprise',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651225,830012,670288,730245,622290,650481',
	    	'cfu_fu' => 'FU ISP',
	    	'level' => 'Advance',
	    	'released_date' => '2017-09-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));

        $bh1 = CertificateTemp::create(array(
        	'name' => 'CCNP Batch 5',
	   	 	'start_date' => '2015-09-14',
	   	 	'finish_date' => '2015-09-15',
	    	'location' => 'Yogyakarta',
	   		'academy' => 'Enterprise',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '640188,850111,820022,622355,601362',
	    	'cfu_fu' => 'CFU ENTERPRISE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-09-20',
	    	'expired_at' => '2020-09-20',
	    	'status' => 'complete'
        ));

        $bi1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CISO Batch 5',
	   	 	'start_date' => '2017-10-24',
	   	 	'finish_date' => '2017-10-27',
	    	'location' => 'Intercontinental Hotel Bali',
	   		'academy' => 'Enterprise',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '670288,730245,633092,850111,601362',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Advance',
	    	'released_date' => '2017-10-01',
	    	'expired_at' => '2021-10-01',
	    	'status' => 'complete'
        ));


        $bj1 = CertificateTemp::create(array(
        	'name' => 'TCGT Batch 5',
	   	 	'start_date' => '2016-11-23',
	   	 	'finish_date' => '2016-12-27',
	    	'location' => 'Loker masing-masing',
	   		'academy' => 'Enterprise',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '660404,633329,730245,730561,601626',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Basic',
	    	'released_date' => '2017-12-15',
	    	'expired_at' => '2022-12-15',
	    	'status' => 'complete'
        ));

        $ba1 = CertificateTemp::create(array(
        	'name' => 'CSAM Batch 6',
	   	 	'start_date' => '2014-03-04',
	   	 	'finish_date' => '2014-03-07',
	    	'location' => 'Telkom University Bandung',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '651225,591825,670288,633056,622290,780026',	
	    	'cfu_fu' => 'CEO OFFICE',
	    	'level' => 'Basic',
	    	'released_date' => '2017-01-01',
	    	'expired_at' => '2022-12-12',
	    	'status' => 'complete'
        ));

        $bb1 = CertificateTemp::create(array(
        	'name' => 'TCIF Batch 6',
	   	 	'start_date' => '2015-02-17',
	   	 	'finish_date' => '2015-02-20',
	    	'location' => 'Istana Kayana Bandung',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '640188,650456,690355,622355,601362',
	    	'cfu_fu' => 'CFU DIGITAL SERVICE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-02-01',
	    	'expired_at' => '2021-02-01',
	    	'status' => 'complete'
        ));

        $bc1 = CertificateTemp::create(array(
        	'name' => 'TCBPM Batch 6',
	   	 	'start_date' => '2016-04-24',
	   	 	'finish_date' => '2016-04-27',
	    	'location' => 'Gedung Sabuga ITB',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651093,640953,633092',
	    	'cfu_fu' => 'CFU MOBILE',
	    	'level' => 'Advance',
	    	'released_date' => '2017-04-01',
	    	'expired_at' => '2020-02-01',
	    	'status' => 'complete'
        ));


        $bd1 = CertificateTemp::create(array(
        	'name' => 'Service Operation Batch 6',
	   	 	'start_date' => '2017-05-19',
	   	 	'finish_date' => '2017-05-23',
	    	'location' => 'Telkom Corpu Bandung Gedung B',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '660404,720565,730561,601626',
	    	'cfu_fu' => 'CFU Leadership',
	    	'level' => 'Basic',
	    	'released_date' => '2017-06-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));


        $be1 = CertificateTemp::create(array(
        	'name' => 'TCOOA Batch 6',
	   	 	'start_date' => '2015-06-09',
	   	 	'finish_date' => '2017-06-15',
	    	'location' => 'Telkom Corpu Bandung Gedung ABC',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 2',
	    	'participants' => '890006,850111,820022,810073,800045,880007',
	    	'cfu_fu' => 'FU FINANCE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-07-01',
	    	'expired_at' => '2020-07-01',
	    	'status' => 'complete'
        ));


        $bf1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CMPM Batch 6',
	   	 	'start_date' => '2016-07-23',
	   	 	'finish_date' => '2017-07-28',
	    	'location' => 'Learning Area 3',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '631183,830012,633329,730245,650481,610215',
	    	'cfu_fu' => 'FU HCM',
	    	'level' => 'Advance',
	    	'released_date' => '2017-08-01',
	    	'expired_at' => '2021-08-01',
	    	'status' => 'complete'
        ));


        $bg1 = CertificateTemp::create(array(
        	'name' => 'BARJAS Batch 6',
	   	 	'start_date' => '2013-08-01',
	   	 	'finish_date' => '2014-08-14',
	    	'location' => 'Learning Area 2 Jakarta',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651225,830012,670288,730245,622290,650481',
	    	'cfu_fu' => 'FU ISP',
	    	'level' => 'Advance',
	    	'released_date' => '2017-09-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));

        $bh1 = CertificateTemp::create(array(
        	'name' => 'CCNP Batch 6',
	   	 	'start_date' => '2017-09-14',
	   	 	'finish_date' => '2017-09-15',
	    	'location' => 'Yogyakarta',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '640188,850111,820022,622355,601362',
	    	'cfu_fu' => 'CFU ENTERPRISE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-09-20',
	    	'expired_at' => '2020-09-20',
	    	'status' => 'complete'
        ));

        $bi1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CISO Batch 6',
	   	 	'start_date' => '2017-10-24',
	   	 	'finish_date' => '2017-10-27',
	    	'location' => 'Intercontinental Hotel Bali',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '670288,730245,633092,850111,601362',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Advance',
	    	'released_date' => '2017-10-01',
	    	'expired_at' => '2021-10-01',
	    	'status' => 'complete'
        ));


        $bj1 = CertificateTemp::create(array(
        	'name' => 'TCGT Batch 6',
	   	 	'start_date' => '2015-11-23',
	   	 	'finish_date' => '2016-12-27',
	    	'location' => 'Loker masing-masing',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '660404,633329,730245,730561,601626',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Basic',
	    	'released_date' => '2017-12-15',
	    	'expired_at' => '2022-12-15',
	    	'status' => 'complete'
        ));

        $ba1 = CertificateTemp::create(array(
        	'name' => 'CSAM Batch 7',
	   	 	'start_date' => '2013-03-04',
	   	 	'finish_date' => '2013-03-07',
	    	'location' => 'Telkom University Bandung',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '651225,591825,670288,633056,622290,780026',	
	    	'cfu_fu' => 'CEO OFFICE',
	    	'level' => 'Basic',
	    	'released_date' => '2017-01-01',
	    	'expired_at' => '2022-12-12',
	    	'status' => 'complete'
        ));

        $bb1 = CertificateTemp::create(array(
        	'name' => 'TCIF Batch 7',
	   	 	'start_date' => '2015-02-17',
	   	 	'finish_date' => '2015-02-20',
	    	'location' => 'Istana Kayana Bandung',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '640188,650456,690355,622355,601362',
	    	'cfu_fu' => 'CFU DIGITAL SERVICE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-02-01',
	    	'expired_at' => '2021-02-01',
	    	'status' => 'complete'
        ));

        $bc1 = CertificateTemp::create(array(
        	'name' => 'TCBPM Batch 7',
	   	 	'start_date' => '2016-04-24',
	   	 	'finish_date' => '2016-04-27',
	    	'location' => 'Gedung Sabuga ITB',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651093,640953,633092',
	    	'cfu_fu' => 'CFU MOBILE',
	    	'level' => 'Advance',
	    	'released_date' => '2017-04-01',
	    	'expired_at' => '2020-02-01',
	    	'status' => 'complete'
        ));


        $bd1 = CertificateTemp::create(array(
        	'name' => 'Service Operation Batch 7',
	   	 	'start_date' => '2013-05-19',
	   	 	'finish_date' => '2013-05-23',
	    	'location' => 'Telkom Corpu Bandung Gedung B',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '660404,720565,730561,601626',
	    	'cfu_fu' => 'CFU Mobile',
	    	'level' => 'Basic',
	    	'released_date' => '2017-06-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));


        $be1 = CertificateTemp::create(array(
        	'name' => 'TCOOA Batch 7',
	   	 	'start_date' => '2017-06-09',
	   	 	'finish_date' => '2017-06-15',
	    	'location' => 'Telkom Corpu Bandung Gedung ABC',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 2',
	    	'participants' => '890006,850111,820022,810073,800045,880007',
	    	'cfu_fu' => 'FU FINANCE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-07-01',
	    	'expired_at' => '2020-07-01',
	    	'status' => 'complete'
        ));


        $bf1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CMPM Batch 7',
	   	 	'start_date' => '2014-07-23',
	   	 	'finish_date' => '2014-07-28',
	    	'location' => 'Learning Area 3',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '631183,830012,633329,730245,650481,610215',
	    	'cfu_fu' => 'FU HCM',
	    	'level' => 'Advance',
	    	'released_date' => '2017-08-01',
	    	'expired_at' => '2021-08-01',
	    	'status' => 'complete'
        ));


        $bg1 = CertificateTemp::create(array(
        	'name' => 'BARJAS Batch 7',
	   	 	'start_date' => '2017-08-01',
	   	 	'finish_date' => '2017-08-14',
	    	'location' => 'Learning Area 2 Jakarta',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651225,830012,670288,730245,622290,650481',
	    	'cfu_fu' => 'FU ISP',
	    	'level' => 'Advance',
	    	'released_date' => '2017-09-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));

        $bh1 = CertificateTemp::create(array(
        	'name' => 'CCNP Batch 7',
	   	 	'start_date' => '2015-09-14',
	   	 	'finish_date' => '2015-09-15',
	    	'location' => 'Yogyakarta',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '640188,850111,820022,622355,601362',
	    	'cfu_fu' => 'CFU ENTERPRISE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-09-20',
	    	'expired_at' => '2020-09-20',
	    	'status' => 'complete'
        ));

        $bi1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CISO Batch 7',
	   	 	'start_date' => '2017-10-24',
	   	 	'finish_date' => '2017-10-27',
	    	'location' => 'Intercontinental Hotel Bali',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '670288,730245,633092,850111,601362',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Advance',
	    	'released_date' => '2017-10-01',
	    	'expired_at' => '2021-10-01',
	    	'status' => 'complete'
        ));


        $bj1 = CertificateTemp::create(array(
        	'name' => 'TCGT Batch 7',
	   	 	'start_date' => '2016-11-23',
	   	 	'finish_date' => '2016-12-27',
	    	'location' => 'Loker masing-masing',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '660404,633329,730245,730561,601626',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Basic',
	    	'released_date' => '2017-12-15',
	    	'expired_at' => '2022-12-15',
	    	'status' => 'complete'
        ));
        
        $ba1 = CertificateTemp::create(array(
        	'name' => 'CSAM Batch 1',
	   	 	'start_date' => '2017-03-04',
	   	 	'finish_date' => '2017-03-07',
	    	'location' => 'Telkom University Bandung',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '651225,591825,670288,633056,622290,780026',	
	    	'cfu_fu' => 'CEO OFFICE',
	    	'level' => 'Basic',
	    	'released_date' => '2017-01-01',
	    	'expired_at' => '2022-12-12',
	    	'status' => 'complete'
        ));

        $bb1 = CertificateTemp::create(array(
        	'name' => 'TCIF Batch 1',
	   	 	'start_date' => '2017-02-17',
	   	 	'finish_date' => '2017-02-20',
	    	'location' => 'Istana Kayana Bandung',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '640188,650456,690355,622355,601362',
	    	'cfu_fu' => 'CFU DIGITAL SERVICE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-02-01',
	    	'expired_at' => '2021-02-01',
	    	'status' => 'complete'
        ));

        $bc1 = CertificateTemp::create(array(
        	'name' => 'TCBPM Batch 1',
	   	 	'start_date' => '2017-04-24',
	   	 	'finish_date' => '2017-04-27',
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
	    	'status' => 'complete'
        ));


        $bd1 = CertificateTemp::create(array(
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
	    	'status' => 'complete'
        ));


        $be1 = CertificateTemp::create(array(
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
	    	'status' => 'complete'
        ));


        $bf1 = CertificateTemp::create(array(
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
	    	'expired_at' => '2021-08-01',
	    	'status' => 'complete'
        ));


        $bg1 = CertificateTemp::create(array(
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
	    	'status' => 'complete'
        ));

        $bh1 = CertificateTemp::create(array(
        	'name' => 'CCNP Batch 1',
	   	 	'start_date' => '2017-09-14',
	   	 	'finish_date' => '2017-09-15',
	    	'location' => 'Yogyakarta',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '640188,850111,820022,622355,601362',
	    	'cfu_fu' => 'CFU ENTERPRISE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-09-20',
	    	'expired_at' => '2020-09-20',
	    	'status' => 'complete'
        ));

        $bi1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CISO Batch 1',
	   	 	'start_date' => '2017-10-24',
	   	 	'finish_date' => '2017-10-27',
	    	'location' => 'Intercontinental Hotel Bali',
	   		'academy' => 'NITS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '670288,730245,633092,850111,601362',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Advance',
	    	'released_date' => '2017-10-01',
	    	'expired_at' => '2021-10-01',
	    	'status' => 'complete'
        ));


        $bj1 = CertificateTemp::create(array(
        	'name' => 'TCGT Batch 1',
	   	 	'start_date' => '2017-11-23',
	   	 	'finish_date' => '2017-12-27',
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
	    	'status' => 'complete'
        ));
        
        $ba1 = CertificateTemp::create(array(
        	'name' => 'CSAM Batch 8',
	   	 	'start_date' => '2014-03-04',
	   	 	'finish_date' => '2015-03-07',
	    	'location' => 'Telkom University Bandung',
	   		'academy' => 'WINS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '651225,591825,670288,633056,622290,780026',	
	    	'cfu_fu' => 'CEO OFFICE',
	    	'level' => 'Basic',
	    	'released_date' => '2017-01-01',
	    	'expired_at' => '2022-12-12',
	    	'status' => 'complete'
        ));

        $bb1 = CertificateTemp::create(array(
        	'name' => 'TCIF Batch 8',
	   	 	'start_date' => '2014-02-17',
	   	 	'finish_date' => '2016-02-20',
	    	'location' => 'Istana Kayana Bandung',
	   		'academy' => 'WINS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 3',
	    	'participants' => '640188,650456,690355,622355,601362',
	    	'cfu_fu' => 'CFU DIGITAL SERVICE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-02-01',
	    	'expired_at' => '2021-02-01',
	    	'status' => 'complete'
        ));

        $bc1 = CertificateTemp::create(array(
        	'name' => 'TCBPM Batch 8',
	   	 	'start_date' => '2013-04-24',
	   	 	'finish_date' => '2013-04-27',
	    	'location' => 'Gedung Sabuga ITB',
	   		'academy' => 'WINS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651093,640953,633092',
	    	'cfu_fu' => 'CFU MOBILE',
	    	'level' => 'Advance',
	    	'released_date' => '2017-04-01',
	    	'expired_at' => '2020-02-01',
	    	'status' => 'complete'
        ));


        $bd1 = CertificateTemp::create(array(
        	'name' => 'Service Operation Batch 8',
	   	 	'start_date' => '2017-05-19',
	   	 	'finish_date' => '2017-05-23',
	    	'location' => 'Telkom Corpu Bandung Gedung B',
	   		'academy' => 'WINS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '660404,720565,730561,601626',
	    	'cfu_fu' => 'CFU WINS',
	    	'level' => 'Basic',
	    	'released_date' => '2017-06-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));


        $be1 = CertificateTemp::create(array(
        	'name' => 'TCOOA Batch 8',
	   	 	'start_date' => '2017-06-09',
	   	 	'finish_date' => '2017-06-15',
	    	'location' => 'Telkom Corpu Bandung Gedung ABC',
	   		'academy' => 'WINS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 2',
	    	'participants' => '890006,850111,820022,810073,800045,880007',
	    	'cfu_fu' => 'FU FINANCE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-07-01',
	    	'expired_at' => '2020-07-01',
	    	'status' => 'complete'
        ));


        $bf1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CMPM Batch 8',
	   	 	'start_date' => '2015-07-23',
	   	 	'finish_date' => '2015-07-28',
	    	'location' => 'Learning Area 3',
	   		'academy' => 'WINS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '631183,830012,633329,730245,650481,610215',
	    	'cfu_fu' => 'FU HCM',
	    	'level' => 'Advance',
	    	'released_date' => '2017-08-01',
	    	'expired_at' => '2021-08-01',
	    	'status' => 'complete'
        ));


        $bg1 = CertificateTemp::create(array(
        	'name' => 'BARJAS Batch 8',
	   	 	'start_date' => '2013-08-01',
	   	 	'finish_date' => '2017-08-14',
	    	'location' => 'Learning Area 2 Jakarta',
	   		'academy' => 'WINS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 4',
	    	'participants' => '651225,830012,670288,730245,622290,650481',
	    	'cfu_fu' => 'FU ISP',
	    	'level' => 'Advance',
	    	'released_date' => '2017-09-01',
	    	'expired_at' => '2100-12-12',
	    	'status' => 'complete'
        ));

        $bh1 = CertificateTemp::create(array(
        	'name' => 'CCNP Batch 8',
	   	 	'start_date' => '2017-09-14',
	   	 	'finish_date' => '2017-09-15',
	    	'location' => 'Yogyakarta',
	   		'academy' => 'WINS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '640188,850111,820022,622355,601362',
	    	'cfu_fu' => 'CFU ENTERPRISE',
	    	'level' => 'Intermediate',
	    	'released_date' => '2017-09-20',
	    	'expired_at' => '2020-09-20',
	    	'status' => 'complete'
        ));

        $bi1 = CertificateTemp::create(array(
        	'name' => 'Sertifikasi CISO Batch 8',
	   	 	'start_date' => '2017-10-24',
	   	 	'finish_date' => '2017-10-27',
	    	'location' => 'Intercontinental Hotel Bali',
	   		'academy' => 'WINS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 5',
	    	'participants' => '670288,730245,633092,850111,601362',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Advance',
	    	'released_date' => '2017-10-01',
	    	'expired_at' => '2021-10-01',
	    	'status' => 'complete'
        ));


        $bj1 = CertificateTemp::create(array(
        	'name' => 'TCGT Batch 8',
	   	 	'start_date' => '2016-11-23',
	   	 	'finish_date' => '2017-12-27',
	    	'location' => 'Loker masing-masing',
	   		'academy' => 'WINS',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Selesai',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => '660404,633329,730245,730561,601626',
	    	'cfu_fu' => 'CFU WHOLESALE & INTERNAL',
	    	'level' => 'Basic',
	    	'released_date' => '2017-12-15',
	    	'expired_at' => '2022-12-15',
	    	'status' => 'complete'
        ));


    }
}
