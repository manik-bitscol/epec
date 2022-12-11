<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'              => fake()->name(),
            'designation'       => "CEO",
            'role_id'           => rand(1, 3),
            'degreee'           => "BSc Engineer",
            'experience'        => "3 Years",
            'phone_number_1'    => fake()->phoneNumber(),
            'phone_owner_1'     => fake()->randomElement(['office', 'personal', 'mobile', 'others']),
            'phone_number_2'    => fake()->phoneNumber(),
            'phone_owner_2'     => fake()->randomElement(['office', 'personal', 'mobile', 'others']),
            'facebook_account'  => "https://www.facebook.com/dev.manik.mia/",
            'whatsapp_account'  => "https://www.facebook.com/dev.manik.mia/",
            'instagram_account' => "https://www.facebook.com/dev.manik.mia/",
            'linkedin_account'  => "https://www.facebook.com/dev.manik.mia/",
            'twitter_account'   => "https://www.facebook.com/dev.manik.mia/",
            'email_1'           => fake()->email(),
            'email_owner_1'     => fake()->randomElement(['personal', 'office']),
            'email_2'           => fake()->email(),
            'email_owner_2'     => fake()->randomElement(['personal', 'office']),
            'join_date'         => fake()->date(),
            'signature'         => "uploads/team/sign.jpg",
            'description'       => fake()->paragraph(4),
        ];
    }
}