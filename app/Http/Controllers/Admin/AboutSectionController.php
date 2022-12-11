<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function edit($sectionId)
    {
        return view('admin.section.about-edit', ['aboutSection' => AboutSection::findOrfail($sectionId)]);
    }
    public function update(Request $request, $sectionId)
    {

        $request->validate([
            'title'    => 'required',
            'image'    => 'nullable | file',
            'about'    => 'required',
            'mission'  => 'required',
            'vission'  => 'required',
            'value'    => 'required',
            'btn_text' => 'required',
            'btn_link' => 'required',
        ]);
        $aboutSection = AboutSection::findOrfail($sectionId);
        try {
            if ($request->hasFile('image'))
            {
                $imageUrl = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/section/', 800, 600);
            }
            else
            {
                $imageUrl = $aboutSection->image;
            }
            
            $aboutSection->update([
                'title'    => $request->title,
                'image'    => $imageUrl,
                'about'    => $request->about,
                'mission'  => $request->mission,
                'vission'  => $request->vission,
                'value'    => $request->value,
                'btn_text' => $request->btn_text,
                'btn_link' => $request->btn_link,
            ]);
            return redirect()->route('admin.section.index')->withSuccess("About Section Updated Successfully");
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}