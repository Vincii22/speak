<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    public function render()
    {
        return view('admin.layouts.app'); // Point to your admin layout
    }
}
