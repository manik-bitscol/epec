<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class FooterNavComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('items', Page::select('title', 'slug')->where('parent', '=', null)->get());
    }
}