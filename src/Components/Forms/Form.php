<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

/**
 * Form Component
 *
 * Creates a form with optional AJAX submission, method spoofing,
 * and standardized submit/cancel buttons.
 */
class Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $action Form submission URL
     * @param string $method HTTP method (GET, POST, PUT, PATCH, DELETE)
     * @param bool $hasFiles Enable file uploads
     * @param bool $ajax Enable AJAX form submission
     * @param string|null $id Custom form ID (defaults to auto-generated)
     * @param string|null $submitLabel Label for submit button (null to hide)
     * @param string|null $cancelLabel Label for cancel button (null to hide)
     * @param string|null $cancelUrl URL for cancel button (defaults to previous page)
     * @param bool $inline Use inline form layout
     * @param bool $novalidate Disable browser validation
     */
    public function __construct(
        public string $action,
        public string $method = 'POST',
        public bool $hasFiles = false,
        public bool $ajax = false,
        public ?string $id = null,
        public ?string $submitLabel = null,
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
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('tweny-bladekit::components.forms.form');
    }

    /**
     * Get the form method.
     * HTML forms only support GET and POST, so we use POST + hidden _method for other HTTP methods.
     *
     * @return string
     */
    public function formMethod(): string
    {
        return in_array($this->method, ['GET', 'POST']) ? $this->method : 'POST';
    }

    /**
     * Get the spoofed method name for non-GET/POST methods.
     * Laravel uses a _method hidden field for method spoofing (PUT, PATCH, DELETE).
     *
     * @return string|null
     */
    public function spoofedMethod(): ?string
    {
        return !in_array($this->method, ['GET', 'POST']) ? $this->method : null;
    }

    /**
     * Get the form class based on the inline option.
     *
     * @return string
     */
    public function formClass(): string
    {
        return $this->inline ? 'row align-items-center' : '';
    }
}