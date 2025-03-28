<?php

namespace TwenyCode\LaravelBladeKitComponents\Navigation;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavLink extends Component
{
    /*  @var  */
    public $href;

    /*  @var  */
    public $label;


    //  Create a new component instance.
    public function __construct($href,$label)
    {
        $this->href = $href;
        $this->label =$label;
    }

    //  Get the view / contents that represent the component.
    public function render(): View
    {
        return view('tweny-ui-kit-views::components.navigation.nav-link');
    }
}
