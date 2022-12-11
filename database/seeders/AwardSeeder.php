<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Award::create([
            'title' => 'Certified Development Company Award',
            'image' => '/uploads/award/iso-logo.png',
        ]);
        \App\Models\Award::create([
            'title' => 'Certified Development Company Award',
            'image' => '/uploads/award/logo-2.png',
        ]);
        \App\Models\Award::create([
            'title' => 'Certified Development Company Award',
            'image' => '/uploads/award/iso-logo.png',
        ]);
        \App\Models\Award::create([
            'title' => 'Certified Development Company Award',
            'image' => '/uploads/award/logo-2.png',
        ]);
        \App\Models\Award::create([
            'title' => 'Certified Development Company Award',
            'image' => '/uploads/award/iso-logo.png',
        ]);
        \App\Models\Award::create([
            'title' => 'Certified Development Company Award',
            'image' => '/uploads/award/logo-2.png',
        ]);
    }
}