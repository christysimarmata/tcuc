<?php

use Illuminate\Database\Seeder;
use App\Leadership;

class LeadershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('leadership')->delete();

        $b1 = Leadership::create(array(
        	'name' => 'Leadership Certification 1',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b2 = Leadership::create(array(
        	'name' => 'Leadership Certification 2',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b3 = Leadership::create(array(
        	'name' => 'Leadership Certification 3',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b4 = Leadership::create(array(
        	'name' => 'Leadership Certification 4',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Leadership',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

    }
}
