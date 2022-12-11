<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Slider::factory(4)->create();
        \App\Models\Gallery::factory(6)->create();
        \App\Models\Service::factory(4)->create();

        \App\Models\User::factory()->create([
            'name'     => 'Manik Mia',
            'email'    => 'admin@gmail.com',
            'phone'    => '01959306576',
            'password' => bcrypt('12345678'),
        ]);
    }
}
