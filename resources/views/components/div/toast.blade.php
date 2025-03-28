<div
        id="{{ $id }}"
        {{ $attributes->merge(['class' => $toastClass()]) }}
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
        data-bs-autohide="{{ $autohide ? 'true' : 'false' }}"
        data-bs-delay="{{ $delay }}"
>
    <div class="toast-header">
        @if($icon)
            <i class="{{ $icon }} me-2"></i>
        @endif
        <strong class="me-auto">{{ $title }}</strong>
        @if($subtitle)
            <small>{{ $subtitle }}</small>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        {{ $slot }}
    </div>
</div>

@once
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all toasts
            const toastElList = document.querySelectorAll('.toast');
            toastElList.forEach(toastEl => {
                const toast = new bootstrap.Toast(toastEl);

                // Show toast by default when added to DOM
                toast.show();
            });

            // Create toast containers if not exist
            const positions = [
                'top-0 end-0',
                'top-0 start-0',
                'top-0 start-50 translate-middle-x',
                'bottom-0 end-0',
                'bottom-0 start-0',
                'bottom-0 start-50 translate-middle-x'
            ];

            positions.forEach(position => {
                if (!document.querySelector(`.toast-container.${position.replace(' ', '.')}`)) {
                    const container = document.createElement('div');
                    container.className = `toast-container position-fixed ${position} p-3`;
                    document.body.appendChild(container);
                }
            });

            // Function to create and show toast dynamically
            window.showToast = function(options) {
                const defaults = {
                    title: 'Notification',
                    message: '',
                    subtitle: null,
                    position: 'top-right',
                    color: null,
                    autohide: true,
                    delay: 5000,
                    icon: null
                };

                const settings = { ...defaults, ...options };

                // Convert position name to class
                const positions = {
                    'top-right': 'top-0 end-0',
                    'top-left': 'top-0 start-0',
                    'top-center': 'top-0 start-50 translate-middle-x',
                    'bottom-right': 'bottom-0 end-0',
                    'bottom-left': 'bottom-0 start-0',
                    'bottom-center': 'bottom-0 start-50 translate-middle-x'
                };

                const positionClass = positions[settings.position] || positions['top-right'];

                // Find or create toast container
                let container = document.querySelector(`.toast-container.${positionClass.replace(/ /g, '.')}`);
                if (!container) {
                    container = document.createElement('div');
                    container.className = `toast-container position-fixed ${positionClass} p-3`;
                    document.body.appendChild(container);
                }

                // Create toast
                const toastId = 'toast_' + Math.random().toString(36).substr(2, 9);
                const toast = document.createElement('div');
                toast.id = toastId;
                toast.className = 'toast';
                toast.setAttribute('role', 'alert');
                toast.setAttribute('aria-live', 'assertive');
                toast.setAttribute('aria-atomic', 'true');
                toast.setAttribute('data-bs-autohide', settings.autohide.toString());
                toast.setAttribute('data-bs-delay', settings.delay.toString());

                // Add color class
                if (settings.color) {
                    toast.classList.add(`bg-${settings.color}`);
                    if (['primary', 'secondary', 'success', 'danger', 'dark'].includes(settings.color)) {
                        toast.classList.add('text-white');
                    }
                }

                // Create header
                const header = document.createElement('div');
                header.className = 'toast-header';

                if (settings.icon) {
                    const icon = document.createElement('i');
                    icon.className = `${settings.icon} me-2`;
                    header.appendChild(icon);
                }

                const title = document.createElement('strong');
                title.className = 'me-auto';
                title.textContent = settings.title;
                header.appendChild(title);

                if (settings.subtitle) {
                    const subtitle = document.createElement('small');
                    subtitle.textContent = settings.subtitle;
                    header.appendChild(subtitle);
                }

                const closeBtn = document.createElement('button');
                closeBtn.type = 'button';
                closeBtn.className = 'btn-close';
                closeBtn.setAttribute('data-bs-dismiss', 'toast');
                closeBtn.setAttribute('aria-label', 'Close');
                header.appendChild(closeBtn);

                // Create body
                const body = document.createElement('div');
                body.className = 'toast-body';
                body.innerHTML = settings.message;

                // Assemble toast
                toast.appendChild(header);
                toast.appendChild(body);

                // Add to container
                container.appendChild(toast);

                // Show toast
                const bsToast = new bootstrap.Toast(toast);
                bsToast.show();

                // Return toast instance for advanced usage
                return { id: toastId, instance: bsToast };
            };
        });
    </script>
@endonce