<?php

namespace TwenyCode\BladeMorph\Components\Forms\Elements;

use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Label Form Element Component
 *
 * Represents a form label with optional required indicator.
 */
class Label extends Component
{
    /** @var string The 'for' attribute of the label */
    public $for;

    /** @var bool Whether to show a required indicator (star) */
    public $star;

    /**
     * Create a new component instance.
     *
     * @param string $for The 'for' attribute that matches the input id
     * @param bool $star Whether to show a required indicator
     */
    public function __construct($for, $star=false)
    {
        $this->for = $for;
        $this->star = $star;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('blade-morph::components.forms.elements.label');
    }

    /**
     * Generate a fallback label text from the 'for' attribute.
     *
     * @return string The auto-generated label text
     */
    public function fallback()
    {
        return Str::ucfirst(str_replace('_', ' ', $this->for));
    }
}