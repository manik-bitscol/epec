<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\SisterConcern;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SisterConcernController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sister-concern.index', ['sisterConcerns' => SisterConcern::with('image')->latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sister-concern.create');
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
            'title'       => 'required | string | min:2 | max: 50',
            'address'     => 'required | string | min:2 | max: 150',
            'phone'       => 'required | string | min:2 | max: 150',
            'email'       => 'required | string | min:2 | max: 150',
            'facebook'    => 'required | string | min:2 | max: 150',
            'twitter'     => 'required | string | min:2 | max: 150',
            'whatsapp'    => 'required | string | min:2 | max: 150',
            'instagram'   => 'required | string | min:2 | max: 150',
            'description' => 'required | string | min:2',
            'image'       => ['required', 'image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
            'banner'      => ['required', 'image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
        ]);
        try {
            if ($request->hasFile('image') && $request->hasFile('banner'))
            {
                $url    = ImageUplaoder::upload($request->file('image'), 'uploads/sister-concern/', 1200, 700);
                $banner = ImageUplaoder::upload($request->file('banner'), 'uploads/sister-concern/', 1200, 800);
            }

            $request['slug']      = Str::slug($request->title, '-');
            $request['is_active'] = $request->is_active == 'on' ? true : false;
            $request['banner']    = $banner;

            $sisterConcern = SisterConcern::create([
                'title'       => $request->title,
                'slug'        => Str::slug($request->title, '-'),
                'is_active'   => $request->is_active == 'on' ? true : false,
                'address'     => $request->address,
                'phone'       => $request->phone,
                'email'       => $request->email,
                'facebook'    => $request->facebook,
                'twitter'     => $request->twitter,
                'whatsapp'    => $request->whatsapp,
                'instagram'   => $request->instagram,
                'description' => $request->description,
                'banner'      => $banner,
            ]);
            $sisterConcern->image()->create([
                'url' => $url,
            ]);
            return redirect()->route('admin.concern.index')->withSuccess('Sister Concern Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.concern.create')->withSuccess($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SisterConcern  $sisterConcern
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('frontend.sister-concern', ['sisterConcern' => SisterConcern::with('image')->where('slug', '=', $slug)->where('is_active', '=', 1)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SisterConcern  $sisterConcern
     * @return \Illuminate\Http\Response
     */
    public function edit($sisterConcernId)
    {
        return view('admin.sister-concern.edit', ['sisterConcern' => SisterConcern::findOrFail($sisterConcernId)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SisterConcern  $sisterConcern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sisterConcernId)
    {
        $request->validate([
            'title'       => 'required | string | min:2 | max: 50',
            'address'     => 'required | string | min:2 | max: 50',
            'phone'       => 'required | string | min:2 | max: 50',
            'email'       => 'required | string | min:2 | max: 50',
            'facebook'    => 'required | string | min:2 | max: 50',
            'twitter'     => 'required | string | min:2 | max: 50',
            'whatsapp'    => 'required | string | min:2 | max: 50',
            'instagram'   => 'required | string | min:2 | max: 50',
            'description' => 'required | string | min:2',
            'image'       => ['image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
            'banner'      => ['image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
        ]);

        try {
            $sisterConcern = SisterConcern::with('image')->findOrFail($sisterConcernId);
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::upload($request->file('image'), 'uploads/sister-concern/', 1200, 700);
            }
            else
            {

                $url = $sisterConcern->image->url;
            }
            if ($request->hasFile('banner'))
            {

                $banner = ImageUplaoder::upload($request->file('banner'), 'uploads/sister-concern/', 1200, 800);
            }
            else
            {
                $banner = $sisterConcern->banner;
            }

            $request['slug']      = Str::slug($request->title, '-');
            $request['is_active'] = $request->is_active == 'on' ? true : false;
            $request['banner']    = $banner;

            $sisterConcern->update([
                'title'       => $request->title,
                'slug'        => Str::slug($request->title, '-'),
                'is_active'   => $request->is_active == 'on' ? true : false,
                'address'     => $request->address,
                'phone'       => $request->phone,
                'email'       => $request->email,
                'facebook'    => $request->facebook,
                'twitter'     => $request->twitter,
                'whatsapp'    => $request->whatsapp,
                'instagram'   => $request->instagram,
                'description' => $request->description,
                'banner'      => $banner,
            ]);
            $sisterConcern->image()->update([
                'url' => $url,
            ]);
            return redirect()->route('admin.concern.index')->withSuccess('Sister Concern Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SisterConcern  $sisterConcern
     * @return \Illuminate\Http\Response
     */
    public function destroy($sisterConcernId)
    {
        try {
            $sisterConcern = SisterConcern::with('image')->findOrfail($sisterConcernId);
            ImageUplaoder::delete($sisterConcern->image->url);
            ImageUplaoder::delete($sisterConcern->banner);
            $sisterConcern->delete();
            return redirect()->route('admin.concern.index')->withSuccess('Sister Concern Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.concern.index')->withError($e->getMessage());
        }
    }
}