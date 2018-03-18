<?php

use Illuminate\Database\Seeder;
use App\Business;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('business')->delete();

        $b1 = Business::create(array(
        	'name' => 'Business Certification 1',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b2 = Business::create(array(
        	'name' => 'Business Certification 2',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b3 = Business::create(array(
        	'name' => 'Business Certification 3',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b4 = Business::create(array(
        	'name' => 'Business Certification 4',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Business Enabler',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        

        

       
    }
}
