<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms\Elements;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Label extends Component
{
    /* @var */
    public $for;

    public $star;

    //  Create a new component instance.
    public function __construct($for, $star=false)
    {
        $this->for = $for;
        $this->star = $star;
    }

    //  Get the view / contents that represent the component.
    public function render()
    {
        return view('tweny-bladekit::components.forms.elements.label');
    }

    public function fallback()
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}
