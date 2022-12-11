<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Project;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::count();
        $teams    = Team::count();
        $messages = Message::count();
        $users = User::count();
        $admins   = User::where('id', '!=', Auth::id())->get();

        return view('admin.dashboard.index', compact('projects', 'teams', 'messages', 'admins','users'));
    }

    public function create()
    {
        return view('admin.dashboard.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'image'    => ['required', 'image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
            'phone'    => ['required', 'string', 'max:255'],
        ]);

        try {
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::upload($request->file('image'), 'uploads/user/', 300, 300);
            }
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone,
                'password' => Hash::make($request->password),
            ]);
            $user->image()->create([
                'url' => $url,
            ]);
            // dd($user);
            return redirect()->route('admin.dashboard')->withSuccess('New Admin Added Successfully');
        }
        catch (\Exception $e)
        {
            return redirect()->route('admin.dashboard')->withError('New Admin Add Fail');
        }
    }
    public function edit()
    {
        return view('admin.dashboard.edit', ['admin' => User::with('image')->findOrfail(Auth::id())]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
            'phone' => ['required', 'string', 'max:255'],
        ]);

        try {
            $user = User::with('image')->findOrFail(Auth::id());
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/user/', 300, 300);
                $user->image()->update([
                    'url' => $url,
                ]);
            }
            $user->update([
                'name'  => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

            return redirect()->route('admin.dashboard')->withSuccess('Admin Info Updated Successfully');
        }
        catch (\Throwable$th)
        {
            return redirect()->route('admin.dashboard')->withSuccess('Admin Info Update Fail');
        }
    }
    public function show()
    {
        return view('admin.dashboard.show', ['profile' => User::with('image')->findOrfail(Auth::id())]);
    }
    public function changePassword()
    {
        return view('admin.dashboard.edit-password');
    }
    public function updatePassword(Request $request)
    {
        $userPassword    = Auth::user()->password;
        $oldPassword     = $request->old_password;
        $newPassword     = $request->new_password;
        $confirmPassword = $request->confirm_password;
        $request->validate([
            'old_password'     => 'required | min:8',
            'new_password'     => 'required | min:8',
            'confirm_password' => 'required | min:8',
        ]);
        try {
            if (Hash::check($oldPassword, $userPassword))
            {
                if ($newPassword === $confirmPassword)
                {
                    User::findOrFail(Auth::id())->update([
                        'password' => Hash::make($newPassword),
                    ]);
                    return redirect()->route('admin.dashboard')->withSuccess('Your Password Updated Successfully');
                }
                else
                {
                    return redirect()->back()->withError('New Password And Confirm Password Does Not Match');
                }
            }
            else
            {
                return redirect()->back()->withError('Old Password Does Not Match');
            }
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}