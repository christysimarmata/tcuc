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
    }
}
