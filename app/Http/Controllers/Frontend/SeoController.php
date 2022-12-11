<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SisterConcern;
use App\Models\Project;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function sitemap()
    {
        $pages=Page::latest()->pluck('slug');
        $concerns=SisterConcern::latest()->pluck('slug');
        $projects=Project::latest()->pluck('id');
        return response()->view('frontend.sitemap',compact('pages','concerns','projects'))->header('Content-Type', 'text/xml; charset=utf-8');
    }
}