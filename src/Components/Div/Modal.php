<?php

namespace TwenyCode\LaravelBladeKitComponents\Div;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Modal extends Component
{

    /* @var null */
    public $id;

    /* @var null */
    public $modalTitle;

    /* @var null */
    public $modalFooter;

    //  Create a new component instance.
    public function __construct($id, $modalTitle = null, $modalFooter = null)
    {
        $this->id = $id;
        $this->modalTitle = $modalTitle;
        $this->modalFooter = $modalFooter;
    }

    //  Get the view / contents that represent the component.
    public function render(): View
    {
        return view('tweny-ui-kit-views::components.div.modal');
    }

}
