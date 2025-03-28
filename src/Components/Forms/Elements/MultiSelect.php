<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms\Elements;

use Illuminate\View\Component;
use Illuminate\Support\Arr;

class MultiSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public array $options = [],
        public array|null $selected = [],
        public ?string $id = null,
        public ?string $placeholder = null,
        public ?string $valueField = null,
        public ?string $labelField = null,
        public ?int $size = null,
        public bool $required = false,
    ) {
        $this->id = $id ?? $name;
        $this->selected = old($name, $selected) ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.forms.elements.multi-select');
    }

    /**
     * Determine if the given value is selected.
     */
    public function isSelected($value): bool
    {
        if (is_array($this->selected)) {
            return in_array($value, $this->selected);
        }

        return false;
    }

    /**
     * Get the option value based on the item and configuration.
     */
    public function getOptionValue($item)
    {
        if (is_array($item) || is_object($item)) {
            return $this->valueField ? Arr::get($item, $this->valueField) : $item;
        }

        return $item;
    }

    /**
     * Get the option label based on the item and configuration.
     */
    public function getOptionLabel($item)
    {
        if (is_array($item) || is_object($item)) {
            return $this->labelField ? Arr::get($item, $this->labelField) : $item;
        }

        return $item;
    }
}