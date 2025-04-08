<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms;

use Illuminate\View\Component;
use Illuminate\Support\ViewErrorBag;

class FormGroup extends Component
{
    /**
     * Create a new component instance.
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
     */
    public function render()
    {
        return view('tweny-bladekit::components.forms.form-group');
    }

    /**
     * Format the label from the name.
     */
    protected function formatLabel(string $name): string
    {
        return ucfirst(str_replace(['_', '-', '.'], ' ', $name));
    }

    /**
     * Check if the field has an error.
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