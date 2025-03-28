@if($horizontal)
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
            @endif
        </div>
    </div>
@else
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
        @endif
    </div>
@endif