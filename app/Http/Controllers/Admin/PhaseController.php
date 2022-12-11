<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phase;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.phase.index', ['phases' => Phase::all()]);
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
        // dd($request->all());
        try {
            Phase::create($request->all());
            return redirect()->back()->withSuccess('New Phase Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.phase.index')->withError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function edit($phaseId)
    {
        try {
            $phase = Phase::findOrfail($phaseId);
            return response()->json([
                'phase'  => $phase,
                'status' => 'success',
            ]);
        }
        catch (\Exception$e)
        {
            return response()->json([
                'phase'  => '',
                'status' => 'failed',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $phaseId)
    {
        $request->validate([
            'name' => 'required | string | min:2',
        ]);

        try {
            Phase::findOrFail($phaseId)->update($request->all());
            return redirect()->route('admin.phase.index')->withSuccess('Phase Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.phase.index')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function destroy($phaseId)
    {
        try {
            Phase::findOrFail($phaseId)->delete();
            return redirect()->route('admin.phase.index')->withSuccess('Location Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.phase.index')->withError($e->getMessage());
        }
    }
}