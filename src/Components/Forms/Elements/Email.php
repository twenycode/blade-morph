<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms\Elements;

/**
 * Email Form Element Component
 *
 * Extends the Input component to create an email input field.
 */
class Email extends Input
{
    /**
     * Create a new component instance.
     *
     * @param string $name The input name attribute (default: 'email')
     * @param string|null $id The input id attribute (defaults to name if null)
     * @param string $value The input value attribute
     */
    public function __construct($name = 'email', $id = null, $value = '')
    {
        // Call parent constructor with type 'email'
        parent::__construct($name, $id, 'email', $value);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('tweny-bladekit::components.forms.elements.email');
    }
}