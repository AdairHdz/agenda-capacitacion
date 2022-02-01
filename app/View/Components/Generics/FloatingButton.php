<?php

namespace App\View\Components\Generics;

use Illuminate\View\Component;

class FloatingButton extends Component
{
    public String $href;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href)
    {
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.generics.floating-button');
    }
}
