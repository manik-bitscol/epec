<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\ProjectGallery;

class GalleryController extends Controller
{
    public function index()
    {
        $videos    = ProjectGallery::where('type', '=', 'video')->paginate(18);
        $images    = ProjectGallery::where('type', '=', 'gallery')->paginate(20);
        $galleries = Gallery::with('image')->where('status', '=', true)->latest()->get();
        return view('frontend.gallery', compact('galleries', 'images', 'videos'));

    }
}