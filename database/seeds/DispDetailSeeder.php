<?php

use Illuminate\Database\Seeder;
use App\DispDetail;

class DispDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disp_detail')->delete();

        $ba1 = DispDetail::create(array(
        	'name' => 'CSAM Batch 4',
        	'job_family' => 'Job Family 3',
	    	'peserta' => '651225',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '651225.jpg',
	    	
        ));

        $ba2 = DispDetail::create(array(
        	'name' => 'CSAM Batch 4',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '591825',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '591825.jpg',
	    	
        ));

        $ba3 = DispDetail::create(array(
        	'name' => 'CSAM Batch 4',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '670288',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '670288.jpg',
	    	
        ));

        $ba4 = DispDetail::create(array(
        	'name' => 'CSAM Batch 4',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '633056',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '633056.jpg',
	    	
        ));

        $ba5 = DispDetail::create(array(
        	'name' => 'CSAM Batch 4',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '622290',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '622290.jpg',
	    	
        ));

        $ba6= DispDetail::create(array(
        	'name' => 'CSAM Batch 4',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '780026',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '780026.jpg',
	    	
        ));

        $bb1 = DispDetail::create(array(
        	'name' => 'TCIF Batch 4',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '640188',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '640188.jpg',
	    	
        ));

        $bb2 = DispDetail::create(array(
        	'name' => 'TCIF Batch 4',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '650456',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '650456.jpg',
	    	
        ));

        $bb3 = DispDetail::create(array(
        	'name' => 'TCIF Batch 4',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '690355',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '690355.jpg',
	    	
        ));

        $bb4 = DispDetail::create(array(
        	'name' => 'TCIF Batch 4',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '622355',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '622355.jpg',
	    	
        ));

        $bb5 = DispDetail::create(array(
        	'name' => 'TCIF Batch 4',
	   	 	'job_family' => 'Job Family 3',
	    	'peserta' => '601362',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '601362.jpg',
	    	
        ));


        $bc1 = DispDetail::create(array(
        	'name' => 'TCBPM Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '651093',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '651093.jpg',
	    	
        ));

        $bc2 = DispDetail::create(array(
        	'name' => 'TCBPM Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '640953',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '640953.jpg',
	    	
        ));

        $bc3 = DispDetail::create(array(
        	'name' => 'TCBPM Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '633092',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '633092.jpg',
	    	
        ));

        $bd1 = DispDetail::create(array(
        	'name' => 'Service Operation Batch 4',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '660404',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '660404.jpg',
	    	
        ));

        $bd2 = DispDetail::create(array(
        	'name' => 'Service Operation Batch 4',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '720565',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '720565.jpg',
	    	
        ));

        $bd3 = DispDetail::create(array(
        	'name' => 'Service Operation Batch 4',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '730561',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '730561.jpg',
	    	
        ));

        $bd4 = DispDetail::create(array(
        	'name' => 'Service Operation Batch 4',	
        	'job_family' => 'Job Family 5',
	    	'peserta' => '601626',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '601626.jpg',
	    	
        ));

        $be1 = DispDetail::create(array(
        	'name' => 'TCOOA Batch 4',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '890006',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '890006.jpg',
	    	
        ));

        $be2 = DispDetail::create(array(
        	'name' => 'TCOOA Batch 4',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '850111',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '850111.jpg',
	    	
        ));

        $be3 = DispDetail::create(array(
        	'name' => 'TCOOA Batch 4',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '820022',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '820022.jpg',
	    	
        ));

        $be4 = DispDetail::create(array(
        	'name' => 'TCOOA Batch 4',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '810073',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '810073.jpg',
	    	
        ));

        $be5 = DispDetail::create(array(
        	'name' => 'TCOOA Batch 4',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '800045',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '800045.jpg',
	    	
        ));

        $be6 = DispDetail::create(array(
        	'name' => 'TCOOA Batch 4',
	   	 	'job_family' => 'Job Family 2',
	    	'peserta' => '880007',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '880007.jpg',
	    	
        ));

        $bf1 = DispDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '631183',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '631183.jpg',
	    	
        ));

        $bf2 = DispDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '830012',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '830012.jpg',
	    	
        ));

        $bf3 = DispDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '633329',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '633329.jpg',
	    	
        ));

        $bf4 = DispDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '730245',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '730245.jpg',
	    	
        ));

        $bf5 = DispDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '650481',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '650481.jpg',
	    	
        ));

        $bf6 = DispDetail::create(array(
        	'name' => 'Sertifikasi CMPM Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '610215',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '610215.jpg',
	    	
        ));


        $bg1 = DispDetail::create(array(
        	'name' => 'BARJAS Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '651225',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '651225.jpg',
	    	
        ));

        $bg2 = DispDetail::create(array(
        	'name' => 'BARJAS Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '830012',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '830012.jpg',
	    	
        ));

        $bg3 = DispDetail::create(array(
        	'name' => 'BARJAS Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '670288',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '670288.jpg',
	    	
        ));

        $bg4 = DispDetail::create(array(
        	'name' => 'BARJAS Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '730245',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '730245.jpg',
	    	
        ));

        $bg5 = DispDetail::create(array(
        	'name' => 'BARJAS Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '622290',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '622290.jpg',
	    	
        ));

        $bg6 = DispDetail::create(array(
        	'name' => 'BARJAS Batch 4',
	   	 	'job_family' => 'Job Family 4',
	    	'peserta' => '650481',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '650481.jpg',
	    	
        ));

        $bh1 = DispDetail::create(array(
        	'name' => 'CCNP Batch 4',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '640188',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '640188.jpg',
	    	
        ));

        $bh2 = DispDetail::create(array(
        	'name' => 'CCNP Batch 4',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '850111',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '850111.jpg',
	    	
        ));

        $bh3 = DispDetail::create(array(
        	'name' => 'CCNP Batch 4',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '820022',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '820022.jpg',
	    	
        ));

        $bh3 = DispDetail::create(array(
        	'name' => 'CCNP Batch 4',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '622355',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '622355.jpg',
	    	
        ));

        $bh3 = DispDetail::create(array(
        	'name' => 'CCNP Batch 4',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '601362',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '601362.jpg',
	    	
	    	
        ));

        $bi1 = DispDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 4',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '670288',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '670288.jpg',
	    	
        ));

        $bi2 = DispDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 4',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '730245',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '730245.jpg',
	    	
        ));

        $bi3 = DispDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 4',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '633092',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '633092.jpg',
	    	
        ));

        $bi4 = DispDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 4',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '850111',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '850111.jpg',
	    	
        ));

        $bi5 = DispDetail::create(array(
        	'name' => 'Sertifikasi CISO Batch 4',
	   	 	'job_family' => 'Job Family 5',
	    	'peserta' => '601362',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '601362.jpg',
	    	
        ));

        $bj1 = DispDetail::create(array(
        	'name' => 'TCGT Batch 4',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '660404',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '660404.jpg',
	    	
        ));

        $bj2 = DispDetail::create(array(
        	'name' => 'TCGT Batch 4',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '633329',
	    	
	    	'participant_status' => 'Attendee','division' => 'Business Development',
	    	'file_name' => '633329.jpg',
	    	
        ));

        $bj3 = DispDetail::create(array(
        	'name' => 'TCGT Batch 4',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '730425',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '730245.jpg',
	    	
        ));

        $bj4 = DispDetail::create(array(
        	'name' => 'TCGT Batch 4',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '730561',
	    	
	    	'participant_status' => 'Certified','division' => 'Human Resource',
	    	'file_name' => '730561.jpg',
	    	
        ));

        $bj5 = DispDetail::create(array(
        	'name' => 'TCGT Batch 4',
	   	 	'job_family' => 'Job Family 1',
	    	'peserta' => '601626',
	    	
	    	'participant_status' => 'Qualified','division' => 'Human Development',
	    	'file_name' => '601626.jpg',
	    	
        ));
        
    }
}
