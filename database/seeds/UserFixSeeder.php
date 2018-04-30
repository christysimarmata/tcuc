<?php

use Illuminate\Database\Seeder;
use App\UserFix;

class UserFixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_fix')->delete();

        $sso = UserFix::create(array(
            'nik' => 'sso123',
            'nama' => 'Nana Mirdad',
            'password' => 'sso123',
            'role' => 'sso',
            'email' => 'sso123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'senior operator',
            
            'division' => 'Human development'
            
            

        ));

        $lde1 = UserFix::create(array(
            'nik' => 'ldenits',
            'nama' => 'Dua Lipa',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            
            'division' => 'Human development'
        
      
        ));

        $lde2 = UserFix::create(array(
            'nik' => 'ldebusiness',
            'nama' => 'Zara Larson',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            
            'division' => 'Human development'
            
            
        ));

        $lde3 = UserFix::create(array(
            'nik' => 'ldeconsumer',
            'nama' => 'Selena Gomez',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            
            'division' => 'Human development'
            
            
        ));

        $lde4 = UserFix::create(array(
            'nik' => 'ldedisp',
            'nama' => 'Pink',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            
            'division' => 'Human development'
            
            
        ));

        $lde5 = UserFix::create(array(
            'nik' => 'ldeenterprise',
            'nama' => 'Kelly Clarkson',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            
            'division' => 'Human development'
            
         
        ));

        $lde6 = UserFix::create(array(
            'nik' => 'ldeleadership',
            'nama' => 'Lionel Messi',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            
            'division' => 'Human development'
            
            
        ));

        $lde7 = UserFix::create(array(
            'nik' => 'ldemobile',
            'nama' => 'Kuroky',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            
            'division' => 'Human development'
            
            
        ));

        $lde8 = UserFix::create(array(
            'nik' => 'ldewins',
            'nama' => 'Miracle',
            'password' => 'lde123',
            'role' => 'lde',
            'email' => 'lde123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Manager Trainee',
            
            'division' => 'Human development'
            
            
        ));

        $pnc = UserFix::create(array(
            'nik' => 'pnc123',
            'nama' => 'Justin Bieber',
            'password' => 'pnc123',
            'role' => 'pnc',
            'email' => 'pnc123@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Penanggung jawab',
            
            'division' => 'Human development'
            
            
        ));

        $nonlde1 = UserFix::create(array(
            'nik' => 'nonldenits',
            'nama'=> 'Selena Gomez',
            'password' => 'password',
            'role' => 'nonlde',
            'email' => 'nonldenits@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            
            'division' => 'Human development'
            
            
        ));

        $nonlde2 = UserFix::create(array(
            'nik' => 'nonldedisp',
            'nama'=> 'Blake Lively',
            'password' => 'password',
            'role' => 'nonlde',
            'email' => 'nonldedisp@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            
            'division' => 'Human development'
            
            
        ));

        $nonlde3 = UserFix::create(array(
            'nik' => 'nonldebusiness',
            'nama'=> 'Rama',
            'password' => 'password',
            'role' => 'nonlde',
            'email' => 'nonldebusiness@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            
            'division' => 'Human development'
            
            
        ));

        $nonlde4 = UserFix::create(array(
            'nik' => 'nonldeconsumer',
            'nama'=> 'Roulette',
            'password' => 'password',
            'role' => 'nonlde',
            'email' => 'nonldeconsumer@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            
            'division' => 'Human development'
            
           
        ));

        $nonlde5 = UserFix::create(array(
            'nik' => 'nonldeenterprise',
            'nama'=> 'Danny Sinaga',
            'password' => 'password',
            'role' => 'nonlde',
            'email' => 'nonldeenterprise@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            
            'division' => 'Human development'
            
            
        ));

        $nonlde6 = UserFix::create(array(
            'nik' => 'nonldeleadership',
            'nama'=> 'Erik Cantona',
            'password' => 'password',
            'role' => 'nonlde',
            'email' => 'nonldeleadership@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            
            'division' => 'Human development'
            
            
        ));

        $nonlde7 = UserFix::create(array(
            'nik' => 'nonldemobile',
            'nama'=> 'Selena Gomez',
            'password' => 'password',
            'role' => 'nonlde',
            'email' => 'nonldemobile@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'division' => 'Human development'
            
            
        ));

        $nonlde8 = UserFix::create(array(
            'nik' => 'nonldewins',
            'nama'=> 'Febri Febriyanti',
            'password' => 'password',
            'role' => 'nonlde',
            'email' => 'nonldewins@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            'division' => 'Human development'
            
            
        ));

        $user = UserFix::create(array(
            'nik' => '651225',
            'nama' => 'Lementina Manurung IR',
            'password' => 'password',
            'role' => 'user',
            'email' => 'lementina@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Staff Marketing',
            
            'division' => 'Business Development'
            
        ));

        $user1 = UserFix::create(array(
            'nik' => '591825',
            'nama' => 'Marthen Masak Dalipang',
            'password' => 'password',
            'role' => 'user',
            'email' => 'marthenmasak@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff Marketing',
            
            'division' => 'Business Development'
            
        ));

        $user2 = UserFix::create(array(
            'nik' => '670288',
            'nama' => 'Kurnia Waras Tjahjo',
            'password' => 'password',
            'role' => 'user',
            'email' => 'kurniawaras@gmail.com',
            'phone_number' => '082334546804',
            'job' => 'Staff Marketing',
            
            'division' => 'Business Development'
        ));

        $user3 = UserFix::create(array(
            'nik' => '633056',
            'nama' => 'M.Agustinus Sianturi',
            'password' => 'password',
            'role' => 'user',
            'email' => 'agustinussianturi@gmail.com',
            'phone_number' => '0823673468321',
            'job' => 'Staff Business',
            
            'division' => 'Business Development'
            
        ));

        $user3x = UserFix::create(array(
            'nik' => '633092',
            'nama' => 'Roy Sianturi',
            'password' => 'password',
            'role' => 'user',
            'email' => 'agustinussianturi@gmail.com',
            'phone_number' => '0823673468321',
            'job' => 'Staff Advertising',
            
            'division' => 'Business Program'
        ));

        $user4 = UserFix::create(array(
            'nik' => '622290',
            'nama' => 'M. Suhadi',
            'password' => 'password',
            'role' => 'user',
            'email' => 'suhadi@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff Business',
            
            'division' => 'Business Development'
            
        ));

        $user5 = UserFix::create(array(
            'nik' => '780026',
            'nama' => 'Kusumo Aji Sri Haryoto',
            'password' => 'password',
            'role' => 'user',
            'email' => 'kusumoaji@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff Marketing',
            
            'division' => 'Leadership Program'
            
        ));

        $user6 = UserFix::create(array(
            'nik' => '640188',
            'nama' => 'Madiyo',
            'password' => 'password',
            'role' => 'user',
            'email' => 'madiyo@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff Networking',
            
            'division' => 'Leadership Program'
            
        ));

        $user7 = UserFix::create(array(
            'nik' => '650456',
            'nama' => 'Kusna Mulyana',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff Networking',
            
            'division' => 'Leadership Program'
            
        ));

        $user8 = UserFix::create(array(
            'nik' => '690355',
            'nama' => 'Lukman Dinar',
            'password' => 'password',
            'role' => 'user',
            'email' => 'lukmandinar@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff Networking',
            
            'division' => 'Leadership Program'
            
        ));

        $user9 = UserFix::create(array(
            'nik' => '622355',
            'nama' => 'Made Arawan',
            'password' => 'password',
            'role' => 'user',
            'email' => 'madearawan@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Head Networking',
            
            'division' => 'Leadership Program'
            
        ));

        $user10 = UserFix::create(array(
            'nik' => '601362',
            'nama' => 'Laksono Pudji Prijanto',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff Networking',
            
            'division' => 'Leadership Program'
        ));

        $user11 = UserFix::create(array(
            'nik' => '640953',
            'nama' => 'Marwoto',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff Resourcing',
            
            'division' => 'Leadership Program'
            
        ));

        $user12 = UserFix::create(array(
            'nik' => '651093',
            'nama' => 'Listyo Dwi Haryono',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff Resourcing',
            
            'division' => 'Enterprise Service'
            
        ));

        $user13 = UserFix::create(array(
            'nik' => '660404',
            'nama' => 'M. Takdir IR',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Service Operator',
            
            'division' => 'Enterprise Service'
            
        ));

        $user14 = UserFix::create(array(
            'nik' => '720565',
            'nama' => 'Satria Kesuma Simbolon',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Service Operator',
            
            'division' => 'Enterprise Service'
            
        ));

        $user15 = UserFix::create(array(
            'nik' => '730561',
            'nama' => 'Latifah Hanum',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Service Operator',
            
            'division' => 'Enterprise Service'
            
        ));

        $user16 = UserFix::create(array(
            'nik' => '601626',
            'nama' => 'M.Najib',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Service Operator',
            
            'division' => 'Enterprise Service'
            
        ));


        $user17 = UserFix::create(array(
            'nik' => '890006',
            'nama' => 'Mariana',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff HRD',
            
            'division' => 'Human Resource'
            
        ));

        $user18 = UserFix::create(array(
            'nik' => '850111',
            'nama' => 'Lindah Imawati',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff HRD',
            
            'division' => 'Human Resource'
            
        ));

        $user19 = UserFix::create(array(
            'nik' => '820022',
            'nama' => 'Lely Diana',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff HRD',
            
            'division' => 'Human Resource'
        ));


        $user20 = UserFix::create(array(
            'nik' => '810073',
            'nama' => 'Lia Sovia Ekawati',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff HRD',
            
            'division' => 'Human Resource'
        ));


        $user21 = UserFix::create(array(
            'nik' => '800045',
            'nama' => 'Marlina',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff HRD',
            
            'division' => 'Human Resource'
        ));

        $user22 = UserFix::create(array(
            'nik' => '880007',
            'nama' => 'Lunel Candra',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'Staff HRD',
            
            'division' => 'Human Resource'
            
        ));

        $user23 = UserFix::create(array(
            'nik' => '631183',
            'nama' => 'Agus Gusriana',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'CCAN Fulfillment',
            
            'division' => 'Human Development'
            
            
        ));


        $user24 = UserFix::create(array(
            'nik' => '830012',
            'nama' => 'Asrul Salim',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'CCAN Fulfillment',
            
            'division' => 'Human Development'
            
            
        ));


        $user25 = UserFix::create(array(
            'nik' => '633329',
            'nama' => 'Dasep Priyadi',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'CCAN Fulfillment',
            
            'division' => 'Human Development'
            
            
        ));


        $user26 = UserFix::create(array(
            'nik' => '730245',
            'nama' => 'Dwi Agung Sulistyanta',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'CCAN Fulfillment',
            
            'division' => 'Human Development'
            
            
        ));


        $user27 = UserFix::create(array(
            'nik' => '650481',
            'nama' => 'Evi Mulyadi',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'CCAN Fulfillment',
            
            'division' => 'Human Development'
            
            
        ));


        $user28 = UserFix::create(array(
            'nik' => '610215',
            'nama' => 'I Putu Waliana Yasa',
            'password' => 'password',
            'role' => 'user',
            'email' => 'mulyanakusna@gmail.com',
            'phone_number' => '082367346804',
            'job' => 'CCAN Fulfillment',
            
            'division' => 'Human Development'
            
            
        ));


        $admin = UserFix::create(array(
            'nik' => 'admin123',
            'nama'=> 'Jaka Tarub',
            'password' => 'password',
            'role' => 'admin',
            'email' => 'uss3@gmail.com',
            'phone_number' => '082367368604',
            'job' => 'Non Manager',
            
            'division' => 'Human development'
            
            
        ));
    }
}
