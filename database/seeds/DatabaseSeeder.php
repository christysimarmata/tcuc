<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TempSeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(DispSeeder::class);
        $this->call(EnterpriseSeeder::class);
        $this->call(LeadershipSeeder::class);
        $this->call(MobileSeeder::class);
        $this->call(NitsSeeder::class);
        $this->call(ConsumerSeeder::class);
        $this->call(WinsSeeder::class);
        $this->call(JobFamilySeeder::class);
        $this->call(MainProgramSeeder::class);
        $this->call(InfoSeeder::class);
        $this->call(UserFixSeeder::class);
        $this->call(CertificateTempSeeder::class);
        $this->call(BusinessDetailSeeder::class);
        $this->call(DispDetailSeeder::class);
        $this->call(EnterpriseDetailSeeder::class);
        $this->call(LeadershipDetailSeeder::class);
        $this->call(MobileDetailSeeder::class);
        $this->call(NitsDetailSeeder::class);
        $this->call(ConsumerDetailSeeder::class);
        $this->call(WinsDetailSeeder::class);
        $this->call(CertificateTempDetailSeeder::class);
        $this->call(HelpTableSeeder::class);
    }
}
