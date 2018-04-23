<?php

use Illuminate\Database\Seeder;
use App\BusinessDetail;

class BusinessDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_detail')->delete();

        $ba1 = BusinessDetail::create(array(
        	'name' => 'CSAM Batch 2',
        	'job_family' => 'Job Family 3',
	    	'peserta' => '651225',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '651225.jpg',
	    	
        ));

        $ba2 = BusinessDetail::create(array(
        	'name' => 'CSAM Batch 2',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '591825',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '591825.jpg',
	    	
        ));

        $ba3 = BusinessDetail::create(array(
        	'name' => 'CSAM Batch 2',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '670288',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '670288.jpg',
	    	
        ));

        $ba4 = BusinessDetail::create(array(
        	'name' => 'CSAM Batch 2',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '633056',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '633056.jpg',
	    	
        ));

        $ba5 = BusinessDetail::create(array(
        	'name' => 'CSAM Batch 2',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '622290',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '622290.jpg',
	    	
        ));

        $ba6= BusinessDetail::create(array(
        	'name' => 'CSAM Batch 2',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '780026',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '780026.jpg',
	    	
        ));

        $bb1 = BusinessDetail::create(array(
        	'name' => 'TCIF Batch 2',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '640188',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '640188.jpg',
	    	
        ));

        $bb2 = BusinessDetail::create(array(
        	'name' => 'TCIF Batch 2',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '650456',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '650456.jpg',
	    	
        ));

        $bb3 = BusinessDetail::create(array(
        	'name' => 'TCIF Batch 2',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '690355',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '690355.jpg',
	    	
        ));

        $bb4 = BusinessDetail::create(array(
        	'name' => 'TCIF Batch 2',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '622355',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '622355.jpg',
	    	
        ));

        $bb5 = BusinessDetail::create(array(
        	'name' => 'TCIF Batch 2',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '601362',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '601362.jpg',
	    	
        ));


        $bc1 = BusinessDetail::create(array(
        	'name' => 'TCBPM Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '651093',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '651093.jpg',
	    	
        ));

        $bc2 = BusinessDetail::create(array(
        	'name' => 'TCBPM Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '640953',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '640953.jpg',
	    	
        ));

        $bc3 = BusinessDetail::create(array(
        	'name' => 'TCBPM Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '633092',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '633092.jpg',
	    	
        ));

        $bd1 = BusinessDetail::create(array(
        	'name' => 'Service Operation Batch 2',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '660404',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '660404.jpg',
	    	
        ));

        $bd2 = BusinessDetail::create(array(
        	'name' => 'Service Operation Batch 2',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '720565',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '720565.jpg',
	    	
        ));

        $bd3 = BusinessDetail::create(array(
        	'name' => 'Service Operation Batch 2',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '730561',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730561.jpg',
	    	
        ));

        $bd4 = BusinessDetail::create(array(
        	'name' => 'Service Operation Batch 2',	
        	'job_family' => 'Job Family 5',
	    	'peserta' => '601626',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '601626.jpg',
	    	
        ));

        $be1 = BusinessDetail::create(array(
        	'name' => 'TCOOA Batch 2',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '890006',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '890006.jpg',
	    	
        ));

        $be2 = BusinessDetail::create(array(
        	'name' => 'TCOOA Batch 2',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '850111',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '850111.jpg',
	    	
        ));

        $be3 = BusinessDetail::create(array(
        	'name' => 'TCOOA Batch 2',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '820022',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '820022.jpg',
	    	
        ));

        $be4 = BusinessDetail::create(array(
        	'name' => 'TCOOA Batch 2',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '810073',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '810073.jpg',
	    	
        ));

        $be5 = BusinessDetail::create(array(
        	'name' => 'TCOOA Batch 2',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '800045',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '800045.jpg',
	    	
        ));

        $be6 = BusinessDetail::create(array(
        	'name' => 'TCOOA Batch 2',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '880007',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '880007.jpg',
	    	
        ));

        $bf1 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '631183',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '631183.jpg',
	    	
        ));

        $bf2 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '830012',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '830012.jpg',
	    	
        ));

        $bf3 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '633329',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '633329.jpg',
	    	
        ));

        $bf4 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '730245',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730245.jpg',
	    	
        ));

        $bf5 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '650481',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '650481.jpg',
	    	
        ));

        $bf6 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '610215',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '610215.jpg',
	    	
        ));


        $bg1 = BusinessDetail::create(array(
        	'name' => 'BARJAS Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '651225',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '651225.jpg',
	    	
        ));

        $bg2 = BusinessDetail::create(array(
        	'name' => 'BARJAS Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '830012',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '830012.jpg',
	    	
        ));

        $bg3 = BusinessDetail::create(array(
        	'name' => 'BARJAS Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '670288',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '670288.jpg',
	    	
        ));

        $bg4 = BusinessDetail::create(array(
        	'name' => 'BARJAS Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '730245',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730245.jpg',
	    	
        ));

        $bg5 = BusinessDetail::create(array(
        	'name' => 'BARJAS Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '622290',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '622290.jpg',
	    	
        ));

        $bg6 = BusinessDetail::create(array(
        	'name' => 'BARJAS Batch 2',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '650481',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '650481.jpg',
	    	
        ));

        $bh1 = BusinessDetail::create(array(
        	'name' => 'CCNP Batch 2',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '640188',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '640188.jpg',
	    	
        ));

        $bh2 = BusinessDetail::create(array(
        	'name' => 'CCNP Batch 2',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '850111',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '850111.jpg',
	    	
        ));

        $bh3 = BusinessDetail::create(array(
        	'name' => 'CCNP Batch 2',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '820022',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '820022.jpg',
	    	
        ));

        $bh3 = BusinessDetail::create(array(
        	'name' => 'CCNP Batch 2',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '622355',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '622355.jpg',
	    	
        ));

        $bh3 = BusinessDetail::create(array(
        	'name' => 'CCNP Batch 2',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '601362',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '601362.jpg',
	    	
	    	
        ));

        $bi1 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 2',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '670288',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '670288.jpg',
	    	
        ));

        $bi2 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 2',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '730245',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730245.jpg',
	    	
        ));

        $bi3 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 2',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '633092',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '633092.jpg',
	    	
        ));

        $bi4 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 2',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '850111',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '850111.jpg',
	    	
        ));

        $bi5 = BusinessDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 2',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '601362',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '601362.jpg',
	    	
        ));

        $bj1 = BusinessDetail::create(array(
        	'name' => 'TCGT Batch 2',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '660404',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '660404.jpg',
	    	
        ));

        $bj2 = BusinessDetail::create(array(
        	'name' => 'TCGT Batch 2',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '633329',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '633329.jpg',
	    	
        ));

        $bj3 = BusinessDetail::create(array(
        	'name' => 'TCGT Batch 2',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '730425',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730245.jpg',
	    	
        ));

        $bj4 = BusinessDetail::create(array(
        	'name' => 'TCGT Batch 2',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '730561',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730561.jpg',
	    	
        ));

        $bj5 = BusinessDetail::create(array(
        	'name' => 'TCGT Batch 2',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '601626',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '601626.jpg',
	    	
        ));
        
    }
}
