<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\View\Component;

class Progress extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int|float $value = 0,
        public int|float $min = 0,
        public int|float $max = 100,
        public ?string $color = null,
        public bool $striped = false,
        public bool $animated = false,
        public bool $showLabel = false,
        public ?string $labelFormat = '%d%%',
        public ?string $height = null,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.div.progress');
    }

    /**
     * Get the progress bar class.
     */
    public function progressBarClass(): string
    {
        $classes = ['progress-bar'];

        if ($this->color) {
            $classes[] = "bg-{$this->color}";
        }

        if ($this->striped) {
            $classes[] = 'progress-bar-striped';
        }

        if ($this->animated) {
            $classes[] = 'progress-bar-animated';
        }

        return implode(' ', $classes);
    }

    /**
     * Calculate the progress percentage.
     */
    public function percentage(): float
    {
        $range = $this->max - $this->min;
        if ($range <= 0) {
            return 0;
        }

        $value = min(max($this->value, $this->min), $this->max);
        return (($value - $this->min) / $range) * 100;
    }

    /**
     * Format the label text.
     */
    public function formatLabel(): string
    {
        $percentage = $this->percentage();

        if ($this->labelFormat) {
            return sprintf($this->labelFormat, $percentage);
        }

        return "{$percentage}%";
    }
}