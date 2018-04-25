<?php

use Illuminate\Database\Seeder;
use App\MainProgram;

class MainProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('mainprogram')->delete();

        $b1 = MainProgram::create(array(
            'flag' => 2012,
        	'name' => 'Telkom Main Program 1',
        ));

        $b2 = MainProgram::create(array(
            'flag' => 2012,
        	'name' => 'Telkom Main Program 2',
        ));

        $b3 = MainProgram::create(array(
            'flag' => 2012,
        	'name' => 'Telkom Main Program 3',
        ));

        $b1 = MainProgram::create(array(
            'flag' => 2013,
            'name' => 'Telkom Main Program 1',
        ));

        $b2 = MainProgram::create(array(
            'flag' => 2013,
            'name' => 'Telkom Main Program 2',
        ));

        $b3 = MainProgram::create(array(
            'flag' => 2013,
            'name' => 'Telkom Main Program 3',
        ));

        $b1 = MainProgram::create(array(
            'flag' => 2014,
            'name' => 'Telkom Main Program 1',
        ));

        $b2 = MainProgram::create(array(
            'flag' => 2014,
            'name' => 'Telkom Main Program 2',
        ));

        $b3 = MainProgram::create(array(
            'flag' => 2014,
            'name' => 'Telkom Main Program 3',
        ));

        $b1 = MainProgram::create(array(
            'flag' => 2015,
            'name' => 'Telkom Main Program 1',
        ));

        $b2 = MainProgram::create(array(
            'flag' => 2015,
            'name' => 'Telkom Main Program 2',
        ));

        $b3 = MainProgram::create(array(
            'flag' => 2015,
            'name' => 'Telkom Main Program 3',
        ));

        $b1 = MainProgram::create(array(
            'flag' => 2016,
            'name' => 'Telkom Main Program 1',
        ));

        $b2 = MainProgram::create(array(
            'flag' => 2016,
            'name' => 'Telkom Main Program 2',
        ));

        $b3 = MainProgram::create(array(
            'flag' => 2016,
            'name' => 'Telkom Main Program 3',
        ));

        $b1 = MainProgram::create(array(
            'flag' => 2017,
            'name' => 'Telkom Main Program 1',
        ));

        $b2 = MainProgram::create(array(
            'flag' => 2017,
            'name' => 'Telkom Main Program 2',
        ));

        $b3 = MainProgram::create(array(
            'flag' => 2017,
            'name' => 'Telkom Main Program 3',
        ));

        $b1 = MainProgram::create(array(
            'flag' => 2018,
            'name' => 'Telkom Main Program 1',
        ));

        $b2 = MainProgram::create(array(
            'flag' => 2018,
            'name' => 'Telkom Main Program 2',
        ));

        $b3 = MainProgram::create(array(
            'flag' => 2018,
            'name' => 'Telkom Main Program 3',
        ));

    }
}
