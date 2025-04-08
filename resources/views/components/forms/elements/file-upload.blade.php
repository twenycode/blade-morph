{{-- File upload element blade template --}}
<div class="file-upload-component">
    <div class="input-group">
        <input
                type="file"
                name="{{ $name }}{{ $multiple ? '[]' : '' }}"
                id="{{ $id }}"
                class="form-control {{ $attributes->get('class') }}"
                {{ $multiple ? 'multiple' : '' }}
                {{ $required ? 'required' : '' }}
                {{ $acceptAttribute() ? 'accept=' . $acceptAttribute() : '' }}
                {{ $attributes->except(['class']) }}
        >

        @if($preview && $previewUrl)
            <button class="btn btn-outline-secondary" type="button" onclick="window.open('{{ $previewUrl }}', '_blank')">
                <i class="fas fa-eye"></i> View
            </button>
        @endif
    </div>

    @if($maxSize || $maxFiles || $acceptedFileTypes)
        <div class="form-text mt-1">
            @if($maxSize)
                <small>Max file size: {{ $maxSize }} KB</small>
            @endif

            @if($maxFiles && $multiple)
                <small>{{ $maxSize ? ' • ' : '' }}Max files: {{ $maxFiles }}</small>
            @endif

            @if($acceptedFileTypes)
                <small>{{ ($maxSize || ($maxFiles && $multiple)) ? ' • ' : '' }}Accepted formats: {{ implode(', ', $acceptedFileTypes) }}</small>
            @endif
        </div>
    @endif

    @if($preview)
        <div id="{{ $id }}_preview" class="file-preview mt-2">
            @if($previewUrl)
                <div class="current-file mb-2">
                    <small class="text-muted">Current file:</small>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-file me-2"></i>
                        <a href="{{ $previewUrl }}" target="_blank">{{ basename($previewUrl) }}</a>
                    </div>
                </div>
            @endif
            <div class="new-file-preview d-none">
                <small class="text-muted">Selected file:</small>
                <div class="selected-file-info"></div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const input = document.getElementById('{{ $id }}');
                const preview = document.getElementById('{{ $id }}_preview');

                if (input && preview) {
                    input.addEventListener('change', function() {
                        const newFilePreview = preview.querySelector('.new-file-preview');
                        const fileInfo = preview.querySelector('.selected-file-info');

                        if (input.files.length > 0) {
                            newFilePreview.classList.remove('d-none');

                            if (input.files.length === 1) {
                                const file = input.files[0];
                                const size = Math.round(file.size / 1024); // KB

                                fileInfo.innerHTML = `
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-file me-2"></i>
                                        <span>${file.name} (${size} KB)</span>
                                    </div>
                                `;
                            } else {
                                fileInfo.innerHTML = `<span>${input.files.length} files selected</span>`;
                            }
                        } else {
                            newFilePreview.classList.add('d-none');
                            fileInfo.innerHTML = '';
                        }
                    });
                }
            });
        </script>
    @endif
</div>