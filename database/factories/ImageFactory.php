<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url'            => 'uploads/gallery/g1.jpg',
            'imageable_id'   => rand(1, 6),
            'imageable_type' => "App\Models\Gallery",
        ];
    }
}
