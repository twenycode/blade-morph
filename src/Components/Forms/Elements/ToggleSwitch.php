<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms\Elements;

use Illuminate\View\Component;

class ToggleSwitch extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public ?string $id = null,
        public bool $checked = false,
        public string $value = '1',
        public ?string $color = 'primary',
        public bool $required = false,
        public bool $disabled = false,
        public bool $readonly = false,
        public ?string $labelOn = 'On',
        public ?string $labelOff = 'Off',
    ) {
        $this->id = $id ?? $name;
        $this->checked = (bool) old($name, $checked);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.forms.elements.toggle-switch');
    }

    /**
     * Get the toggle switch color class.
     */
    public function colorClass(): string
    {
        if (!$this->color) {
            return '';
        }

        return "form-switch-{$this->color}";
    }
}