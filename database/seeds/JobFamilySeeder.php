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
            'flag' => 2012,
        	'name' => 'Job Family 1',
        ));

        $b2 = JobFamily::create(array(
            'flag' => 2012,
        	'name' => 'Job Family 2',
        ));

        $b3 = JobFamily::create(array(
            'flag' => 2012,
        	'name' => 'Job Family 3',
        ));

        $b4 = JobFamily::create(array(
            'flag' => 2012,
        	'name' => 'Job Family 4',
        ));

        $b5 = JobFamily::create(array(
            'flag' => 2012,
        	'name' => 'Job Family 5',
        ));

        $b1 = JobFamily::create(array(
            'flag' => 2013,
            'name' => 'Job Family 1',
        ));

        $b2 = JobFamily::create(array(
            'flag' => 2013,
            'name' => 'Job Family 2',
        ));

        $b3 = JobFamily::create(array(
            'flag' => 2013,
            'name' => 'Job Family 3',
        ));

        $b4 = JobFamily::create(array(
            'flag' => 2013,
            'name' => 'Job Family 4',
        ));

        $b5 = JobFamily::create(array(
            'flag' => 2013,
            'name' => 'Job Family 5',
        ));

        $b1 = JobFamily::create(array(
            'flag' => 2014,
            'name' => 'Job Family 1',
        ));

        $b2 = JobFamily::create(array(
            'flag' => 2014,
            'name' => 'Job Family 2',
        ));

        $b3 = JobFamily::create(array(
            'flag' => 2014,
            'name' => 'Job Family 3',
        ));

        $b4 = JobFamily::create(array(
            'flag' => 2014,
            'name' => 'Job Family 4',
        ));

        $b5 = JobFamily::create(array(
            'flag' => 2014,
            'name' => 'Job Family 5',
        ));

        $b1 = JobFamily::create(array(
            'flag' => 2015,
            'name' => 'Job Family 1',
        ));

        $b2 = JobFamily::create(array(
            'flag' => 2015,
            'name' => 'Job Family 2',
        ));

        $b3 = JobFamily::create(array(
            'flag' => 2015,
            'name' => 'Job Family 3',
        ));

        $b4 = JobFamily::create(array(
            'flag' => 2015,
            'name' => 'Job Family 4',
        ));

        $b5 = JobFamily::create(array(
            'flag' => 2015,
            'name' => 'Job Family 5',
        ));

        $b1 = JobFamily::create(array(
            'flag' => 2016,
            'name' => 'Job Family 1',
        ));

        $b2 = JobFamily::create(array(
            'flag' => 2016,
            'name' => 'Job Family 2',
        ));

        $b3 = JobFamily::create(array(
            'flag' => 2016,
            'name' => 'Job Family 3',
        ));

        $b4 = JobFamily::create(array(
            'flag' => 2016,
            'name' => 'Job Family 4',
        ));

        $b5 = JobFamily::create(array(
            'flag' => 2016,
            'name' => 'Job Family 5',
        ));

        $b1 = JobFamily::create(array(
            'flag' => 2017,
            'name' => 'Job Family 1',
        ));

        $b2 = JobFamily::create(array(
            'flag' => 2017,
            'name' => 'Job Family 2',
        ));

        $b3 = JobFamily::create(array(
            'flag' => 2017,
            'name' => 'Job Family 3',
        ));

        $b4 = JobFamily::create(array(
            'flag' => 2017,
            'name' => 'Job Family 4',
        ));

        $b5 = JobFamily::create(array(
            'flag' => 2017,
            'name' => 'Job Family 5',
        ));

        $b1 = JobFamily::create(array(
            'flag' => 2018,
            'name' => 'Job Family 1',
        ));

        $b2 = JobFamily::create(array(
            'flag' => 2018,
            'name' => 'Job Family 2',
        ));

        $b3 = JobFamily::create(array(
            'flag' => 2018,
            'name' => 'Job Family 3',
        ));

        $b4 = JobFamily::create(array(
            'flag' => 2018,
            'name' => 'Job Family 4',
        ));

        $b5 = JobFamily::create(array(
            'flag' => 2018,
            'name' => 'Job Family 5',
        ));
    }
}
