<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::with('image')->latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->image == null && $request->gallery_image == null)
        {
            return redirect()->back()->withError('Please Choose Slider Image');
        }
        $request->validate([
            'title'         => ' required | string | min: 2',
            'sub_title'     => ' required | string | min: 2',
            'image'         => ['image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
            'gallery_image' => ' string | min: 2',
            'btn_text'      => ' required | string | min: 2',
            'btn_link'      => ' required | string | min: 2',
            'description'   => ' required | string | min: 10',
        ]);

        try {

            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::upload($request->file('image'), 'uploads/slider/', 1080, 500);
            }
            else
            {
                $url                   = $request->gallery_image;
                $request['image_type'] = 'gallery';
                // $request->merge(["image_type" => "gallery"]);
            }

            $slider = Slider::create($request->all());
            $slider->image()->create([
                'url' => $url,
            ]);
            return redirect()->route('admin.slider.index')->withSuccess('Slider Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.slider.index')->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($sliderId)
    {
        $slider = Slider::with('image')->findOrFail($sliderId);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sliderId)
    {

        // dd($request->all());
        $request->validate([
            'title'         => ' required | string | min: 2',
            'sub_title'     => ' required | string | min: 2',
            'image'         => ['image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
            'gallery_image' => ' nullable | string | min: 2',
            'btn_text'      => ' required | string | min: 2',
            'btn_link'      => ' required | string | min: 2',
            'description'   => ' required | string | min: 10',
        ]);
        try {
            // dd($request->all());
            // Checking Image Selected From Input
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/slider/', 1080, 500);
            }
            // Checking Image Selected From Gallery
            if ($request->gallery_image !== null)
            {
                $url                   = $request->gallery_image;
                $request['image_type'] = 'gallery';
            }
            // Checking Image Not  Selected
            if ($request->image == null && $request->gallery_image == null)
            {
                $url = $request->old_image;
            }

            $slider = Slider::findOrFail($sliderId);
            $slider->update($request->all());
            $slider->image()->update([
                'url' => $url,
            ]);
            return redirect()->route('admin.slider.index')->withSuccess('Slider Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.slider.index')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($sliderId)
    {
        try {
            $slider = Slider::with('image')->findOrFail($sliderId);
            if ($slider->image_type !== 'gallery')
            {
                ImageUplaoder::delete($slider->image->url);
            }
            $slider->delete();
            return redirect()->route('admin.slider.index')->withSuccess('Slider Item Deleted SuccessFully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.slider.index')->withError($e->getMessage());
        }
    }
}