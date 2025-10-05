<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MapCard extends Component
{
    public string $title;
    public $map;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $map)
    {
        $this->title = $title;
        $this->map = $map;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.map-card');
    }
}
