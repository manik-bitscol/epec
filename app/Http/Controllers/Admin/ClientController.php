<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.client.index', ['clients' => Client::latest()->get()]);
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
            'title' => 'required | string | min:2',
            'image' => 'required | image',
        ]);
        try {
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::upload($request->file('image'), 'uploads/client/', 300, 200);

            }
            Client::create([
                'title' => $request->title,
                'image' => $url,
            ]);

            return redirect()->route('admin.client.index')->withSuccess('New Client Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.client.index')->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($clientId)
    {
        return response()->json([
            'client' => Client::findOrFail($clientId),
            'status' => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clientId)
    {
        $request->validate([
            'title'     => 'required | string | min:2',
            'image'     => 'image',
            'old_image' => 'string',
        ]);
        try {
            $client = Client::findOrFail($clientId);
            if ($request->hasFile('image'))
            {
                $url = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/client/', 300, 200);
            }
            else
            {
                $url = $request->old_image;
            }
            $client->update([
                'title' => $request->title,
                'image' => $url,
            ]);
            return redirect()->route('admin.client.index')->withSuccess('Client Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($clientId)
    {
        try {
            $client = Client::findOrFail($clientId);
            ImageUplaoder::delete($client->image);
            $client->delete();
            return redirect()->route('admin.client.index')->withSuccess('Client Deleted Successfully');

        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}