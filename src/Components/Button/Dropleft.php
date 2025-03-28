<?php

namespace TwenyCode\LaravelBladeKitComponents\Button;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropleft extends Component
{
    public $icon;
    
    public $align;

    //  Create a new component instance.
    public function __construct( $class="btn btn-link btn-sm text-dark", $icon = 'fas fa-cog', $align ='dropleft' )
    {
        $this->icon = $icon;
        $this->align = $align;

    }

    //  Get the view / contents that represent the component.
    public function render(): View
    {
        return view('tweny-ui-kit-views::components.button.dropleft');
    }
}
