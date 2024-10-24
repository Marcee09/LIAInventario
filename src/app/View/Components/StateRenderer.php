<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StateRenderer extends Component
{
    public string $name;
    public int $id;

    public function __construct(string $name = 'main', int $id = 0)
    {
        $name = $name ?: 'main';
        $this->name = $name;
        $this->id = $id;
    }

    public function render(): View|Closure|string
    {
        return view('components.state-renderer');
    }
}
