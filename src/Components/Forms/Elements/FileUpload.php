<?php

namespace TwenyCode\BladeMorph\Components\Forms\Elements;

use Illuminate\View\Component;

/**
 * FileUpload Form Element Component
 *
 * Represents a file upload input with preview functionality and validation constraints.
 */
class FileUpload extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $name The input name attribute
     * @param string|null $id The input id attribute
     * @param string|null $accept Accepted file types (mime types or extensions)
     * @param bool $multiple Whether multiple files can be uploaded
     * @param bool $required Whether the file upload is required
     * @param bool $preview Whether to show file preview
     * @param string|null $previewUrl URL of the currently uploaded file
     * @param string|null $placeholder Placeholder text
     * @param int|null $maxFiles Maximum number of files allowed (for multiple)
     * @param int|null $maxSize Maximum file size in KB
     * @param array|null $acceptedFileTypes Array of accepted file extensions
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

        // Auto-generate accept attribute from acceptedFileTypes if provided
        if ($this->acceptedFileTypes && !$this->accept) {
            $this->accept = implode(',', array_map(function($type) {
                return '.' . ltrim($type, '.');
            }, $this->acceptedFileTypes));
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('blademorph::components.forms.elements.file-upload');
    }

    /**
     * Get the accept attribute based on the allowed file types.
     *
     * @return string|null The accept attribute value
     */
    public function acceptAttribute(): ?string
    {
        if ($this->accept) {
            return $this->accept;
        }

        return null;
    }
}