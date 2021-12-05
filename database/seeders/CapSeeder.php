<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // \App\Models\Cap::factory(10)->hasGoals(4)->create();
        \App\Models\Cap::factory(4)->hasUpdates(4)->create();


    }
}
