<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::get();
        $address  = $settings->where('option', '=', 'office-address')->first();
        $email    = $settings->where('option', '=', 'email')->first();
        $phone1   = $settings->where('option', '=', 'phone-1')->first();
        $locationMap   = $settings->where('option', '=', 'google-location')->first();
        return view('frontend.contact', compact('address', 'email', 'phone1','locationMap'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'string | required | min:2',
            'email'   => 'string | required | min:2',
            'phone'   => 'string | required | min:2',
            'message' => 'string | required | min:2',
        ]);
        $mailInfo = [
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'message' => $request->message,
        ];
        Mail::to($request->email)->send(new ContactMail($mailInfo));
        try {
            Message::create($request->all());

            return redirect()->back()->withSuccess("Your message bas been sent to Author");
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
