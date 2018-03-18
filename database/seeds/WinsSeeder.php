<?php

use Illuminate\Database\Seeder;
use App\Wins;

class WinsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('wins')->delete();

        $b1 = Wins::create(array(
        	'name' => 'Wins Certification 1',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Wins',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b2 = Wins::create(array(
        	'name' => 'Wins Certification 2',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Wins',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b3 = Wins::create(array(
        	'name' => 'Wins Certification 3',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Wins',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b4 = Wins::create(array(
        	'name' => 'Wins Certification 4',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Wins',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        
    }
}
