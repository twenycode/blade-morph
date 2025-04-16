<?php

namespace TwenyCode\BladeMorph\Components\Forms;

use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

/**
 * Form Error Component
 *
 * This component displays validation errors for a specific form field.
 */
class Error extends Component
{
    /**
     * The field to check for errors
     *
     * @var string
     */
    public $field;

    /**
     * The error bag to use
     *
     * @var string
     */
    public $bag;

    /**
     * The HTML ID for the error element
     *
     * @var string
     */
    public $id;

    /**
     * Create a new component instance.
     *
     * @param string $field The form field name to check for errors
     * @param string $bag The error bag name (default: 'default')
     * @param string|null $id Optional custom ID (defaults to field name)
     */
    public function __construct($field, $bag = 'default', $id = null)
    {
        $this->field = $field;
        $this->bag = $bag;
        $this->id = $id ?? $field;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('blade-morph::components.forms.error');
    }

    /**
     * Get error messages for the field
     *
     * @param ViewErrorBag $errors Error bag from session
     * @return array Array of error messages
     */
    public function message(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}