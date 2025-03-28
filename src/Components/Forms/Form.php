<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $action,
        public string $method = 'POST',
        public bool $hasFiles = false,
        public bool $ajax = false,
        public ?string $id = null,
        public ?string $submitLabel = 'Submit',
        public ?string $cancelLabel = null,
        public ?string $cancelUrl = null,
        public bool $inline = false,
        public bool $novalidate = false,
    ) {
        $this->id = $id ?? 'form_' . uniqid();
        $this->method = strtoupper($method);
        $this->cancelUrl = $cancelUrl ?? url()->previous();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.forms.form');
    }

    /**
     * Get the form method.
     * HTML forms only support GET and POST, so we use POST + hidden _method for other HTTP methods.
     */
    public function formMethod(): string
    {
        return in_array($this->method, ['GET', 'POST']) ? $this->method : 'POST';
    }

    /**
     * Get the spoofed method name for non-GET/POST methods.
     */
    public function spoofedMethod(): ?string
    {
        return !in_array($this->method, ['GET', 'POST']) ? $this->method : null;
    }

    /**
     * Determine if the current route name matches the given pattern.
     */
    public function routeIs(string $pattern): bool
    {
        return Route::currentRouteNamed($pattern);
    }

    /**
     * Get the form class based on the inline option.
     */
    public function formClass(): string
    {
        return $this->inline ? 'row align-items-center' : '';
    }
}