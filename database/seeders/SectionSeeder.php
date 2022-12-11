<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Section::create([
            'section_name' => 'about',
            'title'        => "About EPEC",
            'sub_title'    => "Steel Buildings",
            'description'  => "Environmental Protection Engineering & Consultants Ltd, a contracting and construction management firm located at Road -13, Sector-10, Uttara, Dhaka, Bangladesh, was founded in 2004. We offer personalized, professional service in a cost-effective and timely approach without sacrificing quality. In today's competitive market, repeat customers make up 90% of our clientele, returning to us for their construction needs from renovations to  building. Our commitment to executive involvement and client satisfaction with a no-nonsense, focused approach is key to the success of our projects",
        ]);
        \App\Models\Section::create([
            'section_name' => 'service',
            'title'        => "Services & Solutions",
            'description'  => "Environmental Protection Engineering & Consultants Ltd, a contracting and construction management firm located at Road -13, Sector-10, Uttara, Dhaka, Bangladesh, was founded in 2004. We offer personalized, professional service in a cost-effective and timely approach without sacrificing quality. In today's competitive market, repeat customers make up 90% of our clientele, returning to us for their construction needs from renovations to  building. Our commitment to executive involvement and client satisfaction with a no-nonsense, focused approach is key to the success of our projects",
        ]);
        \App\Models\Section::create([
            'section_name' => 'strength',
            'title'        => "Why EPEC",
            'sub_title'    => "Strength of the Company",
            'image'        => '/uploads/section/section.jpg',
            'description'  => '<p class="mb-4 fa-2x">Strength of the Company</p>
            <p><i class="fa fa-check text-primary me-3"></i>Superior Quality &amp; Architecture</p>
            <p><i class="fa fa-check text-primary me-3"></i>Uncompromised Safety</p>
            <p><i class="fa fa-check text-primary me-3"></i>Best Construction Materials</p>
            <p><i class="fa fa-check text-primary me-3"></i>On-Time Delivery</p>',
        ]);
        \App\Models\Section::create([
            'section_name' => 'message-from-md',
            'title'        => "Message From",
            'sub_title'    => "Managing Director",
            'image'        => '/uploads/section/section2.jpg',
            'description'  => 'Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit diam justo sed vero dolor duo.',
        ]);

    }
}