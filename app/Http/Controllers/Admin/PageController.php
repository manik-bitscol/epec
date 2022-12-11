<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::with('image')->latest()->get();
        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
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
            'parent'    => 'nullable',
            'title'     => 'required | string | min:2 | max: 50',
            'sub_title' => 'nullable | string | max: 50',
            'image'     => ['required', 'image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
        ]);
        try {
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::upload($request->file('image'), 'uploads/page/', 1600, 400);
            }
            $request['slug']      = Str::slug($request->title, '-');
            $request['is_active'] = $request->is_active == 'on' ? true : false;
            $page                 = Page::create($request->all());
            $page->image()->create([
                'url' => $url,
            ]);

            return redirect()->route('admin.page.index')->withSuccess("Page Added Successfully");
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.page.create')->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('frontend.page', ['page' => Page::with('image')->where('slug', '=', $slug)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($pageId)
    {
        return view('admin.page.edit', ['page' => Page::with('image')->findOrfail($pageId)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pageId)
    {
        $request->validate([
            'parent'    => 'nullable',
            'title'     => 'required | string | min:2 | max: 50',
            'sub_title' => 'nullable | string | max: 50',
            'image'     => ['image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
        ]);
        try {
            $page = Page::findOrFail($pageId);
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/page/', 1600, 400);
                $page->image()->update([
                    'url' => $url,
                ]);
            }
            $request['slug']      = Str::slug($request->title, '-');
            $request['is_active'] = $request->is_active == 'on' ? true : false;
            $page->update($request->all());

            return redirect()->route('admin.page.index')->withSuccess("Page Added Successfully");
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($pageId)
    {
        try {
            $page = Page::with('image')->findOrFail($pageId);

            if ($page?->image?->url)
            {
                ImageUplaoder::delete($page->image->url);
            }
            $page->image()->delete();
            $page->delete();
            return redirect()->route('admin.page.index')->withSuccess('Page Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.page.index')->withError($e->getMessage());
        }
    }
}