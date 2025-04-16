<?php

namespace TwenyCode\BladeMorph\Components\Forms;

use Illuminate\View\Component;
use Illuminate\Support\ViewErrorBag;

/**
 * Form Group Component
 *
 * This component wraps form inputs with a label, error messages, and help text.
 * Supports both standard and horizontal layouts.
 */
class FormGroup extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $name The input field name
     * @param string|null $label Custom label (defaults to formatted field name)
     * @param bool $required Whether the field is required
     * @param string|null $helpText Optional help text to display
     * @param string|null $id Custom ID (defaults to name)
     * @param string $bag Error bag name
     * @param bool $horizontal Use horizontal layout (label beside field)
     * @param string $labelCol Bootstrap column class for label (horizontal only)
     * @param string $fieldCol Bootstrap column class for field (horizontal only)
     */
    public function __construct(
        public string $name,
        public ?string $label = null,
        public bool $required = false,
        public ?string $helpText = null,
        public ?string $id = null,
        public ?string $bag = 'default',
        public bool $horizontal = false,
        public ?string $labelCol = 'col-md-3',
        public ?string $fieldCol = 'col-md-9',
    ) {
        $this->id = $id ?? $name;
        $this->label = $label ?? $this->formatLabel($name);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('blademorph::components.forms.form-group');
    }

    /**
     * Format the label from the name.
     * Converts snake_case or kebab-case to Title Case
     *
     * @param string $name
     * @return string
     */
    protected function formatLabel(string $name): string
    {
        return ucfirst(str_replace(['_', '-', '.'], ' ', $name));
    }

    /**
     * Check if the field has an error.
     *
     * @return bool
     */
    public function hasError(): bool
    {
        $errors = session()->get('errors', new ViewErrorBag);

        if ($errors->hasBag($this->bag)) {
            return $errors->getBag($this->bag)->has($this->name);
        }

        return false;
    }

    /**
     * Get the error message for the field.
     *
     * @return string|null
     */
    public function errorMessage(): ?string
    {
        $errors = session()->get('errors', new ViewErrorBag);

        if ($this->hasError()) {
            return $errors->getBag($this->bag)->first($this->name);
        }

        return null;
    }
}