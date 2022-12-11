<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SisterConcernSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SisterConcern::factory(3)->create();
    }
}