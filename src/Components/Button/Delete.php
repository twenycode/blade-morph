<?php

namespace TwenyCode\LaravelBladeKit\Components\Button;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Delete extends Component
{
    /* @var  */
    public $action;

    /* @var  */
    public $label;

    //  Create a new component instance.
    public function __construct($action, $label = '<i class="fa fa-trash-alt"></i> Delete')
    {
        $this->action = $action;
        $this->label = $label;
    }

    //  Get the view / contents that represent the component.
    public function render(): View
    {
        return view('tweny-bladekit::components.button.delete');
    }
}
