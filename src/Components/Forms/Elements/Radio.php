<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms\Elements;

use Illuminate\View\Component;

class Radio extends Component
{
    /**
     * Create a new component instance.
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
        $this->id = $id ?? "{$name}_{$value}";
        $this->checked = old($name) == $value || $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.forms.elements.radio');
    }

    /**
     * Get the form check class based on the inline option.
     */
    public function formCheckClass(): string
    {
        return $this->inline ? 'form-check form-check-inline' : 'form-check';
    }
}