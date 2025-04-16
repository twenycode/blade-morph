<?php

namespace TwenyCode\BladeMorph\Components\Forms\Elements;

/**
 * Checkbox Form Element Component
 *
 * Extends the Input component to create a checkbox input field.
 */
class Checkbox extends Input
{
    /** @var bool Whether the checkbox is checked */
    public $checked;

    /**
     * Create a new component instance.
     *
     * @param string $name The input name attribute
     * @param string|null $id The input id attribute (defaults to name if null)
     * @param bool $checked Whether the checkbox is checked
     * @param string $value The value when checkbox is checked
     */
    public function __construct($name, $id = null, $checked = false, $value = '')
    {
        // Call parent constructor with type 'checkbox'
        parent::__construct($name, $id, 'checkbox', $value);

        // Set checked state, preserving old input on form submission
        $this->checked = (bool) old($name, $checked);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('blade-morph::components.forms.elements.checkbox');
    }
}