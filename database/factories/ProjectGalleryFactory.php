<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectGallery>
 */
class ProjectGalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'projec_id' => \App\Models\Project::all()->random()->id,
            'type'      => fake()->randomElement(['slider', 'gallery', 'video']),
            'url'       => 'uploads/project/p1.jpg',
        ];
    }
}