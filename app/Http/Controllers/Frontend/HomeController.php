<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Category;
use App\Models\Client;
use App\Models\Phase;
use App\Models\Project;
use App\Models\Section;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\Setting;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $projects        = Project::with('category', 'phase', 'type', 'location')->latest()->paginate(8);
        $sliders         = Slider::with('image')->where('status', '=', true)->get();
        $services        = Service::latest()->get();
        $testimonials    = Testimonial::latest()->get();
        $teams           = Team::with('image')->where('role_id', '!=', 2)->take(8)->get();
        $categories      = Category::latest()->get();
        $phases          = Phase::latest()->get();
        $sections        = Section::all();
        $clients         = Client::all();
        $aboutSection    = AboutSection::findOrfail(1);
        $serviceSection  = $sections->where('section_name', '=', 'service')->first();
        $strengthSection = $sections->where('section_name', '=', 'strength')->first();
        $messageSection  = $sections->where('section_name', '=', 'message-from-md')->first();
        $locationMap     = Setting::where('option', '=', 'google-location')->first();
        return view('frontend.home', compact('sliders', 'services', 'testimonials', 'teams', 'projects', 'categories', 'aboutSection', 'serviceSection', 'strengthSection', 'messageSection', 'clients', 'phases','locationMap'));
    }
}