<?php

use Illuminate\Database\Seeder;
use App\Help;

class HelpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('help')->delete();

        $a = Help::create(array(
			'academy' => 'NITS',
		 	'nik' => 'ldenits'
        ));

        $c = Help::create(array(
			'academy' => 'Consumer',
		 	'nik' => 'ldeconsumer'
        ));

        $d = Help::create(array(
			'academy' => 'DISP',
		 	'nik' => 'ldedisp'
        ));

        $e = Help::create(array(
			'academy' => 'WINS',
		 	'nik' => 'ldewins'
        ));

        $f = Help::create(array(
			'academy' => 'Mobile',
		 	'nik' => 'ldemobile'
        ));

        $g = Help::create(array(
			'academy' => 'Enterprise',
		 	'nik' => 'ldeenterprise'
        ));

        $b = Help::create(array(
			'academy' => 'Business Enabler',
		 	'nik' => 'ldebusiness'
        ));

      	$h = Help::create(array(
			'academy' => 'Leadership',
		 	'nik' => 'ldeleadership'
        ));

    }
}
