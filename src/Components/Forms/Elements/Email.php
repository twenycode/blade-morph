<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms\Elements;

class Email  extends Input
{
    public function __construct($name = 'email', $id = null, $value = '')
    {
        parent::__construct($name, $id, 'email', $value);
    }

    //  Get the view / contents that represent the component.
    public function render()
    {
        return view('tweny-bladekit::components.forms.elements.email');
    }
}
