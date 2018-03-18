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
        	'name' => 'Telkom Main Program 1',
        ));

        $b2 = MainProgram::create(array(
        	'name' => 'Telkom Main Program 2',
        ));

        $b3 = MainProgram::create(array(
        	'name' => 'Telkom Main Program 3',
        ));

    }
}
