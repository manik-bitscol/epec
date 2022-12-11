<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.service.index', ['services' => Service::latest()->get()]);
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
            'name'  => ['required', 'min:2', 'max:255', Rule::unique('services')],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
        ]);
        try {
            $url     = ImageUplaoder::upload($request->file('image'), 'uploads/service/', 100, 100);
            $gallery = Service::create([
                'name' => $request->name,
                'icon' => $url,
            ]);
            return redirect()->route('admin.service.index')->withSuccess('Service Item Added Successfully');

        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.service.index')->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return response()->json([
            'service' => $service,
            'status'  => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $serviceId)
    {
        $request->validate([
            'name'  => ['required', 'min:2', 'max:255', Rule::unique('services')->ignore($serviceId)],
            'image' => ['image', 'mimes:jpg,png,jpeg ,jfif,svg,webp,pjp'],
        ]);
        try {

            $gallery = Service::findOrFail($serviceId);
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/service/', 100, 100);
                $gallery->update([
                    'name' => $request->name,
                    'icon' => $url,
                ]);

            }
            else
            {

                $gallery->update([
                    'name' => $request->name,
                ]);

            }

            return redirect()->route('admin.service.index')->withSuccess('Service Item Item Updated SuccessFully');

        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.service.index')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($serviceId)
    {
        try {
            $service = Service::findOrFail($serviceId);
            ImageUplaoder::delete($service->icon);
            $service->delete();
            return redirect()->route('admin.service.index')->withSuccess('Service Item Deleted SuccessFully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.service.index')->withError($e->getMessage());
        }
    }
}