<?php

namespace App\Http\Controllers\Frontend;

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
    public function index()
    {
        $projects   = Project::with('category', 'location', 'type', 'phase')->paginate(24);
        $categories = Category::all();
        $phases     = Phase::all();
        return view('frontend.projects', compact('projects', 'categories', 'phases'));
    }
    public function show($projectId)
    {
        $project          = Project::with('category', 'location', 'type', 'phase')->findOrFail($projectId);
        $similiarProjects = Project::where('type_id', '=', $project->type_id)->take(10)->get();
        $phases           = Phase::all();
        $categories       = Category::all();
        $sliders          = ProjectGallery::where('project_id', '=', $projectId)->where('type', '=', 'slider')->get();
        $galleries        = ProjectGallery::where('project_id', '=', $projectId)->where('type', '=', 'gallery')->get();
        $videos           = ProjectGallery::where('project_id', '=', $projectId)->where('type', '=', 'video')->get();
        return view('frontend.project-detail', compact('project', 'sliders', 'galleries', 'videos', 'similiarProjects', 'phases', 'categories'));
    }
    public function showByCategory($categoryId)
    {
        $projects = Project::where('category_id', '=', $categoryId)->paginate(20);
        $meta     = Category::findOrFail($categoryId);
        return view('frontend.filter-projects', compact('projects', 'meta'));
    }
    public function showByLocation($locationId)
    {
        $projects = Project::where('location_id', '=', $locationId)->paginate(20);
        $meta     = Location::findOrFail($locationId);
        return view('frontend.filter-projects', compact('projects', 'meta'));
    }
    public function showByPhase($phaseId)
    {
        $projects = Project::where('phase_id', '=', $phaseId)->paginate(20);
        $meta     = Phase::findOrFail($phaseId);
        return view('frontend.filter-projects', compact('projects', 'meta'));
    }
    public function showByType($typeId)
    {
        $projects = Project::where('type_id', '=', $typeId)->paginate(20);
        $meta     = Type::findOrFail($typeId);
        return view('frontend.filter-projects', compact('projects', 'meta'));
    }
    public function search(Request $request)
    {
        $projects = Project::latest();
        if (!empty($request->category))
        {
            $projects = $projects->where('category_id', '=', $request->category);
        }
        if (!empty($request->phase))
        {
            $projects = $projects->where('phase_id', '=', $request->phase);
        }

        if (!empty($request->keyword))
        {
            $projects = $projects->where('title', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('address', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('duration', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('building_size', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('construction_status', 'LIKE', '%' . $request->keyword . '%')
                ->orWhere('details', 'LIKE', '%' . $request->keyword . '%');
        }
        if (!empty($request->location))
        {
            $projects = $projects->where('title', 'LIKE', '%' . $request->location . '%')
                ->orWhere('address', 'LIKE', '%' . $request->location . '%')
                ->orWhere('duration', 'LIKE', '%' . $request->location . '%')
                ->orWhere('building_size', 'LIKE', '%' . $request->location . '%')
                ->orWhere('construction_status', 'LIKE', '%' . $request->location . '%')
                ->orWhere('details', 'LIKE', '%' . $request->location . '%');
        }
        $projects = $projects->get();

        return view('frontend.search', compact('projects'));
    }

}