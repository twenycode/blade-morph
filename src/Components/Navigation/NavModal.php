<?php

namespace TwenyCode\LaravelBladeKitComponents\Navigation;

use Illuminate\Contracts\View\View;

class NavModal extends NavLink
{
    //  Create a new component instance.
    public function __construct($href,$label)
    {
        parent::__construct($href,$label);
    }


    //Get the view / contents that represent the component.
    public function render(): View
    {
        return view('tweny-ui-kit-views::components.navigation.nav-modal');
    }




}
