<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class ServiceComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('services', Page::select('title', 'slug')->where('parent', '=', 'service')->where('is_active', '=', true)->get());
    }
}