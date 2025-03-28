<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class AjaxError extends Component
{
    /** @var string */
    public $field;

    /** @var string */
    public $id;


    //  Create a new component instance.
    public function __construct($field, $id = null, $class='text-danger')
    {
        $this->field = $field;
        $this->id = $id ?? $field;
    }

    //Get the view / contents that represent the component.
    public function render()
    {
        return view('tweny-bladekit::components.forms.ajax-error');
    }


}
