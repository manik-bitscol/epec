<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AboutSection::create([
            'title'    => fake()->sentence(8),
            'image'    => 'uploads/section/about-section.jpg',
            'logo'     => 'uploads/section/logo.png',
            'about'    => fake()->paragraph(5),
            'mission'  => fake()->paragraph(5),
            'vission'  => fake()->paragraph(5),
            'value'    => fake()->paragraph(5),
            'btn_text' => 'Read More',
            'btn_link' => '/page/about-epec',
        ]);
    }
}