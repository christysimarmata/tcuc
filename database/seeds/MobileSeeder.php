<?php

use Illuminate\Database\Seeder;
use App\Mobile;

class MobileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mobile')->delete();

        $b1 = Mobile::create(array(
        	'name' => 'Mobile Certification 1',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b2 = Mobile::create(array(
        	'name' => 'Mobile Certification 2',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b3 = Mobile::create(array(
        	'name' => 'Mobile Certification 3',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b4 = Mobile::create(array(
        	'name' => 'Mobile Certification 4',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Mobile',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        
    }
}
