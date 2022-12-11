<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SisterConcern>
 */
class SisterConcernFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'is_active'   => true,
            'title'       => fake()->word(4),
            'slug'        => fake()->word(),
            'banner'      => fake()->imageUrl(1200, 700),
            'address'     => fake()->address(),
            'phone'       => fake()->phoneNumber(),
            'email'       => fake()->email(),
            'facebook'    => fake()->sentence(1),
            'twitter'     => fake()->sentence(1),
            'whatsapp'    => fake()->sentence(1),
            'instagram'   => fake()->sentence(1),
            'description' => fake()->paragraph(10),
        ];
    }
}