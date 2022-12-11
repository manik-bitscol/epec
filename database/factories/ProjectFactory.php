<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Location;
use App\Models\Phase;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id'         => Category::all()->random()->id,
            'location_id'         => Location::all()->random()->id,
            'phase_id'            => Phase::all()->random()->id,
            'type_id'             => rand(1, 3),
            'title'               => fake()->sentence(4),
            'banner'              => fake()->randomElement(['uploads/project/p1.jpg', 'uploads/project/p2.jpg', 'uploads/project/p3.jpg', 'uploads/project/p4.jpg', 'uploads/project/p5.jpg']),
            'address'             => fake()->address(),
            'duration'            => fake()->randomElement(['6 Mohths', '8 Mohths', '1 Year']),
            'start_time'          => fake()->date('d-M-Y'),
            'complete_time'       => fake()->date('d-M-Y'),
            'building_size'       => fake()->randomElement(['3800 SFT', '3200 SFT', '4200 SFT']),
            'construction_status' => fake()->randomElement(['Under Construction', 'Completed']),
            'location_map'        => 'https://goo.gl/maps/ZBKCFuL7SW2dRcgg9',
            'details'             => fake()->paragraph(10),
        ];
    }
}