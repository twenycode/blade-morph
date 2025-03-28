<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    //  Create a new component instance.
    public function __construct()
    {
        //
    }

    //  Get the view / contents that represent the component.
    public function render(): View
    {
        return view('tweny-bladekit::components.div.alert');
    }
}
