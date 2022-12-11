<?php

namespace App\View\Composers;

use App\Models\Award;
use Illuminate\View\View;

class AwardComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('awards', Award::all());
    }
}