<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class AboutNavComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('abouts', Page::select('title', 'slug')->where('parent', '=', 'about')->where('is_active', '=', true)->get());
    }
}
