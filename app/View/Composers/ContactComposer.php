<?php

namespace App\View\Composers;

use App\Models\Contact;
use Illuminate\View\View;

class ContactComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('contacts', Contact::get());
    }
}