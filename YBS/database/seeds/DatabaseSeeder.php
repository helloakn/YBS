<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //$this->call(TownshipSeeder::class);
        //$this->call(BusStopSeeder::class);
        $this->call(DataSeeder::class);
    }
}
