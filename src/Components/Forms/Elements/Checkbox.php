<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms\Elements;


class Checkbox extends Input
{
    /** @var bool */
    public $checked;

    public function __construct($name, $id = null, $checked = false, $value = '')
    {
        parent::__construct($name, $id, 'checkbox', $value);

        $this->checked = (bool) old($name, $checked);
    }

    //  Get the view / contents that represent the component.
    public function render()
    {
        return view('tweny-bladekit::components.forms.elements.checkbox');
    }
}
