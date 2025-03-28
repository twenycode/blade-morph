<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class TabContent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $tabId,
        public string $id,
        public bool $active = false,
        public bool $fade = true,
    ) {
        $this->id = Str::slug($id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.div.tab-content');
    }

    /**
     * Get tab pane classes.
     */
    public function panelClass(): string
    {
        $classes = ['tab-pane'];

        if ($this->active) {
            $classes[] = 'show active';
        }

        if ($this->fade) {
            $classes[] = 'fade';

            if ($this->active) {
                $classes[] = 'show';
            }
        }

        return implode(' ', $classes);
    }
}