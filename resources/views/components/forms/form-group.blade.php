{{--
    Form Group Component
    Wraps form inputs with labels, error messages, and help text

    Parameters:
    - $id: HTML ID for the input
    - $label: Label text
    - $required: If true, shows red asterisk
    - $helpText: Optional helper text
    - $horizontal: If true, uses horizontal layout (label beside field)
    - $labelCol: Bootstrap column class for label (horizontal only)
    - $fieldCol: Bootstrap column class for field (horizontal only)

    Usage:
    <x-forms.form-group name="email" label="Email Address" required>
        <input type="email" class="form-control" name="email" id="email">
    </x-forms.form-group>
--}}

@if($horizontal)
    {{-- Horizontal layout (label beside field) --}}
    <div {{ $attributes->merge(['class' => 'row mb-3']) }}>
        <label for="{{ $id }}" class="{{ $labelCol }} col-form-label">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>

        <div class="{{ $fieldCol }}">
            {{ $slot }}

            @if($helpText)
                <div class="form-text text-muted">
                    {{ $helpText }}
                </div>
            @endif

            @if($hasError())
                <div class="invalid-feedback">
                    {{ $errorMessage() }}
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.getElementById('{{ $id }}').classList.add('is-invalid');
                    });
                </script>
                
            @endif
        </div>
    </div>
@else
    {{-- Standard vertical layout (label above field) --}}
    <div {{ $attributes->merge(['class' => 'mb-3']) }}>
        <label for="{{ $id }}" class="form-label">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>

        {{ $slot }}

        @if($helpText)
            <div class="form-text text-muted">
                {{ $helpText }}
            </div>
        @endif

        @if($hasError())
            <div class="invalid-feedback">
                {{ $errorMessage() }}
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('{{ $id }}').classList.add('is-invalid');
                });
            </script>

        @endif
    </div>
@endif