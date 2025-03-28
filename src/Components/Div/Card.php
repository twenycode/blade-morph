<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Card extends Component
{

    /* @var null */
    public $cardTitle;

    public $cardButtons;


    //  Create a new component instance.
    public function __construct($cardTitle = null, $cardButtons = null)
    {
        $this->cardTitle = $cardTitle;

        $this->cardButtons = $cardButtons;
    }


    //  Get the view / contents that represent the component.
    public function render(): View
    {
        return view('tweny-bladekit::components.div.card');
    }

}
