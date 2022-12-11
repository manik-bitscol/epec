<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.award.index', ['awards' => Award::latest()->get()]);
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
            'title' => 'required | string | min:2',
            'image' => 'required | image',
        ]);
        try {
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::upload($request->file('image'), 'uploads/award/', 300, 200);

            }
            Award::create([
                'title' => $request->title,
                'image' => $url,
            ]);

            return redirect()->route('admin.award.index')->withSuccess('New Award Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.award.index')->withError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function edit($awardId)
    {
        return response()->json([
            'award'  => Award::findOrFail($awardId),
            'status' => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $awardId)
    {
        $request->validate([
            'title'     => 'required | string | min:2',
            'image'     => 'image',
            'old_image' => 'string',
        ]);
        try {
            $award = Award::findOrFail($awardId);
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/award', 300, 200);
            }
            else
            {
                $url = $request->old_image;
            }
            $award->update([
                'title' => $request->title,
                'image' => $url,
            ]);
            return redirect()->route('admin.award.index')->withSuccess('Award Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function destroy($awardId)
    {
        try {
            $award = Award::findOrFail($awardId);
            ImageUplaoder::delete($award->image);
            $award->delete();
            return redirect()->route('admin.award.index')->withSuccess('Award Deleted Successfully');

        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
