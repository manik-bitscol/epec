<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::with('image')->paginate(8);
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.team.create', ['roles' => Role::get()]);
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
            "role_id"           => 'required',
            "name"              => 'required | string | min:2 | max: 50',
            "designation"       => 'required | string | min:2 | max: 50',
            "degreee"           => 'required | string | min:2 | max: 50',
            "phone_number_1"    => 'required | string | min:2 | max: 50',
            "phone_owner_1"     => 'required | string | min:2 | max: 50',
            "phone_number_2"    => 'string | min:2 | max: 50',
            "phone_owner_2"     => 'required | string | min:2 | max: 50',
            "experience"        => 'required | string | min:2 | max: 50',
            "facebook_account"  => 'required | string | min:2 | max: 50',
            "whatsapp_account"  => 'required | string | min:2 | max: 50',
            "instagram_account" => 'required | string | min:2 | max: 50',
            "twitter_account"   => 'required | string | min:2 | max: 50',
            "linkedin_account"  => 'required | string | min:2 | max: 50',
            "email_1"           => 'required | email | min:2 | max: 50',
            "email_owner_1"     => 'required | string | min:2 | max: 50',
            "email_2"           => 'required | email | min:2 | max: 50',
            "email_owner_2"     => 'required | string | min:2 | max: 50',
            "description"       => 'required | string | min:5',
            "image"             => 'required | image | mimes:jpg,png,jpeg ,jfif,svg,webp,pjp',
            "signature"         => 'required | image | mimes:jpg,png,jpeg ,jfif,svg,webp,pjp',
        ]);

        try {
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::upload($request->file('image'), 'uploads/team/', 400, 400);
            }
            if ($request->hasFile('image'))
            {
                $signature            = ImageUplaoder::upload($request->file('signature'), 'uploads/team/', 400, 100);
                $request['signature'] = $signature;
            }
            $team = Team::create($request->all());
            $team->image()->create([
                'url' => $url,
            ]);
            return redirect()->route('admin.team.index')->withSuccess('New Team Member Added Seccessfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($teamId)
    {
        $team = Team::with('image')->findOrFail($teamId);
        return view('admin.team.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($teamId)
    {
        $team  = Team::with('image', 'role')->findOrFail($teamId);
        $roles = Role::get();
        return view('admin.team.edit', compact('team', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teamId)
    {
        // dd($request->file('image')->getClientOriginalExtension());
        $request->validate([
            "role_id"           => 'required',
            "name"              => 'required | string | min:2 | max: 50',
            "designation"       => 'required | string | min:2 | max: 50',
            "degreee"           => 'required | string | min:2 | max: 50',
            "phone_number_1"    => 'required | string | min:2 | max: 50',
            "phone_owner_1"     => 'required | string | min:2 | max: 50',
            "phone_number_2"    => 'string | min:2 | max: 50',
            "phone_owner_2"     => 'required | string | min:2 | max: 50',
            "experience"        => 'required | string | min:2 | max: 50',
            "facebook_account"  => 'required | string | min:2 | max: 50',
            "whatsapp_account"  => 'required | string | min:2 | max: 50',
            "instagram_account" => 'required | string | min:2 | max: 50',
            "twitter_account"   => 'required | string | min:2 | max: 50',
            "linkedin_account"  => 'required | string | min:2 | max: 50',
            "email_1"           => 'required | email | min:2 | max: 50',
            "email_owner_1"     => 'required | string | min:2 | max: 50',
            "email_2"           => 'required | email | min:2 | max: 50',
            "email_owner_2"     => 'required | string | min:2 | max: 50',
            "description"       => 'required | string | min:5',
            "image"             => 'image | mimes:jpg,png,jpeg ,jfif,svg,webp,pjp',
            "signature"         => 'image | mimes:jpg,png,jpeg ,jfif,svg,webp,pjp',
        ]);

        try {

            $team = Team::findOrFail($teamId);
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/team/', 400, 400);
            }
            else
            {
                $url = $request->old_image;
            }
            if ($request->hasFile('signature'))
            {
                $signature            = ImageUplaoder::update($request->old_signature, $request->file('signature'), 'uploads/team/', 400, 100);
                $request['signature'] = $signature;
            }
            else
            {
                $request['signature'] = $request->old_signature;
            }
            $team->update($request->all());
            $team->image()->update([
                'url' => $url,
            ]);
            return redirect()->route('admin.team.index')->withSuccess('Team Member Updated Seccessfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($teamId)
    {
        try {
            $team = Team::with('role', 'image')->findOrFail($teamId);
            ImageUplaoder::delete($team->image->url);
            ImageUplaoder::delete($team->signature);
            $team->delete();
            return redirect()->route('admin.team.index')->withSuccess('Team Member Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.team.index')->withError($e->getMessage());
        }
    }
}
