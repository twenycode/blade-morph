<?php

namespace TwenyCode\LaravelBladeKitComponents\Forms\Elements;

use Illuminate\View\Component;

class Textarea extends Component
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var int */
    public $rows;

    public function __construct($name, $id = null, $rows = 3)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->rows = $rows;
    }

    //  Get the view / contents that represent the component.
    public function render()
    {
        return view('tweny-ui-kit-views::components.forms.elements.textarea');
    }
}
