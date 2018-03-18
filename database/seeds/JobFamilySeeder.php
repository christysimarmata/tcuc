<?php

use Illuminate\Database\Seeder;
use App\JobFamily;

class JobFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jobfamily')->delete();

        $b1 = JobFamily::create(array(
        	'name' => 'Job Family 1',
        ));

        $b2 = JobFamily::create(array(
        	'name' => 'Job Family 2',
        ));

        $b3 = JobFamily::create(array(
        	'name' => 'Job Family 3',
        ));

        $b4 = JobFamily::create(array(
        	'name' => 'Job Family 4',
        ));

        $b5 = JobFamily::create(array(
        	'name' => 'Job Family 5',
        ));
    }
}
