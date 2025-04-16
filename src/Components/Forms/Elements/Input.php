<?php

namespace TwenyCode\BladeMorph\Components\Forms\Elements;

use Illuminate\View\Component;

/**
 * Input Form Element Component
 *
 * Represents a basic HTML input field with customizable type.
 */
class Input extends Component
{
    /** @var string The name attribute of the input */
    public $name;

    /** @var string The id attribute of the input */
    public $id;

    /** @var string The input type (text, number, etc.) */
    public $type;

    /** @var string The value of the input */
    public $value;

    /**
     * Create a new component instance.
     *
     * @param string $name  The input name attribute
     * @param string|null $id  The input id attribute (defaults to name if null)
     * @param string $type  The input type attribute (default: text)
     * @param string $value  The input value attribute
     */
    public function __construct($name, $id = null, $type = 'text', $value = '')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value ?? ''); // Preserves old input on form submission
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('blademorph::components.forms.elements.input');
    }
}