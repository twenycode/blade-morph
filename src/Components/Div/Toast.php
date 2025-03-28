<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Toast extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $id = null,
        public string $title = 'Notification',
        public ?string $subtitle = null,
        public string $position = 'top-right',
        public ?string $color = null,
        public bool $autohide = true,
        public int $delay = 5000,
        public ?string $icon = null,
    ) {
        $this->id = $id ?? 'toast_' . Str::random(8);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.div.toast');
    }

    /**
     * Get the toast class.
     */
    public function toastClass(): string
    {
        $classes = ['toast'];

        if ($this->color) {
            $classes[] = "bg-{$this->color}";

            // Add text color for dark backgrounds
            if (in_array($this->color, ['primary', 'secondary', 'success', 'danger', 'dark'])) {
                $classes[] = 'text-white';
            }
        }

        return implode(' ', $classes);
    }

    /**
     * Get the position class for toast container.
     */
    public function positionClass(): string
    {
        $positions = [
            'top-right' => 'top-0 end-0',
            'top-left' => 'top-0 start-0',
            'top-center' => 'top-0 start-50 translate-middle-x',
            'bottom-right' => 'bottom-0 end-0',
            'bottom-left' => 'bottom-0 start-0',
            'bottom-center' => 'bottom-0 start-50 translate-middle-x',
        ];

        return $positions[$this->position] ?? $positions['top-right'];
    }
}