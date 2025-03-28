<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms\Elements;


class Password extends Input
{

    public function __construct($name = 'password', $id = null)
    {
        parent::__construct($name, $id, 'password');
    }

    //  Get the view / contents that represent the component.
    public function render()
    {
        return view('tweny-bladekit::components.forms.elements.password');
    }
}
