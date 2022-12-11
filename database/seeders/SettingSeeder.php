<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'option' => 'header-logo',
            'value'  => 'uploads/setting/logo.png',
        ]);
        Setting::create([
            'option' => 'footer-logo',
            'value'  => 'uploads/setting/logo-2.png',
        ]);
        Setting::create([
            'option' => 'office-address',
            'value'  => 'Hourse-33, Road-15, Sector-11, Uttara, Dhaka',
        ]);
        Setting::create([
            'option' => 'phone-1',
            'value'  => '+880125876966',
        ]);
        Setting::create([
            'option' => 'phone-2',
            'value'  => '+880125876966',
        ]);
        Setting::create([
            'option' => 'email',
            'value'  => 'epec@email.com',
        ]);
        Setting::create([
            'option' => 'facebook',
            'value'  => 'https://www.facebook.com/profile.php?id=100083610819214',
        ]);
        Setting::create([
            'option' => 'whatsapp',
            'value'  => 'https://www.facebook.com/profile.php?id=100083610819214',
        ]);
        Setting::create([
            'option' => 'twitter',
            'value'  => 'https://www.facebook.com/profile.php?id=100083610819214',
        ]);
        Setting::create([
            'option' => 'instagram',
            'value'  => 'https://www.facebook.com/profile.php?id=100083610819214',
        ]);
        Setting::create([
            'option' => 'linedin',
            'value'  => 'https://www.facebook.com/profile.php?id=100083610819214',
        ]);
        Setting::create([
            'option' => 'copy-right-text',
            'value'  => 'https://www.facebook.com/profile.php?id=100083610819214',
        ]);
    }
}
