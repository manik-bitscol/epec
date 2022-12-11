<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $favicon = Setting::where('option', '=', 'favicon')->first();
        $title = Setting::where('option', '=', 'title')->first();
        $keyword = Setting::where('option', '=', 'meta-keyword')->first();
        $description = Setting::where('option', '=', 'meta-description')->first();
        View::share('favicon',$favicon);
        View::share('title',$title->value);
        View::share('keyword',$keyword->value);
        View::share('description',$description->value);
    }
}