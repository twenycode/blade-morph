<?php

namespace TwenyCode\BladeMorph\Components\Forms\Elements;

use Illuminate\View\Component;
use Illuminate\Support\Arr;

/**
 * Select Form Element Component
 *
 * Represents a select dropdown with support for option groups and custom option rendering.
 */
class Select extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $name The select name attribute
     * @param array $options Array of options to display
     * @param mixed $selected The currently selected value(s)
     * @param string|null $id The select id attribute
     * @param string|null $placeholder Placeholder text
     * @param bool $multiple Whether multiple selections are allowed
     * @param string|null $valueField Field name to use as option value for array/object items
     * @param string|null $labelField Field name to use as option label for array/object items
     * @param bool $required Whether the select is required
     */
    public function __construct(
        public string $name,
        public array $options = [],
        public $selected = null,
        public ?string $id = null,
        public ?string $placeholder = null,
        public bool $multiple = false,
        public ?string $valueField = null,
        public ?string $labelField = null,
        public bool $required = false,
    ) {
        $this->id = $id ?? $name;
        // Set selected state, preserving old input on form submission
        $this->selected = old($name, $selected);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('blademorph::components.forms.elements.select');
    }

    /**
     * Determine if the given value is selected.
     *
     * @param mixed $value The option value to check
     * @return bool Whether the value is selected
     */
    public function isSelected($value): bool
    {
        if ($this->multiple && is_array($this->selected)) {
            return in_array($value, $this->selected);
        }

        return (string) $value === (string) $this->selected;
    }

    /**
     * Get the option value based on the item and configuration.
     *
     * @param mixed $item The option item
     * @return mixed The value to use for the option
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
     *
     * @param mixed $item The option item
     * @return mixed The label to display for the option
     */
    public function getOptionLabel($item)
    {
        if (is_array($item) || is_object($item)) {
            return $this->labelField ? Arr::get($item, $this->labelField) : $item;
        }

        return $item;
    }
}