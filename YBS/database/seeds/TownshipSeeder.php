<?php

use Illuminate\Database\Seeder;

class TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('Township')->insert([
            'name' => 'Ahlon',
            'lat' => 16.7844129,
            'lag' => 96.1178227,
        ]);

        DB::table('Township')->insert([
            'name' => 'Bahan',
            'lat' => 16.8110538,
            'lag' => 96.1398258,
        ]);

        DB::table('Township')->insert([
            'name' => 'Dagon',
            'lat' => 16.8396098,
            'lag' => 95.901376,
        ]);

        DB::table('Township')->insert([
            'name' => 'Hlaing',
            'lat' => 16.8457702,
            'lag' => 96.1025027,
        ]);

        DB::table('Township')->insert([
            'name' => 'Kamayut',
            'lat' => 16.8233853,
            'lag' => 96.1121763,
        ]);
    }
}
