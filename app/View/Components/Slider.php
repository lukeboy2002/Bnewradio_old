<?php

namespace App\View\Components;

use App\Models\Slide;
use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
//
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $slides = Slide::where('status', 1)->get();

        return view('components.slider', [
            'slides' => $slides
        ]);

    }
}
