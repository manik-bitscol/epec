<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.location.index', ['locations' => Location::all()]);
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
            'name' => 'required | string | min:2',
        ]);

        try {
            Location::create($request->all());
            return redirect()->back()->withSuccess('New Location Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.location.index')->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($locationId)
    {
        try {
            $location = Location::findOrfail($locationId);
            return response()->json([
                'location' => $location,
                'status'   => 'success',
            ]);
        }
        catch (\Exception$e)
        {
            return response()->json([
                'location' => '',
                'status'   => 'failed',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locationId)
    {
        $request->validate([
            'name' => 'required | string | min:2',
        ]);

        try {
            Location::findOrFail($locationId)->update($request->all());
            return redirect()->route('admin.location.index')->withSuccess('Location Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.location.index')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($locationId)
    {
        try {
            Location::findOrFail($locationId)->delete();
            return redirect()->route('admin.location.index')->withSuccess('Location Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.location.index')->withError($e->getMessage());
        }
    }
}