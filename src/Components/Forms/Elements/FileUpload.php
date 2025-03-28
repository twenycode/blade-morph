<?php

namespace TwenyCode\LaravelBladeKit\Components\Forms\Elements;

use Illuminate\View\Component;

class FileUpload extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $accept = null,
        public bool $multiple = false,
        public bool $required = false,
        public bool $preview = false,
        public ?string $previewUrl = null,
        public ?string $placeholder = 'Choose file...',
        public ?int $maxFiles = null,
        public ?int $maxSize = null, // In KB
        public ?array $acceptedFileTypes = null,
    ) {
        $this->id = $id ?? $name;

        if ($this->acceptedFileTypes && !$this->accept) {
            $this->accept = implode(',', array_map(function($type) {
                return '.' . ltrim($type, '.');
            }, $this->acceptedFileTypes));
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.forms.elements.file-upload');
    }

    /**
     * Get the accept attribute based on the allowed file types.
     */
    public function acceptAttribute(): ?string
    {
        if ($this->accept) {
            return $this->accept;
        }

        return null;
    }
}