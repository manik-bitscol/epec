<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUplaoder;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings      = Setting::get();
        $logo          = $settings->where('option', '=', 'header-logo')->first();
        $favicon       = $settings->where('option', '=', 'favicon')->first();
        $footerLogo    = $settings->where('option', '=', 'footer-logo')->first();
        $officeAddress = $settings->where('option', '=', 'office-address')->first();
        $phone1        = $settings->where('option', '=', 'phone-1')->first();
        $phone2        = $settings->where('option', '=', 'phone-2')->first();
        $email         = $settings->where('option', '=', 'email')->first();
        $facebook      = $settings->where('option', '=', 'facebook')->first();
        $whatsapp      = $settings->where('option', '=', 'whatsapp')->first();
        $twitter       = $settings->where('option', '=', 'twitter')->first();
        $instagram     = $settings->where('option', '=', 'instagram')->first();
        $linkedin      = $settings->where('option', '=', 'linkedin')->first();
        $gmail         = $settings->where('option', '=', 'google-mail')->first();
        $password      = $settings->where('option', '=', 'gmail-password')->first();
        $copyRight     = $settings->where('option', '=', 'copy-right-text')->first();
        $locationMap     = $settings->where('option', '=', 'google-location')->first();
        $seoTitle     = $settings->where('option', '=', 'title')->first();
        $seoKeyword     = $settings->where('option', '=', 'meta-keyword')->first();
        $seoDescription     = $settings->where('option', '=', 'meta-description')->first();
        return view('admin.setting.index', compact('logo', 'footerLogo', 'favicon', 'officeAddress', 'phone1', 'phone2', 'email', 'facebook', 'whatsapp', 'twitter', 'instagram', 'linkedin', 'copyRight', 'gmail', 'password', 'copyRight','locationMap','seoTitle','seoKeyword','seoDescription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logo(Request $request)
    {
        $request->validate([
            'image'    => 'required',
            'old_logo' => 'required',
        ]);
        try {
            $url = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/setting/', 200, 100);
            Setting::where('option', '=', 'header-logo')->update([
                'value' => $url,
            ]);
            return redirect()->back()->withSuccess('Header Logo Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }
    }
    public function footerLogo(Request $request)
    {
        $request->validate([
            'image'    => 'required',
            'old_logo' => 'required',
        ]);
        try {
            $url = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/setting/', 200, 100);
            Setting::where('option', '=', 'footer-logo')->update([
                'value' => $url,
            ]);
            return redirect()->back()->withSuccess('Footer Logo Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }
    }
    public function favicon(Request $request)
    {
        $request->validate([
            'image'    => 'required',
            'old_logo' => 'required',
        ]);
        try {
            $url = ImageUplaoder::update($request->old_image, $request->file('image'), 'uploads/setting/', 200, 100);
            Setting::where('option', '=', 'favicon')->update([
                'value' => $url,
            ]);
            return redirect()->back()->withSuccess('Favicon Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }
    }

    public function address(Request $request)
    {
        $request->validate([
            'address' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'office-address')->update([
                'value' => $request->address,
            ]);
            return redirect()->back()->withSuccess('Office Address Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function phoneOne(Request $request)
    {
        $request->validate([
            'phone_1' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'phone-1')->update([
                'value' => $request->phone_1,
            ]);
            return redirect()->back()->withSuccess('Phone Number Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function phoneTwo(Request $request)
    {
        $request->validate([
            'phone_2' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'phone-2')->update([
                'value' => $request->phone_2,
            ]);
            return redirect()->back()->withSuccess('Phone Number Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function email(Request $request)
    {
        $request->validate([
            'email' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'email')->update([
                'value' => $request->email,
            ]);
            return redirect()->back()->withSuccess('Email Address  Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function facebook(Request $request)
    {
        $request->validate([
            'facebook' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'facebook')->update([
                'value' => $request->facebook,
            ]);
            return redirect()->back()->withSuccess('Facebook Link Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }
    }
    public function twitter(Request $request)
    {
        $request->validate([
            'twitter' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'twitter')->update([
                'value' => $request->twitter,
            ]);
            return redirect()->back()->withSuccess('Twitter Link Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function whatsapp(Request $request)
    {
        $request->validate([
            'whatsapp' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'whatsapp')->update([
                'value' => $request->whatsapp,
            ]);
            return redirect()->back()->withSuccess('Whats App Link Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function linkedin(Request $request)
    {
        $request->validate([
            'linkedin' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'linkedin')->update([
                'value' => $request->linkedin,
            ]);
            return redirect()->back()->withSuccess('LinedIn Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function instagram(Request $request)
    {
        $request->validate([
            'instagram' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'instagram')->update([
                'value' => $request->instagram,
            ]);
            return redirect()->back()->withSuccess('Instagram Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    
    public function seoTitle(Request $request)
    {
        $request->validate([
            'seo_title' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'title')->update([
                'value' => $request->seo_title,
            ]);
            return redirect()->back()->withSuccess('Seo Title Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function seoKeyword(Request $request)
    {
        $request->validate([
            'meta_keyword' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'meta-keyword')->update([
                'value' => $request->meta_keyword,
            ]);
            return redirect()->back()->withSuccess('Seo Keywords Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function seoDescription(Request $request)
    {
        $request->validate([
            'meta_description' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'meta-description')->update([
                'value' => $request->meta_description,
            ]);
            return redirect()->back()->withSuccess('SEO Description Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function locationMap(Request $request)
    {
        $request->validate([
            'google_location' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'google-location')->update([
                'value' => $request->google_location,
            ]);
            return redirect()->back()->withSuccess('Location Map Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function copyRightText(Request $request)
    {
        $request->validate([
            'copy_right_text' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'copy-right-text')->update([
                'value' => $request->copy_right_text,
            ]);
            return redirect()->back()->withSuccess('Instagram Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function mailSender(Request $request)
    {
        $request->validate([
            'sender_mail' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'google-mail')->update([
                'value' => $request->sender_mail,
            ]);
            return redirect()->back()->withSuccess('Mail Sender  Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }
    public function senderPassword(Request $request)
    {
        $request->validate([
            'sender_password' => 'required | string | min:2',
        ]);
        try {

            Setting::where('option', '=', 'gmail-password')->update([
                'value' => $request->sender_password,
            ]);
            return redirect()->back()->withSuccess('Mail Sender Password Updated Successfully');
        }
        catch (\Exception$e)
        {
            return redirect()->back()->withSuccess($e->getMessage());
        }

    }

}