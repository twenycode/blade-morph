<?php

namespace TwenyCode\BladeMorph\Components\Forms\Elements;

/**
 * Password Form Element Component
 *
 * Extends the Input component to create a password input field.
 */
class Password extends Input
{
    /**
     * Create a new component instance.
     *
     * @param string $name The input name attribute (default: 'password')
     * @param string|null $id The input id attribute (defaults to name if null)
     */
    public function __construct($name = 'password', $id = null)
    {
        // Call parent constructor with type 'password'
        // No value parameter as we don't want to preserve password values
        parent::__construct($name, $id, 'password');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('blademorph::components.forms.elements.password');
    }
}