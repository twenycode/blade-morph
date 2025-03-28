<?php

namespace TwenyCode\LaravelBladeKitComponents\Forms\Elements;

class PickDate extends  Input
{
    public function __construct($name = 'date', $id = null)
    {
        parent::__construct($name, $id, 'date');
    }


    //  Get the view / contents that represent the component.
    public function render()
    {
        return view('tweny-ui-kit-views::components.forms.elements.pick-date');
    }
}
