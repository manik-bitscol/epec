<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'url'            => 'uploads/gallery/g1.jpg',
            'imageable_id'   => 1,
            'imageable_type' => "App\Models\Gallery",
        ]);
        Image::create([
            'url'            => 'uploads/gallery/g2.jpg',
            'imageable_id'   => 2,
            'imageable_type' => "App\Models\Gallery",
        ]);
        Image::create([
            'url'            => 'uploads/gallery/g3.jpg',
            'imageable_id'   => 3,
            'imageable_type' => "App\Models\Gallery",
        ]);
        Image::create([
            'url'            => 'uploads/gallery/g4.jpg',
            'imageable_id'   => 4,
            'imageable_type' => "App\Models\Gallery",
        ]);
        Image::create([
            'url'            => 'uploads/gallery/g5.jpg',
            'imageable_id'   => 5,
            'imageable_type' => "App\Models\Gallery",
        ]);
        Image::create([
            'url'            => 'uploads/gallery/g6.jpg',
            'imageable_id'   => 6,
            'imageable_type' => "App\Models\Gallery",
        ]);
        Image::create([
            'url'            => 'uploads/gallery/g7.jpg',
            'imageable_id'   => 1,
            'imageable_type' => "App\Models\Slider",
        ]);
        Image::create([
            'url'            => 'uploads/gallery/g8.jpg',
            'imageable_id'   => 2,
            'imageable_type' => "App\Models\Slider",
        ]);
        Image::create([
            'url'            => 'uploads/gallery/g9.jpg',
            'imageable_id'   => 3,
            'imageable_type' => "App\Models\Slider",
        ]);
        Image::create([
            'url'            => 'uploads/gallery/g10.jpg',
            'imageable_id'   => 4,
            'imageable_type' => "App\Models\Slider",
        ]);

        Image::create([
            'url'            => 'uploads/testimonial/testimonial-1.jpg',
            'imageable_id'   => 1,
            'imageable_type' => "App\Models\Testimonial",
        ]);
        Image::create([
            'url'            => 'uploads/testimonial/testimonial-2.jpg',
            'imageable_id'   => 2,
            'imageable_type' => "App\Models\Testimonial",
        ]);
        Image::create([
            'url'            => 'uploads/testimonial/testimonial-3.jpg',
            'imageable_id'   => 3,
            'imageable_type' => "App\Models\Testimonial",
        ]);
        Image::create([
            'url'            => 'uploads/testimonial/testimonial-4.jpg',
            'imageable_id'   => 4,
            'imageable_type' => "App\Models\Testimonial",
        ]);

        Image::create([
            'url'            => 'uploads/team/team-1.jpg',
            'imageable_id'   => 1,
            'imageable_type' => "App\Models\Team",
        ]);
        Image::create([
            'url'            => 'uploads/team/team-2.jpg',
            'imageable_id'   => 2,
            'imageable_type' => "App\Models\Team",
        ]);
        Image::create([
            'url'            => 'uploads/team/team-3.jpg',
            'imageable_id'   => 3,
            'imageable_type' => "App\Models\Team",
        ]);
        Image::create([
            'url'            => 'uploads/team/team-4.jpg',
            'imageable_id'   => 4,
            'imageable_type' => "App\Models\Team",
        ]);
        Image::create([
            'url'            => 'uploads/team/team-5.jpg',
            'imageable_id'   => 5,
            'imageable_type' => "App\Models\Team",
        ]);
        Image::create([
            'url'            => 'uploads/team/team-6.jpg',
            'imageable_id'   => 6,
            'imageable_type' => "App\Models\Team",
        ]);
        Image::create([
            'url'            => 'uploads/team/team-7.jpg',
            'imageable_id'   => 7,
            'imageable_type' => "App\Models\Team",
        ]);
        Image::create([
            'url'            => 'uploads/team/team-8.jpg',
            'imageable_id'   => 8,
            'imageable_type' => "App\Models\Team",
        ]);
        Image::create([
            'url'            => 'uploads/team/team-9.jpg',
            'imageable_id'   => 9,
            'imageable_type' => "App\Models\Team",
        ]);
        Image::create([
            'url'            => 'uploads/team/team-10.jpg',
            'imageable_id'   => 10,
            'imageable_type' => "App\Models\Team",
        ]);
    }
}