<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms\Elements;

class PickDate extends  Input
{
    public function __construct($name = 'date', $id = null)
    {
        parent::__construct($name, $id, 'date');
    }


    //  Get the view / contents that represent the component.
    public function render()
    {
        return view('tweny-bladekit::components.forms.elements.pick-date');
    }
}
