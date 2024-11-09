<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserLayout extends Component
{
    public function render()
    {
        return view('user.layouts.app'); // This should point to your layout view
    }
}
