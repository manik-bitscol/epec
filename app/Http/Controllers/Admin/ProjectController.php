<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use App\Models\Phase;
use App\Models\Project;
use App\Models\ProjectGallery;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $locations  = Location::all();
        $types      = Type::all();
        $phases     = Phase::all();
        return view('admin.project.create', compact('categories', 'locations', 'types', 'phases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'category_id'         => 'required',
            'location_id'         => 'required',
            'phase_id'            => 'required',
            'type_id'             => 'required',
            'title'               => 'required | string | min:2 ',
            'banner'              => 'image | required | mimes:jpg,png,jpeg ,jfif,svg,webp,pjp',
            'address'             => 'nullable | string | min:2 ',
            'duration'            => 'nullable | string | min:2 ',
            'start_time'          => 'nullable | string | min:2 ',
            'complete_time'       => 'nullable | string | min:2 ',
            'building_size'       => 'nullable | string | min:2 ',
            'construction_status' => 'nullable | string | min:2 ',
            'location_map'        => 'nullable | string | min:2 ',
            'slider_item'         => 'required',
            'gallery_item'        => 'required',
            'videos'              => 'nullable',
            'details'             => 'required | string | min:2 ',
        ]);

        try {
            if ($request->hasFile('banner'))
            {
                $url = ImageUplaoder::upload($request->file('banner'), 'uploads/project/', 900, 600);
            }
            // dd($request->phase_id);
            $project = Project::create([
                'category_id'         => $request->category_id,
                'location_id'         => $request->location_id,
                'phase_id'            => $request->phase_id,
                'type_id'             => $request->type_id,
                'title'               => $request->title,
                'banner'              => $url,
                'address'             => $request->address,
                'duration'            => $request->duration,
                'start_time'          => $request->start_time,
                'complete_time'       => $request->complete_time,
                'building_size'       => $request->building_size,
                'construction_status' => $request->construction_status,
                'location_map'        => $request->location_map,
                'details'             => $request->details,
            ]);

            $project->image()->create(['url' => $url]);
            if ($request->hasFile('slider_item'))
            {
                $sliderImages = $request->file('slider_item');
                foreach ($sliderImages as $sliderImage)
                {
                    $sliderUrl = ImageUplaoder::upload($sliderImage, 'uploads/project-gallery/', 900, 600);
                    ProjectGallery::create([
                        'project_id' => $project->id,
                        'type'       => 'slider',
                        'url'        => $sliderUrl,
                    ]);
                }

            }
            if ($request->hasFile('gallery_item'))
            {
                $galleryImages = $request->file('gallery_item');
                foreach ($galleryImages as $galleryImage)
                {
                    $galleryUrl = ImageUplaoder::upload($galleryImage, 'uploads/project-gallery/', 900, 600);
                    ProjectGallery::create([
                        'project_id' => $project->id,
                        'type'       => 'gallery',
                        'url'        => $galleryUrl,
                    ]);
                }

            }
            if ($request->videos[0] !== null)
            {
                $videos = $request->videos;
                foreach ($videos as $video)
                {

                    ProjectGallery::create([
                        'project_id' => $project->id,
                        'type'       => 'video',
                        'url'        => $video,
                    ]);
                }
            }
            return redirect()->route('admin.project.index')->withSuccess('New Project Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($projectId)
    {
        $project    = Project::findOrfail($projectId);
        $categories = Category::all();
        $locations  = Location::all();
        $types      = Type::all();
        $phases     = Phase::all();
        return view('admin.project.edit', compact('project', 'categories', 'locations', 'types', 'phases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $projectId)
    {
        $request->validate([
            'category_id'         => 'required',
            'location_id'         => 'required',
            'phase_id'            => 'required',
            'type_id'             => 'required',
            'title'               => 'required | string | min:2 ',
            'address'             => 'nullable | string | min:2 ',
            'duration'            => 'nullable | string | min:2 ',
            'start_time'          => 'nullable | string | min:2 ',
            'complete_time'       => 'nullable | string | min:2 ',
            'building_size'       => 'nullable | string | min:2 ',
            'construction_status' => 'nullable | string | min:2 ',
            'location_map'        => 'nullable | string | min:2 ',
            'details'             => 'required | string | min:2 ',
        ]);
        try {

            $project = Project::findOrfail($projectId)->update([
                'category_id'         => $request->category_id,
                'location_id'         => $request->location_id,
                'phase_id'            => $request->phase_id,
                'type_id'             => $request->type_id,
                'title'               => $request->title,
                'address'             => $request->address,
                'duration'            => $request->duration,
                'start_time'          => $request->start_time,
                'complete_time'       => $request->complete_time,
                'building_size'       => $request->building_size,
                'construction_status' => $request->construction_status,
                'location_map'        => $request->location_map,
                'details'             => $request->details,
            ]);

            return redirect()->route('admin.project.index')->withSuccess('Project Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     * Edit Project Images
     */
    public function editGallery($projectId)
    {
        $project   = Project::findOrFail($projectId);
        $sliders   = ProjectGallery::where('project_id', $projectId)->where('type', '=', 'slider')->get();
        $galleries = ProjectGallery::where('project_id', $projectId)->where('type', '=', 'gallery')->get();
        $videos    = ProjectGallery::where('project_id', $projectId)->where('type', '=', 'video')->get();
        // dd($sliders);

        return view('admin.project.edit-gallery', compact('project', 'sliders', 'galleries', 'videos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     * Update Project Banner
     */
    public function updateBanner(Request $request, $projectId)
    {
        $request->validate([
            'banner' => 'image | required | mimes:jpg,png,jpeg ,jfif,svg,webp,pjp',
        ]);
        try {
            if ($request->hasFile('banner'))
            {
                $url = ImageUplaoder::update($request->old_image, $request->banner, 'uploads/project-gallery/', 900, 400);
                Project::findOrFail($projectId)->update([
                    'banner' => $url,
                ]);
                return redirect()->route('admin.project.index')->withSuccess('Project Banner Updated Successfully');
            }
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.project.index')->withError($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     * Add Image To Project Slider
     */
    public function AddSlider(Request $request, $projectId)
    {
        $request->validate([
            'slider_item' => 'required ',
        ]);
        try {
            if ($request->hasFile('slider_item'))
            {
                $sliderImages = $request->file('slider_item');
                foreach ($sliderImages as $sliderImage)
                {
                    $sliderUrl = ImageUplaoder::upload($sliderImage, 'uploads/project-gallery/', 900, 600);
                    ProjectGallery::create([
                        'project_id' => $projectId,
                        'type'       => 'slider',
                        'url'        => $sliderUrl,
                    ]);
                }
                return redirect()->route('admin.project.index')->withSuccess("New Slider Added To Project");

            }
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.project.index')->withError($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     * Add Image To Project Gallery
     */
    public function AddGallery(Request $request, $projectId)
    {
        $request->validate([
            'gallery_item' => 'required ',
        ]);
        try {
            if ($request->hasFile('gallery_item'))
            {
                $galleryImages = $request->file('gallery_item');
                foreach ($galleryImages as $galleryImage)
                {
                    $galleryUrl = ImageUplaoder::upload($galleryImage, 'uploads/project-gallery/', 900, 600);
                    ProjectGallery::create([
                        'project_id' => $projectId,
                        'type'       => 'gallery',
                        'url'        => $galleryUrl,
                    ]);
                }
                return redirect()->route('admin.project.index')->withSuccess("New Gallery Image Added To Project");

            }

        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.project.index')->withError($e->getMessage());
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     * Add Video To Project Gallery
     */
    public function AddVideo(Request $request, $projectId)
    {
        $request->validate([
            'videos' => 'required ',
        ]);
        try {

            $videos = $request->videos;
            foreach ($videos as $video)
            {

                ProjectGallery::create([
                    'project_id' => $projectId,
                    'type'       => 'video',
                    'url'        => $video,
                ]);
            }
            return redirect()->route('admin.project.index')->withSuccess("New Video  Added To Project Gallery");

        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.project.index')->withError($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($projectId)
    {
        $project  = Project::findOrFail($projectId);
        $galleres = ProjectGallery::where('project_id', $projectId)->get();

        try {
            foreach ($galleres as $gallery)
            {

                if (file_exists($gallery->url))
                {
                    unlink($gallery->url);
                }
                $gallery->delete();
            }
            if (file_exists($project->banner))
            {
                unlink($project->banner);
            }
            $project->delete();
            return redirect()->route('admin.project.index')->withSuccess('Project Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.project.index')->withError($e->getMessage());
        }
    }/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function deleteGalleryItem($galleryId)
    {
        $gallery = ProjectGallery::findOrFail($galleryId);

        try {

            if (file_exists($gallery->url))
            {
                unlink($gallery->url);
            }
            $gallery->delete();
            return redirect()->back()->withSuccess('Gallery Item Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}