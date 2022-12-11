<?php

namespace App\View\Composers;

use App\Models\SisterConcern;
use Illuminate\View\View;

class SisterConcernComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('sisterItems', SisterConcern::select('title', 'slug')->where('is_active', '=', true)->get());
    }
}