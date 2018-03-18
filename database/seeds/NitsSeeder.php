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

        $b1 = Nits::create(array(
        	'name' => 'Nits Certification 1',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b2 = Nits::create(array(
        	'name' => 'Nits Certification 2',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 2',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b3 = Nits::create(array(
        	'name' => 'Nits Certification 3',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 3',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b4 = Nits::create(array(
        	'name' => 'Nits Certification 4',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b5 = Nits::create(array(
        	'name' => 'Nits Certification 5',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 4',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b6 = Nits::create(array(
        	'name' => 'Nits Certification 6',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 5',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b7 = Nits::create(array(
        	'name' => 'Nits Certification 7',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 1',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b8 = Nits::create(array(
        	'name' => 'Nits Certification 8',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 2',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b9 = Nits::create(array(
        	'name' => 'Nits Certification 9',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 5',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b10 = Nits::create(array(
        	'name' => 'Nits Certification 10',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 1',
	    	'job_family' => 'Job Family 1',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b11 = Nits::create(array(
        	'name' => 'Nits Certification 11',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 2',
	    	'job_family' => 'Job Family 2',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));

        $b12 = Nits::create(array(
        	'name' => 'Nits Certification 12',
	   	 	'start_date' => '2017-02-14',
	   	 	'finish_date' => '2017-02-14',
	    	'location' => 'Bandung',
	   		'academy' => 'Nits',
	    	'outline'=> 'Pembukaan, Kata Sambutan, Sarapan, Inti, Kelar',
	    	'telkom_main' => 'Telkom Main Program 3',
	    	'job_family' => 'Job Family 3',
	    	'participants' => 'user1,user2,user3,user4,user5,user6,user7,user8,user9,user10,user11,user12'
        ));
    }
}
