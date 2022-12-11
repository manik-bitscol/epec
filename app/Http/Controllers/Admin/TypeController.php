<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.type.index', ['types' => Type::all()]);
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
        // dd($request->all());
        try {
            Type::create($request->all());
            return redirect()->back()->withSuccess('New Project Type Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.type.index')->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phase  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Phase $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phase  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($typeId)
    {
        try {
            $type = Type::findOrfail($typeId);
            return response()->json([
                'type'   => $type,
                'status' => 'success',
            ]);
        }
        catch (\Exception$e)
        {
            return response()->json([
                'type'   => '',
                'status' => 'failed',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phase  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $typeId)
    {
        $request->validate([
            'name' => 'required | string | min:2',
        ]);

        try {
            Type::findOrFail($typeId)->update($request->all());
            return redirect()->route('admin.type.index')->withSuccess('Project Type Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.type.index')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phase  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($typeId)
    {
        try {
            Type::findOrFail($typeId)->delete();
            return redirect()->route('admin.type.index')->withSuccess('Project Type Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.type.index')->withError($e->getMessage());
        }
    }
}