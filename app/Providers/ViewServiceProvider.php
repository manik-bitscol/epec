<?php

namespace App\Providers;

use App\View\Composers\AboutNavComposer;
use App\View\Composers\AwardComposer;
use App\View\Composers\ContactComposer;
use App\View\Composers\FactoryComposer;
use App\View\Composers\PageNavComposer;
use App\View\Composers\PropertyNavComposer;
use App\View\Composers\ServiceComposer;
use App\View\Composers\SettingComposer;
use App\View\Composers\SisterConcernComposer;
use App\View\Composers\FooterNavComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.partials.header', AboutNavComposer::class);
        View::composer(['frontend.partials.header', 'frontend.partials.footer'], SisterConcernComposer::class);
        View::composer(['frontend.partials.header', 'frontend.partials.footer'], PageNavComposer::class);
        View::composer(['components.contact.contact', 'frontend.partials.footer'], ContactComposer::class);
        View::composer(['frontend.partials.header', 'frontend.partials.footer'], SettingComposer::class);
        View::composer('frontend.partials.header', ServiceComposer::class);
        View::composer('frontend.partials.header', FactoryComposer::class);
        View::composer('frontend.partials.header', PropertyNavComposer::class);
        View::composer('frontend.partials.footer', FooterNavComposer::class);
        View::composer('frontend.partials.awards', AwardComposer::class);
    }
}