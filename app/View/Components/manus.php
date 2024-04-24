<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class manus extends Component
{
    public $manus;
    /**
     * Create a new component instance.
     */
    public function __construct($manus)
    {
        //
        $this->manus = $manus;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.partials.manus');
    }
}
