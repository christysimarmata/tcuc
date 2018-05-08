<?php

use Illuminate\Database\Seeder;

class AcademySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('academy')->delete();

        DB::table('academy')->insert([
            'flag' => 2015,
        	'name' => 'NITS',
            'table' => 'nits', 'table_detail' => 'nits_detail', 'niklde' => 'ldenits', 'niknonlde' => 'nonldenits'
        ]);

        DB::table('academy')->insert([
            'flag' => 2015,
        	'name' => 'Consumer', 'table' => 'consumer', 'table_detail' => 'consumer_detail', 'niklde' => 'ldeconsumer', 'niknonlde' => 'nonldeconsumer'
        ]);

        DB::table('academy')->insert([
            'flag' => 2015,
        	'name' => 'DISP', 'table' => 'disp', 'table_detail' => 'disp_detail', 'niklde' => 'ldedisp', 'niknonlde' => 'nonldedisp'
        ]);

        DB::table('academy')->insert([
            'flag' => 2015,
        	'name' => 'WINS', 'table' => 'wins', 'table_detail' => 'wins_detail', 'niklde' => 'ldewins', 'niknonlde' => 'nonldewins'
        ]);

        DB::table('academy')->insert([
            'flag' => 2015,
        	'name' => 'Mobile', 'table' => 'mobile', 'table_detail' => 'mobile_detail', 'niklde' => 'ldemobile', 'niknonlde' => 'nonldemobile'
        ]);
        DB::table('academy')->insert([
            'flag' => 2015,
        	'name' => 'Enterprise', 'table' => 'enterprise', 'table_detail' => 'enterprise_detail', 'niklde' => 'ldeenterprise', 'niknonlde' => 'nonldeenterprise'
        ]);

        DB::table('academy')->insert([
            'flag' => 2015,
        	'name' => 'Business Enabler', 'table' => 'business_enabler', 'table_detail' => 'business_enabler_detail', 'niklde' => 'ldebusinessenabler', 'niknonlde' => 'nonldebusinessenabler'
        ]);

        DB::table('academy')->insert([
            'flag' => 2015,
        	'name' => 'Leadership', 'table' => 'leadership', 'table_detail' => 'leadership_detail', 'niklde' => 'ldeleadership', 'niknonlde' => 'nonldeleadership'
        ]);

        DB::table('academy')->insert([
            'flag' => 2016,
        	'name' => 'NITS', 'table' => 'nits', 'table_detail' => 'nits_detail', 'niklde' => 'ldenits', 'niknonlde' => 'nonldenits'
        ]);

        DB::table('academy')->insert([
            'flag' => 2016,
        	'name' => 'Consumer', 'table' => 'consumer', 'table_detail' => 'consumer_detail', 'niklde' => 'ldeconsumer', 'niknonlde' => 'nonldeconsumer'
        ]);

        DB::table('academy')->insert([
            'flag' => 2016,
        	'name' => 'DISP', 'table' => 'disp', 'table_detail' => 'disp_detail', 'niklde' => 'ldedisp', 'niknonlde' => 'nonldedisp'
        ]);

        DB::table('academy')->insert([
            'flag' => 2016,
        	'name' => 'WINS', 'table' => 'wins', 'table_detail' => 'wins_detail', 'niklde' => 'ldewins', 'niknonlde' => 'nonldewins'
        ]);

        DB::table('academy')->insert([
            'flag' => 2016,
        	'name' => 'Mobile', 'table' => 'mobile', 'table_detail' => 'mobile_detail', 'niklde' => 'ldemobile', 'niknonlde' => 'nonldemobile'
        ]);
        DB::table('academy')->insert([
            'flag' => 2016,
        	'name' => 'Enterprise', 'table' => 'enterprise', 'table_detail' => 'enterprise_detail', 'niklde' => 'ldeenterprise', 'niknonlde' => 'nonldeenterprise'
        ]);

        DB::table('academy')->insert([
            'flag' => 2016,
        	'name' => 'Business Enabler', 'table' => 'business_enabler', 'table_detail' => 'business_enabler_detail', 'niklde' => 'ldebusinessenabler', 'niknonlde' => 'nonldebusinessenabler'
        ]);

        DB::table('academy')->insert([
            'flag' => 2016,
        	'name' => 'Leadership', 'table' => 'leadership', 'table_detail' => 'leadership_detail', 'niklde' => 'ldeleadership', 'niknonlde' => 'nonldeleadership'
        ]);

        DB::table('academy')->insert([
            'flag' => 2017,
        	'name' => 'NITS', 'table' => 'nits', 'table_detail' => 'nits_detail', 'niklde' => 'ldenits', 'niknonlde' => 'nonldenits'
        ]);

        DB::table('academy')->insert([
            'flag' => 2017,
        	'name' => 'Consumer', 'table' => 'consumer', 'table_detail' => 'consumer_detail', 'niklde' => 'ldeconsumer', 'niknonlde' => 'nonldeconsumer'
        ]);

        DB::table('academy')->insert([
            'flag' => 2017,
        	'name' => 'DISP', 'table' => 'disp', 'table_detail' => 'disp_detail', 'niklde' => 'ldedisp', 'niknonlde' => 'nonldedisp'
        ]);

        DB::table('academy')->insert([
            'flag' => 2017,
        	'name' => 'WINS', 'table' => 'wins', 'table_detail' => 'wins_detail', 'niklde' => 'ldewins', 'niknonlde' => 'nonldewins'
        ]);

        DB::table('academy')->insert([
            'flag' => 2017,
        	'name' => 'Mobile', 'table' => 'mobile', 'table_detail' => 'mobile_detail', 'niklde' => 'ldemobile', 'niknonlde' => 'nonldemobile'
        ]);
        DB::table('academy')->insert([
            'flag' => 2017,
        	'name' => 'Enterprise', 'table' => 'enterprise', 'table_detail' => 'enterprise_detail', 'niklde' => 'ldeenterprise', 'niknonlde' => 'nonldeenterprise'
        ]);

        DB::table('academy')->insert([
            'flag' => 2017,
        	'name' => 'Business Enabler', 'table' => 'business_enabler', 'table_detail' => 'business_enabler_detail', 'niklde' => 'ldebusinessenabler', 'niknonlde' => 'nonldebusinessenabler'
        ]);

        DB::table('academy')->insert([
            'flag' => 2017,
        	'name' => 'Leadership', 'table' => 'leadership', 'table_detail' => 'leadership_detail', 'niklde' => 'ldeleadership', 'niknonlde' => 'nonldeleadership'
        ]);

        DB::table('academy')->insert([
            'flag' => 2018,
        	'name' => 'NITS', 'table' => 'nits', 'table_detail' => 'nits_detail', 'niklde' => 'ldenits', 'niknonlde' => 'nonldenits'
        ]);

        DB::table('academy')->insert([
            'flag' => 2018,
        	'name' => 'Consumer', 'table' => 'consumer', 'table_detail' => 'consumer_detail', 'niklde' => 'ldeconsumer', 'niknonlde' => 'nonldeconsumer'
        ]);

        DB::table('academy')->insert([
            'flag' => 2018,
        	'name' => 'DISP', 'table' => 'disp', 'table_detail' => 'disp_detail', 'niklde' => 'ldedisp', 'niknonlde' => 'nonldedisp'
        ]);

        DB::table('academy')->insert([
            'flag' => 2018,
        	'name' => 'WINS', 'table' => 'wins', 'table_detail' => 'wins_detail', 'niklde' => 'ldewins', 'niknonlde' => 'nonldewins'
        ]);

        DB::table('academy')->insert([
            'flag' => 2018,
        	'name' => 'Mobile', 'table' => 'mobile', 'table_detail' => 'mobile_detail', 'niklde' => 'ldemobile', 'niknonlde' => 'nonldemobile'
        ]);
        DB::table('academy')->insert([
            'flag' => 2018,
        	'name' => 'Enterprise', 'table' => 'enterprise', 'table_detail' => 'enterprise_detail', 'niklde' => 'ldeenterprise', 'niknonlde' => 'nonldeenterprise'
        ]);

        DB::table('academy')->insert([
            'flag' => 2018,
        	'name' => 'Business Enabler', 'table' => 'business_enabler', 'table_detail' => 'business_enabler_detail', 'niklde' => 'ldebusinessenabler', 'niknonlde' => 'nonldebusinessenabler'
        ]);

        DB::table('academy')->insert([
            'flag' => 2018,
        	'name' => 'Leadership', 'table' => 'leadership', 'table_detail' => 'leadership_detail', 'niklde' => 'ldeleadership', 'niknonlde' => 'nonldeleadership'
        ]);


    }
}
