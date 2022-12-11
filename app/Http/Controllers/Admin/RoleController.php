<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index', ['roles' => Role::all()]);
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
            'role' => 'required | string | min:2 | max:50',
        ]);
        try {
            Role::create($request->all());
            return redirect()->back()->withSuccess('Role Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($roleId)
    {
        try {
            $role = Role::findOrfail($roleId);
            return response()->json([
                'role'   => $role,
                'status' => 'success',
            ]);
        }
        catch (\Exception$e)
        {
            return response()->json([
                'role'   => '',
                'status' => 'failed',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $roleId)
    {
        $request->validate([
            'role' => 'required | string | min:2',
        ]);

        try {
            Role::findOrFail($roleId)->update($request->all());
            return redirect()->route('admin.role.index')->withSuccess('Role Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.role.index')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($roleId)
    {
        try {
            Role::findOrFail($roleId)->delete();
            return redirect()->route('admin.role.index')->withSuccess('Role Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.role.index')->withError($e->getMessage());
        }
    }
}