{{--
    Form Component
    Creates a form with optional AJAX support, file uploads, and standardized buttons

    Parameters:
    - $action: Form submission URL
    - $method: HTTP method (GET, POST, PUT, PATCH, DELETE)
    - $hasFiles: Enable file uploads (adds enctype attribute)
    - $ajax: Enable AJAX form submission
    - $id: Custom form ID
    - $submitLabel: Label for submit button (null to hide)
    - $cancelLabel: Label for cancel button (null to hide)
    - $cancelUrl: URL for cancel button
    - $inline: Use inline form layout
    - $novalidate: Disable browser validation

    Usage:
    <x-forms.form action="{{ route('users.store') }}" method="POST" submit-label="Save User">
        <!-- Form fields go here -->
    </x-forms.form>
--}}

<form
        id="{{ $id }}"
        method="{{ $method ?? 'POST' }}"
        action="{{ $action }}"
        {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!}
        {{ $attributes->merge(['class' => $formClass()]) }}
        role="form"
        autocomplete="off"
        {!! $novalidate ? 'novalidate' : '' !!}
        {!! $ajax ? 'data-ajax-form' : '' !!}
>
    {{-- CSRF Token --}}
    @csrf

    {{-- Method Spoofing for PUT/PATCH/DELETE --}}
    @if($spoofedMethod())
        @method($spoofedMethod())
    @endif

    {{-- Form Content --}}
    <div class="form-content">
        {{ $slot }}
    </div>

    {{-- Form Actions (Submit/Cancel buttons) --}}
    @if($submitLabel || $cancelLabel)
        <div class="form-actions mt-4">
            @if($submitLabel)
                <x-button
                        type="submit"
                        :label="$submitLabel"
                        color="primary"
                        :loading="$ajax"
                        loading-text="Processing..."
                />
            @endif

            @if($cancelLabel)
                <a href="{{ $cancelUrl }}" class="btn btn-secondary ms-2">
                    {{ $cancelLabel }}
                </a>
            @endif
        </div>
    @endif

    {{-- AJAX Message Container (hidden by default) --}}
    @if($ajax)
        <div class="ajax-form-message mt-3" style="display: none;">
            <div class="alert alert-success ajax-success-message" role="alert"></div>
            <div class="alert alert-danger ajax-error-message" role="alert"></div>
        </div>
    @endif
</form>

{{-- AJAX Form Handling Script --}}
@if($ajax)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('{{ $id }}');
            if (form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    // Clear previous messages
                    const successMessage = form.querySelector('.ajax-success-message');
                    const errorMessage = form.querySelector('.ajax-error-message');
                    const formMessage = form.querySelector('.ajax-form-message');

                    successMessage.style.display = 'none';
                    errorMessage.style.display = 'none';
                    formMessage.style.display = 'none';

                    // Reset field errors
                    form.querySelectorAll('.is-invalid').forEach(el => {
                        el.classList.remove('is-invalid');
                    });
                    form.querySelectorAll('.invalid-feedback').forEach(el => {
                        el.style.display = 'none';
                    });

                    // Prepare form data
                    const formData = new FormData(form);

                    // Set submit button to loading state
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalBtnText = submitBtn.innerHTML;
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...';

                    // Send AJAX request
                    fetch(form.action, {
                        method: form.method,
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            formMessage.style.display = 'block';

                            if (data.success) {
                                // Success response handling
                                successMessage.textContent = data.message || 'Form submitted successfully!';
                                successMessage.style.display = 'block';

                                // Handle redirect if provided
                                if (data.redirect) {
                                    setTimeout(() => {
                                        window.location.href = data.redirect;
                                    }, 1000);
                                }

                                // Reset form if not redirecting
                                if (!data.redirect) {
                                    form.reset();
                                }
                            } else {
                                // Handle validation errors
                                if (data.errors) {
                                    Object.keys(data.errors).forEach(field => {
                                        const input = form.querySelector(`[name="${field}"]`);
                                        if (input) {
                                            input.classList.add('is-invalid');

                                            // Find or create error element
                                            let errorEl = form.querySelector(`#${field}_feedback`);
                                            if (!errorEl) {
                                                errorEl = document.createElement('div');
                                                errorEl.id = `${field}_feedback`;
                                                errorEl.className = 'invalid-feedback';
                                                input.parentNode.appendChild(errorEl);
                                            }

                                            errorEl.textContent = data.errors[field][0];
                                            errorEl.style.display = 'block';
                                        }
                                    });
                                }

                                // Display general error message
                                errorMessage.textContent = data.message || 'There was an error processing your request.';
                                errorMessage.style.display = 'block';
                            }
                        })
                        .catch(error => {
                            // Handle unexpected errors
                            formMessage.style.display = 'block';
                            errorMessage.textContent = 'An unexpected error occurred. Please try again.';
                            errorMessage.style.display = 'block';
                            console.error('Form submission error:', error);
                        })
                        .finally(() => {
                            // Reset button state
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnText;
                        });
                });
            }
        });
    </script>
@endif