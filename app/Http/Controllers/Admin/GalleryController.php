<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::with('image')->latest()->paginate(20);
        return view('admin.gallery.index', compact('galleries'));
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
            'name'   => ['nullable', 'min:2', 'max:255'],
            'status' => 'nullable',
            'image'  => ['required', 'image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
        ]);

        // dd($request->all());
        try {
            $url     = ImageUplaoder::upload($request->file('image'), 'uploads/gallery/', 900, 600);
            $gallery = Gallery::create([
                'name'   => $request->name,
                'status' => $request->status ? true : false,
            ]);
            $gallery->image()->create([
                'url' => $url,
            ]);
            return redirect()->route('admin.gallery.index')->withSuccess('Gallery Item Added SuccessFully');

        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.gallery.index')->withError($e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($galleryId)
    {
        $gallery = Gallery::with('image')->findOrFail($galleryId);
        return response()->json([
            'data'   => $gallery,
            'status' => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $galleryId)
    {

        $request->validate([
            'name'   => ['nullable', 'min:2', 'max:255'],
            'status' => 'nullable',
            'image'  => ['image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
        ]);
        try {
            if ($request->hasFile('image'))
            {
                $gallery = Gallery::findOrFail($galleryId);
                $url     = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/gallery/', 900, 600);
                $gallery->update([
                    'name'   => $request->name,
                    'status' => $request->status ? true : false,

                ]);
                $gallery->image()->update([
                    'url' => $url,
                ]);
            }
            else
            {

                $gallery = Gallery::findOrFail($galleryId)->update([
                    'name' => $request->name,
                ]);

            }

            return redirect()->route('admin.gallery.index')->withSuccess('Gallery Item Updated SuccessFully');

        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.gallery.index')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($galleryId)
    {
        try {
            $gallery = Gallery::with('image')->findOrFail($galleryId);
            ImageUplaoder::delete($gallery->image->url);
            $gallery->delete();
            return redirect()->route('admin.gallery.index')->withSuccess('Gallery Item Deleted SuccessFully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.gallery.index')->withError($e->getMessage());
        }

    }
}