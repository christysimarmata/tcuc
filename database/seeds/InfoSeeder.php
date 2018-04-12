<?php

use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('info')->delete();

        DB::table('info')->insert(['address' => 'Jalan Gegerkalong Hilir no 47 Bandung, 40152' , 'phone_number' => '(+6222) 123-45678', 'email' => 'helpdesk.certification@telkom.co.id']);
    }
}
