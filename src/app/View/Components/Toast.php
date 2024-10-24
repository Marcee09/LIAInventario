<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{
    public string $name;
    public int $duration;

    public function __construct(string $name = 'toast', int $duration = 3000)
    {
        // ensure $name is not empty, otherwise set it to 'toast'
        $name = $name ?: 'toast';
        // convert $name to dash-case
        $name = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $name));
        // ensure $duration is not less than 1000, otherwise set it to 3000
        $duration = $duration < 1000 ? 3000 : $duration;
        $this->name = $name;
        $this->duration = $duration;
    }

    public function render(): View|Closure|string
    {
        return view('components.toast');
    }
}
