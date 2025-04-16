<?php

namespace TwenyCode\BladeMorph\Components\Forms\Elements;

use Illuminate\View\Component;

/**
 * Radio Form Element Component
 *
 * Represents a radio button input with support for inline display.
 */
class Radio extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $name The radio button name attribute
     * @param string $value The radio button value attribute
     * @param string|null $id The radio button id attribute
     * @param bool $checked Whether the radio button is checked
     * @param bool $inline Whether to display the radio button inline
     * @param bool $required Whether the radio button is required
     * @param bool $disabled Whether the radio button is disabled
     */
    public function __construct(
        public string $name,
        public string $value,
        public ?string $id = null,
        public bool $checked = false,
        public bool $inline = false,
        public bool $required = false,
        public bool $disabled = false,
    ) {
        // Generate ID if not provided: {name}_{value}
        $this->id = $id ?? "{$name}_{$value}";

        // Set checked state, preserving old input on form submission
        $this->checked = old($name) == $value || $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('blade-morph::components.forms.elements.radio');
    }

    /**
     * Get the form check class based on the inline option.
     *
     * @return string The CSS class for the form check
     */
    public function formCheckClass(): string
    {
        return $this->inline ? 'form-check form-check-inline' : 'form-check';
    }
}