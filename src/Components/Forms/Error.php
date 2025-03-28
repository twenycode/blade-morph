<?php

namespace TwenyCode\LaravelBladeKitComponents\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Error extends Component
{
    /** @var string */
    public $field;

    /** @var string */
    public $bag;

    /** @var string */
    public $id;


    //  Create a new component instance.
    public function __construct($field, $bag='default', $id = null)
    {
        $this->field = $field;
        $this->bag = $bag;
        $this->id = $id ?? $field;
    }

    //Get the view / contents that represent the component.
    public function render()
    {
        return view('tweny-ui-kit-views::components.forms.error');
    }

    public function message(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }



}
