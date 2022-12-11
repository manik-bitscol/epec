<?php

namespace App\View\Composers;

use App\Models\Category;
use App\Models\Location;
use App\Models\Phase;
use App\Models\Type;
use Illuminate\View\View;

class PropertyNavComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('locations', Location::all())->with('types', Type::all())->with('categories', Category::all())->with('phases', Phase::all());
    }
}