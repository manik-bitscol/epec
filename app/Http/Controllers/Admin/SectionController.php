<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $aboutSection = AboutSection::findOrFail(1);
        return view('admin.section.index', ['sections' => Section::all(), 'aboutSection' => $aboutSection]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($sectionId)
    {
        $section = Section::findOrfail($sectionId);
        return view('admin.section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sectionId)
    {

        $request->validate([
            'title'       => 'required | string',
            'sub_title'   => 'nullable',
            'image'       => 'nullable|file',
            'description' => 'nullable',
        ]);
        try {

            $section = Section::findOrFail($sectionId);
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::update($section->image, $request->file('image'), 'uploads/section/', 500, 500, );
            }
            else
            {
                $url = $section->image;
            }
            $section->update([
                'title'       => $request->title,
                'sub_title'   => $request?->sub_title,
                'image'       => $url,
                'description' => $request->description,
            ]);
            return redirect()->route('admin.section.index')->withSuccess('Section Updated Successfully');

        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.section.index')->withError($e->getMessage());
        }
    }
}