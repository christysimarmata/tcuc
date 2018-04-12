<?php

use Illuminate\Database\Seeder;
use App\WinsDetail;

class WinsDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wins_detail')->delete();

        $ba1 = WinsDetail::create(array(
        	'name' => 'CSAM Batch 8',
        	'job_family' => 'Job Family 3',
	    	'peserta' => '651225',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '651225.jpg','ubpp' => '90'
	    	
        ));

        $ba2 = WinsDetail::create(array(
        	'name' => 'CSAM Batch 8',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '591825',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '591825.jpg','ubpp' => '90'
	    	
        ));

        $ba3 = WinsDetail::create(array(
        	'name' => 'CSAM Batch 8',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '670288',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '670288.jpg','ubpp' => '90'
	    	
        ));

        $ba4 = WinsDetail::create(array(
        	'name' => 'CSAM Batch 8',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '633056',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '633056.jpg','ubpp' => '90'
	    	
        ));

        $ba5 = WinsDetail::create(array(
        	'name' => 'CSAM Batch 8',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '622290',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '622290.jpg','ubpp' => '90'
	    	
        ));

        $ba6= WinsDetail::create(array(
        	'name' => 'CSAM Batch 8',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '780026',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '780026.jpg','ubpp' => '90'
	    	
        ));

        $bb1 = WinsDetail::create(array(
        	'name' => 'TCIF Batch 8',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '640188',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '640188.jpg','ubpp' => '90'
	    	
        ));

        $bb2 = WinsDetail::create(array(
        	'name' => 'TCIF Batch 8',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '650456',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '650456.jpg','ubpp' => '90'
	    	
        ));

        $bb3 = WinsDetail::create(array(
        	'name' => 'TCIF Batch 8',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '690355',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '690355.jpg','ubpp' => '90'
	    	
        ));

        $bb4 = WinsDetail::create(array(
        	'name' => 'TCIF Batch 8',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '622355',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '622355.jpg','ubpp' => '90'
	    	
        ));

        $bb5 = WinsDetail::create(array(
        	'name' => 'TCIF Batch 8',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '601362',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '601362.jpg','ubpp' => '90'
	    	
        ));


        $bc1 = WinsDetail::create(array(
        	'name' => 'TCBPM Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '651093',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '651093.jpg','ubpp' => '90'
	    	
        ));

        $bc2 = WinsDetail::create(array(
        	'name' => 'TCBPM Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '640953',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '640953.jpg','ubpp' => '90'
	    	
        ));

        $bc3 = WinsDetail::create(array(
        	'name' => 'TCBPM Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '633092',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '633092.jpg','ubpp' => '90'
	    	
        ));

        $bd1 = WinsDetail::create(array(
        	'name' => 'Service Operation Batch 8',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '660404',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '660404.jpg','ubpp' => '90'
	    	
        ));

        $bd2 = WinsDetail::create(array(
        	'name' => 'Service Operation Batch 8',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '720565',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '720565.jpg','ubpp' => '90'
	    	
        ));

        $bd3 = WinsDetail::create(array(
        	'name' => 'Service Operation Batch 8',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '730561',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730561.jpg','ubpp' => '90'
	    	
        ));

        $bd4 = WinsDetail::create(array(
        	'name' => 'Service Operation Batch 8',	
        	'job_family' => 'Job Family 5',
	    	'peserta' => '601626',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '601626.jpg','ubpp' => '90'
	    	
        ));

        $be1 = WinsDetail::create(array(
        	'name' => 'TCOOA Batch 8',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '890006',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '890006.jpg','ubpp' => '90'
	    	
        ));

        $be2 = WinsDetail::create(array(
        	'name' => 'TCOOA Batch 8',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '850111',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '850111.jpg','ubpp' => '90'
	    	
        ));

        $be3 = WinsDetail::create(array(
        	'name' => 'TCOOA Batch 8',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '820022',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '820022.jpg','ubpp' => '90'
	    	
        ));

        $be4 = WinsDetail::create(array(
        	'name' => 'TCOOA Batch 8',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '810073',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '810073.jpg','ubpp' => '90'
	    	
        ));

        $be5 = WinsDetail::create(array(
        	'name' => 'TCOOA Batch 8',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '800045',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '800045.jpg','ubpp' => '90'
	    	
        ));

        $be6 = WinsDetail::create(array(
        	'name' => 'TCOOA Batch 8',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '880007',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '880007.jpg','ubpp' => '90'
	    	
        ));

        $bf1 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '631183',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '631183.jpg','ubpp' => '90'
	    	
        ));

        $bf2 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '830012',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '830012.jpg','ubpp' => '90'
	    	
        ));

        $bf3 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '633329',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '633329.jpg','ubpp' => '90'
	    	
        ));

        $bf4 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '730245',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730245.jpg','ubpp' => '90'
	    	
        ));

        $bf5 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '650481',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '650481.jpg','ubpp' => '90'
	    	
        ));

        $bf6 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '610215',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '610215.jpg','ubpp' => '90'
	    	
        ));


        $bg1 = WinsDetail::create(array(
        	'name' => 'BARJAS Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '651225',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '651225.jpg','ubpp' => '90'
	    	
        ));

        $bg2 = WinsDetail::create(array(
        	'name' => 'BARJAS Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '830012',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '830012.jpg','ubpp' => '90'
	    	
        ));

        $bg3 = WinsDetail::create(array(
        	'name' => 'BARJAS Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '670288',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '670288.jpg','ubpp' => '90'
	    	
        ));

        $bg4 = WinsDetail::create(array(
        	'name' => 'BARJAS Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '730245',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730245.jpg','ubpp' => '90'
	    	
        ));

        $bg5 = WinsDetail::create(array(
        	'name' => 'BARJAS Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '622290',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '622290.jpg','ubpp' => '90'
	    	
        ));

        $bg6 = WinsDetail::create(array(
        	'name' => 'BARJAS Batch 8',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '650481',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '650481.jpg','ubpp' => '90'
	    	
        ));

        $bh1 = WinsDetail::create(array(
        	'name' => 'CCNP Batch 8',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '640188',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '640188.jpg','ubpp' => '90'
	    	
        ));

        $bh2 = WinsDetail::create(array(
        	'name' => 'CCNP Batch 8',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '850111',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '850111.jpg','ubpp' => '90'
	    	
        ));

        $bh3 = WinsDetail::create(array(
        	'name' => 'CCNP Batch 8',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '820022',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '820022.jpg','ubpp' => '90'
	    	
        ));

        $bh3 = WinsDetail::create(array(
        	'name' => 'CCNP Batch 8',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '622355',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '622355.jpg','ubpp' => '90'
	    	
        ));

        $bh3 = WinsDetail::create(array(
        	'name' => 'CCNP Batch 8',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '601362',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '601362.jpg','ubpp' => '90'
	    	
	    	
        ));

        $bi1 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 8',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '670288',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '670288.jpg','ubpp' => '90'
	    	
        ));

        $bi2 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 8',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '730245',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730245.jpg','ubpp' => '90'
	    	
        ));

        $bi3 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 8',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '633092',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '633092.jpg','ubpp' => '90'
	    	
        ));

        $bi4 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 8',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '850111',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '850111.jpg','ubpp' => '90'
	    	
        ));

        $bi5 = WinsDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 8',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '601362',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '601362.jpg','ubpp' => '90'
	    	
        ));

        $bj1 = WinsDetail::create(array(
        	'name' => 'TCGT Batch 8',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '660404',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '660404.jpg','ubpp' => '90'
	    	
        ));

        $bj2 = WinsDetail::create(array(
        	'name' => 'TCGT Batch 8',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '633329',
	    	
	    	'participant_status' => 'Attendee',
	    	'file_name' => '633329.jpg','ubpp' => '90'
	    	
        ));

        $bj3 = WinsDetail::create(array(
        	'name' => 'TCGT Batch 8',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '730425',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730245.jpg','ubpp' => '90'
	    	
        ));

        $bj4 = WinsDetail::create(array(
        	'name' => 'TCGT Batch 8',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '730561',
	    	
	    	'participant_status' => 'Certified',
	    	'file_name' => '730561.jpg','ubpp' => '90'
	    	
        ));

        $bj5 = WinsDetail::create(array(
        	'name' => 'TCGT Batch 8',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '601626',
	    	
	    	'participant_status' => 'Qualified',
	    	'file_name' => '601626.jpg','ubpp' => '90'
	    	
        ));
        
    }
}
