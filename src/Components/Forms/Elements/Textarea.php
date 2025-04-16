<?php

namespace TwenyCode\BladeMorph\Components\Forms\Elements;

use Illuminate\View\Component;

/**
 * Textarea Form Element Component
 *
 * Represents a textarea input with customizable rows.
 */
class Textarea extends Component
{
    /** @var string The name attribute of the textarea */
    public $name;

    /** @var string The id attribute of the textarea */
    public $id;

    /** @var int The number of rows in the textarea */
    public $rows;

    /**
     * Create a new component instance.
     *
     * @param string $name The textarea name attribute
     * @param string|null $id The textarea id attribute (defaults to name if null)
     * @param int $rows The number of visible rows
     */
    public function __construct($name, $id = null, $rows = 3)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('blademorph::components.forms.elements.textarea');
    }
}