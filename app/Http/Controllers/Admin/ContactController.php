<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->get();

        return view('admin.contact.index', compact('contacts'));
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
            'contact_of'   => 'required | string | min:2 | max: 50',
            'phone_number' => 'required | string | min:8 | max: 50',
        ]);
        // dd($request->all());
        try {
            Contact::create($request->all());
            return redirect()->route('admin.contact.index')->withSuccess('New Contact Added Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.contact.index')->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($contactId)
    {
        $contact = Contact::findOrFail($contactId);
        return response()->json([
            'contact' => $contact,
            'status'  => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $contactId)
    {
        $request->validate([
            'contact_of'   => 'required | string | min:2 | max: 50',
            'phone_number' => 'required | string | min:8 | max: 50',
        ]);
        try {
            Contact::findOrFail($contactId)->update($request->all());
            return redirect()->route('admin.contact.index')->withSuccess('Contact Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.contact.index')->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($contactId)
    {
        try {
            Contact::findOrFail($contactId)->delete();
            return redirect()->route('admin.contact.index')->withSuccess('Contact Deleted Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->route('admin.contact.index')->withError($e->getMessage());
        }
    }
}