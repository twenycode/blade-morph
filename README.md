# Laravel BladeKit

[![Latest Version on Packagist](https://img.shields.io/packagist/v/twenycode/laravel-bladekit.svg?style=flat-square)](https://packagist.org/packages/twenycode/laravel-bladekit)
[![Total Downloads](https://img.shields.io/packagist/dt/twenycode/laravel-bladekit.svg?style=flat-square)](https://packagist.org/packages/twenycode/laravel-bladekit)
[![License](https://img.shields.io/packagist/l/twenycode/laravel-bladekit.svg?style=flat-square)](https://packagist.org/packages/twenycode/laravel-bladekit)

A comprehensive set of Laravel Blade components to accelerate your UI development. Built on top of Bootstrap 5, Laravel BladeKit provides reusable, customizable components for common UI elements.

## Features

- **60+ Ready-to-use Components** - Everything from forms to navigation to tables
- **Bootstrap 5 Integration** - Modern, responsive design out of the box
- **Fully Customizable** - Extend or override any component
- **Laravel Integration** - Works seamlessly with Laravel's Blade templating
- **Form Validation** - Built-in error handling and validation state display
- **Interactive Components** - Dropdowns, tabs, accordions, modals, and more
- **Consistent API** - Intuitive naming and parameters across all components

## Installation

You can install the package via composer:

```bash
composer require twenycode/laravel-bladekit
```

The package will automatically register its service provider.

## Publishing Resources (Optional)

```bash
# Publish configuration
php artisan vendor:publish --provider="TwenyCode\LaravelBladeKit\TwenyLaravelBladeKitServiceProvider" --tag="tweny-bladekit-config"

# Publish views for customization
php artisan vendor:publish --provider="TwenyCode\LaravelBladeKit\TwenyLaravelBladeKitServiceProvider" --tag="tweny-bladekit-views"
```

## Quick Start

Once installed, you can start using Laravel BladeKit components in your Blade views:

```blade
<x-card card-title="Registration Form">
    <x-form action="{{ route('register') }}" has-files="true">
        <x-form-group name="name" label="Name" required>
            <x-input name="name" placeholder="Enter your name" />
        </x-form-group>
        
        <x-form-group name="email" label="Email" required>
            <x-email name="email" placeholder="Enter your email" />
        </x-form-group>
        
        <x-form-group name="password" label="Password" required>
            <x-password name="password" />
        </x-form-group>
        
        <x-form-group name="password_confirmation" label="Confirm Password" required>
            <x-password name="password_confirmation" />
        </x-form-group>
        
        <x-button type="submit" label="Register" color="primary" />
    </x-form>
</x-card>
```

## Available Components

### Buttons

- `x-button` - Standard button with various styles and states
- `x-button-group` - Group of related buttons
- `x-delete` - Delete button with confirmation dialog

### Layout Components

- `x-card` - Card container with optional header, title, and buttons
- `x-alert` - Alert box for messages and notifications
- `x-modal` - Modal dialog with customizable header and footer
- `x-toast` - Toast notification for temporary messages
- `x-accordion` - Collapsible accordion container
- `x-accordion-item` - Individual accordion panel
- `x-tab` - Tabbed interface container
- `x-tab-content` - Individual tab panel content
- `x-progress` - Progress bar with various styles and states

### Form Components

- `x-form` - Form container with CSRF protection and method spoofing
- `x-form-group` - Form group with label and error handling
- `x-error` - Form field error message
- `x-ajax-error` - AJAX-specific error message

### Form Elements

- `x-label` - Form label with optional required indicator
- `x-input` - Text input field with validation support
- `x-password` - Password input field
- `x-email` - Email input field
- `x-textarea` - Multi-line text area
- `x-checkbox` - Checkbox input
- `x-radio` - Radio button input
- `x-select` - Dropdown select with option group support
- `x-multi-select` - Multi-select dropdown
- `x-file-upload` - File upload with preview support
- `x-pick-date` - Date picker
- `x-toggle-switch` - Toggle switch input

### Navigation

- `x-nav-link` - Navigation link with active state detection
- `x-nav-modal` - Navigation link that opens a modal
- `x-dropdown` - Dropdown menu
- `x-dropdown-item` - Dropdown menu item
- `x-breadcrumb` - Breadcrumb navigation
- `x-pagination` - Pagination controls

### Tables

- `x-table` - Responsive table with sorting and searching
- `x-table-head` - Table header cell with sorting support
- `x-table-body` - Table body container
- `x-table-row` - Table row with optional linking
- `x-table-cell` - Table cell with alignment options

## Component Examples

### Button Components

```blade
<!-- Basic button -->
<x-button label="Click Me" />

<!-- Button with icon and color -->
<x-button 
    label="Save Changes" 
    icon="fas fa-save" 
    color="primary" 
/>

<!-- Loading state button -->
<x-button 
    label="Processing" 
    loading="true" 
    loading-text="Please wait..." 
/>

<!-- Button group -->
<x-button-group>
    <x-button label="Left" />
    <x-button label="Middle" />
    <x-button label="Right" />
</x-button-group>

<!-- Delete button with confirmation -->
<x-delete 
    action="{{ route('users.destroy', $user) }}" 
    label="Delete User" 
/>
```

### Form Components

```blade
<x-form action="{{ route('users.store') }}" has-files="true">
    <div class="row">
        <div class="col-md-6">
            <x-form-group name="first_name" label="First Name" required>
                <x-input name="first_name" placeholder="Enter first name" />
            </x-form-group>
        </div>
        <div class="col-md-6">
            <x-form-group name="last_name" label="Last Name" required>
                <x-input name="last_name" placeholder="Enter last name" />
            </x-form-group>
        </div>
    </div>
    
    <x-form-group name="email" label="Email Address" required>
        <x-email name="email" placeholder="Enter email address" />
    </x-form-group>
    
    <x-form-group name="role" label="Role">
        <x-select 
            name="role" 
            :options="['admin' => 'Administrator', 'user' => 'User']" 
            placeholder="Select role" 
        />
    </x-form-group>
    
    <x-form-group name="permissions" label="Permissions">
        <x-multi-select 
            name="permissions" 
            :options="['create' => 'Create', 'read' => 'Read', 'update' => 'Update', 'delete' => 'Delete']" 
        />
    </x-form-group>
    
    <x-form-group name="profile_picture" label="Profile Picture">
        <x-file-upload 
            name="profile_picture" 
            accept="image/*" 
            :max-size="2048" 
            preview="true" 
        />
    </x-form-group>
    
    <x-form-group name="active" label="Status">
        <x-toggle-switch name="active" label-on="Active" label-off="Inactive" checked />
    </x-form-group>
    
    <div class="mt-3">
        <x-button type="submit" label="Save" color="primary" />
        <x-button type="button" label="Cancel" color="secondary" />
    </div>
</x-form>
```

### Layout Components

```blade
<!-- Card -->
<x-card card-title="User Profile" card-buttons='<x-button label="Edit" color="primary" size="sm" />'>
    <p>Card content goes here...</p>
</x-card>

<!-- Modal -->
<x-button label="Open Modal" data-bs-toggle="modal" data-bs-target="#exampleModal" />

<x-modal id="exampleModal" modal-title="Example Modal">
    <p>Modal content goes here...</p>
    
    <x-slot name="modalFooter">
        <x-button type="button" color="secondary" data-bs-dismiss="modal">Close</x-button>
        <x-button type="button" color="primary">Save changes</x-button>
    </x-slot>
</x-modal>

<!-- Accordion -->
<x-accordion id="accordionExample">
    <x-accordion-item accordion-id="accordionExample" title="Item 1" open>
        <p>First accordion content...</p>
    </x-accordion-item>
    
    <x-accordion-item accordion-id="accordionExample" title="Item 2">
        <p>Second accordion content...</p>
    </x-accordion-item>
</x-accordion>

<!-- Progress Bar -->
<x-progress value="75" color="success" show-label />
```

### Navigation Components

```blade
<!-- Breadcrumb -->
<x-breadcrumb :items="[
    ['url' => route('dashboard'), 'label' => 'Dashboard'],
    ['url' => route('users.index'), 'label' => 'Users'],
    'Create User'
]" />

<!-- Tabs -->
<x-tab :tabs="[
    'personal' => ['label' => 'Personal Info', 'icon' => 'fas fa-user'],
    'account' => ['label' => 'Account', 'icon' => 'fas fa-key'],
    'preferences' => ['label' => 'Preferences', 'icon' => 'fas fa-cog']
]">
    <x-tab-content tab-id="{{ $tabs->id }}" id="personal" active="true">
        <p>Personal information content...</p>
    </x-tab-content>
    
    <x-tab-content tab-id="{{ $tabs->id }}" id="account">
        <p>Account information content...</p>
    </x-tab-content>
    
    <x-tab-content tab-id="{{ $tabs->id }}" id="preferences">
        <p>Preferences content...</p>
    </x-tab-content>
</x-tab>

<!-- Dropdown -->
<x-dropdown label="Actions" icon="fas fa-cog" color="primary">
    <x-dropdown-item href="{{ route('users.show', $user) }}">View</x-dropdown-item>
    <x-dropdown-item href="{{ route('users.edit', $user) }}">Edit</x-dropdown-item>
    <x-dropdown-item divider />
    <x-dropdown-item href="#" icon="fas fa-trash" class="text-danger">Delete</x-dropdown-item>
</x-dropdown>
```

### Table Component

```blade
<x-table striped hover responsive searchable sortable>
    <x-slot name="thead">
        <x-table-head sortable>ID</x-table-head>
        <x-table-head sortable>Name</x-table-head>
        <x-table-head sortable>Email</x-table-head>
        <x-table-head sortable="false" align="center">Actions</x-table-head>
    </x-slot>
    
    <x-table-body>
        @foreach($users as $user)
            <x-table-row>
                <x-table-cell>{{ $user->id }}</x-table-cell>
                <x-table-cell>{{ $user->name }}</x-table-cell>
                <x-table-cell>{{ $user->email }}</x-table-cell>
                <x-table-cell align="center">
                    <x-button-group size="sm">
                        <x-button type="button" icon="fas fa-eye" color="primary" size="sm" />
                        <x-button type="button" icon="fas fa-edit" color="warning" size="sm" />
                        <x-delete action="{{ route('users.destroy', $user) }}" icon="fas fa-trash" color="danger" size="sm" />
                    </x-button-group>
                </x-table-cell>
            </x-table-row>
        @endforeach
    </x-table-body>
    
    <div class="mt-3">
        <x-pagination :collection="$users" align="end" with-text />
    </div>
</x-table>
```

## Customization

### Extending Components

You can extend any component to modify its behavior:

```php
namespace App\View\Components;

use TwenyCode\LaravelBladeKit\Components\Button\Button as BaseButton;

class CustomButton extends BaseButton
{
    public function buttonClass(): string
    {
        // Add your custom logic
        $classes = parent::buttonClass();
        $classes .= ' my-custom-class';
        
        return $classes;
    }
}
```

Then register your custom component in your `AppServiceProvider`:

```php
use Illuminate\Support\Facades\Blade;
use App\View\Components\CustomButton;

public function boot()
{
    Blade::component('custom-button', CustomButton::class);
}
```

### Overriding Views

After publishing the views, you can modify them in your `resources/views/vendor/tweny-bladekit` directory.

## Configuration

You can customize the default styles and component registration in the `config/tweny-bladekit.php` file:

```php
// Example: Customizing button styles
'styles' => [
    'button' => [
        'base' => 'btn',
        'primary' => 'btn-custom-primary', // Override primary button class
        'secondary' => 'btn-secondary',
        // ...
    ],
],
```

## Requirements

- PHP 8.0+
- Laravel 8.0+
- Bootstrap 5 (for default styling)

## Credits

- [TWENY LIMITED](https://tweny.co.tz)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.