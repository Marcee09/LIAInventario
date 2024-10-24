<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToastMessage extends Component
{
    public string $uid;

    public function __construct()
    {
        $this->uid = uniqid();
    }

    public function render(): View|Closure|string
    {
        return view('components.toast-message');
    }
}
