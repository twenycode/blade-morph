<?php

namespace TwenyCode\LaravelBladeKitComponents\Table;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    /* @var  */
    public $id;

    /* @var  */
    public $thead;

    /* @var  */
    public $collection;

    //  Create a new component instance.
    public function __construct($id = 'table',  $thead = null,    $collection = null)
    {
        //dd($hasActions);
        $this->id = $id;
        $this->thead = $thead;
        $this->collection = $collection;
    }

    //  Get the view / contents that represent the component.
    public function render(): View
    {
        return view('tweny-ui-kit-views::components.tables.table');
    }
}
