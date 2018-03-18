<?php

use Illuminate\Database\Seeder;
use App\Users;

class TempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        $sso = Users::create(array(
        	'nik' => 'sso123',
            'nama' => 'Nana Mirdad',
        	'password' => 'sso123',
        	'role' => 'sso',
            'email' => 'sso123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'senior operator',
            'ubpp' => '90%',
            'division' => 'Human development'

        ));

        $user = Users::create(array(
        	'nik' => 'user123',
            'nama' => 'Irwansyah',
        	'password' => 'user123',
        	'role' => 'user',
            'email' => 'user123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'User biasa',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $lde1 = Users::create(array(
        	'nik' => 'ldenits',
            'nama' => 'Dua Lipa',
        	'password' => 'lde123',
        	'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $lde2 = Users::create(array(
            'nik' => 'ldebusiness',
            'nama' => 'Zara Larson',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $lde3 = Users::create(array(
            'nik' => 'ldeconsumer',
            'nama' => 'Selena Gomez',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $lde4 = Users::create(array(
            'nik' => 'ldedisp',
            'nama' => 'Pink',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $lde5 = Users::create(array(
            'nik' => 'ldeenterprise',
            'nama' => 'Kelly Clarkson',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $lde6 = Users::create(array(
            'nik' => 'ldeleadership',
            'nama' => 'Lionel Messi',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $lde7 = Users::create(array(
            'nik' => 'ldemobile',
            'nama' => 'Kuroky',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $lde8 = Users::create(array(
            'nik' => 'ldewins',
            'nama' => 'Miracle',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $pnc = Users::create(array(
        	'nik' => 'pnc123',
            'nama' => 'Justin Bieber',
        	'password' => 'pnc123',
        	'role' => 'pnc',
            'email' => 'pnc123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Penanggung jawab',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $nonlde = Users::create(array(
        	'nik' => 'nonlde123',
            'nama'=> 'Selena Gomez',
        	'password' => 'nonlde123',
        	'role' => 'nonlde',
            'email' => 'nonlde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $user1 = Users::create(array(
            'nik' => 'user1',
            'nama'=> 'Ahmad Fajar',
            'password' => 'password',
            'role' => 'user',
            'email' => 'user1123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $user2 = Users::create(array(
            'nik' => 'user2',
            'nama'=> 'Ahmad Ridwan',
            'password' => 'password',
            'role' => 'sso',
            'email' => 'user22@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager',
            'ubpp' => '90%',
            'division' => 'development'
        ));

        $user3 = Users::create(array(
            'nik' => 'user3',
            'nama'=> 'Ridwan Fajar',
            'password' => 'password',
            'role' => 'user',
            'email' => 'qweqwe@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Teknis',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $user4 = Users::create(array(
            'nik' => 'user4',
            'nama'=> 'Bang Toyib',
            'password' => 'password',
            'role' => 'lde',
            'email' => 'asdasdqw@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Janitor',
            'ubpp' => '90%',
            'division' => 'Human Resource'
        ));

        $user5 = Users::create(array(
            'nik' => 'user5',
            'nama'=> 'Ahmad Simanullang',
            'password' => 'password',
            'role' => 'pnc',
            'email' => 'uadd1123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $user6 = Users::create(array(
            'nik' => 'user6',
            'nama'=> 'Ahmad Ramadhan',
            'password' => 'password',
            'role' => 'user',
            'email' => 'uqqq3@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $user7 = Users::create(array(
            'nik' => 'user7',
            'nama'=> 'Giot babe',
            'password' => 'password',
            'role' => 'nonlde',
            'email' => 'user1123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $user8 = Users::create(array(
            'nik' => 'user8',
            'nama'=> 'Fajar Bintang',
            'password' => 'password',
            'role' => 'sso',
            'email' => 'uss3@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $user9 = Users::create(array(
            'nik' => 'user9',
            'nama'=> 'Fajar Jaya',
            'password' => 'password',
            'role' => 'lde',
            'email' => 'uss3@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $user10 = Users::create(array(
            'nik' => 'user10',
            'nama'=> 'Fajar nugroho',
            'password' => 'password',
            'role' => 'user',
            'email' => 'uss3@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $user11 = Users::create(array(
            'nik' => 'user11',
            'nama'=> 'Febri Febrina',
            'password' => 'password',
            'role' => 'user',
            'email' => 'uss3@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));

        $user12 = Users::create(array(
            'nik' => 'user12',
            'nama'=> 'Jaka Tarub',
            'password' => 'password',
            'role' => 'sso',
            'email' => 'uss3@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'ubpp' => '90%',
            'division' => 'Human development'
        ));
    }
}
