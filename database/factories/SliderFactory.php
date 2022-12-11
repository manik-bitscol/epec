<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'       => fake()->sentence(5),
            'sub_title'   => fake()->sentence(7),
            'description' => fake()->paragraph(3),
            'btn_text'    => "Read More",
            'btn_link'    => "/about",
            'status'      => true,
        ];
    }
}