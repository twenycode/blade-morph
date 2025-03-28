<?php

namespace TwenyCode\LaravelBladeKitComponents\Forms\Elements;

use Illuminate\View\Component;

class Input extends Component
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var string */
    public $type;

    /** @var string */
    public $value;

    //  Create a new component instance.
    public function __construct($name, $id = null, $type = 'text', $value = '')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value ?? '');
    }


    //  Get the view / contents that represent the component.
    public function render()
    {
        return view('tweny-ui-kit-views::components.forms.elements.input');
    }
}
