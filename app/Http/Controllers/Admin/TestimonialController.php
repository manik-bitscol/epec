<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::with('image')->latest()->get();
        // dd($testimonials);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required', 'string', 'min:2', 'max:255'],
            'profession'  => ['required', 'string', 'min:2', 'max:255'],
            'image'       => ['required', 'image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
            'testimonial' => ['required', 'string', 'min:2', 'max:255'],
        ]);
        try {
            $url         = ImageUplaoder::upload($request->file('image'), 'uploads/testimonial/', 150, 150);
            $testimonial = Testimonial::create($request->all());
            $testimonial->image()->create([
                'url' => $url,
            ]);
            return redirect()->route('admin.testimonial.index')->withSuccess('Testimonial Added SuccessFully');

        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.testimonial.index')->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($testimonialId)
    {
        $testimonial = Testimonial::with('image')->findOrFail($testimonialId);
        return response()->json([
            'testimonial' => $testimonial,
            'status'      => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $testimonialId)
    {

        $request->validate([
            'name'        => ['required', 'string', 'min:2', 'max:255'],
            'profession'  => ['required', 'string', 'min:2', 'max:255'],
            'image'       => ['image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
            'testimonial' => ['required', 'string', 'min:2'],
        ]);
        try {
            $testimonial = Testimonial::findOrfail($testimonialId);

            if ($request->hasFile('image'))
            {

                $url = ImageUplaoder::update($request->old_image, file('image'), 'uploads/testimonial/', 150, 150);

                $testimonial->image()->update([
                    'url' => $url,
                ]);

            }
            $testimonial->update([
                'name'        => $request->name,
                'profession'  => $request->profession,
                'testimonial' => $request->testimonial,
            ]);

            return redirect()->route('admin.testimonial.index')->withSuccess('Testimonial Updated SuccessFully');

        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.testimonial.index')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($testimonialId)
    {
        try {
            $testimonial = Testimonial::with('image')->findOrFail($testimonialId);
            ImageUplaoder::delete($testimonial->image->url);
            $testimonial->delete();
            return redirect()->route('admin.testimonial.index')->withSuccess('Testimonial Item Deleted SuccessFully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.testimonial.index')->withError($e->getMessage());
        }
    }
}