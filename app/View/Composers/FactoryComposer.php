<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class FactoryComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('factories', Page::select('title', 'slug')->where('parent', '=', 'factory')->where('is_active', '=', true)->get());
    }
}