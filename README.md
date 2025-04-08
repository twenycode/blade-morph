# Laravel BladeKit

[![Latest Version on Packagist](https://img.shields.io/packagist/v/twenycode/laravel-bladekit.svg?style=flat-square)](https://packagist.org/packages/twenycode/laravel-bladekit)
[![Total Downloads](https://img.shields.io/packagist/dt/twenycode/laravel-bladekit.svg?style=flat-square)](https://packagist.org/packages/twenycode/laravel-bladekit)
[![License](https://img.shields.io/packagist/l/twenycode/laravel-bladekit.svg?style=flat-square)](https://packagist.org/packages/twenycode/laravel-bladekit)

A comprehensive set of Laravel Blade components to accelerate your UI development. Built on Bootstrap 5, Laravel BladeKit provides 30+ reusable, customizable components for common UI elements to streamline your development workflow. Eliminate repetitive UI code and create consistent, beautiful interfaces with minimal effort.

![Laravel BladeKit Preview](https://via.placeholder.com/1200x600?text=Laravel+BladeKit)

## Table of Contents

- [Features](#-features)
- [Installation](#-installation)
- [Configuration](#️-configuration)
- [Quick Start](#-quick-start)
- [Component Documentation](#-component-documentation)
    - [Button Components](#button-components)
    - [Layout Components](#layout-components)
    - [Form Components](#form-components)
    - [Navigation Components](#navigation-components)
    - [Table Components](#table-components)
- [Advanced Usage](#-advanced-usage)
    - [AJAX Form Support](#ajax-form-support)
    - [Validation Integration](#validation-integration)
    - [Component Customization](#component-customization)
- [Requirements](#-requirements)
- [Contributing](#-contributing)
- [License](#-license)
- [Credits](#-credits)

## 🚀 Features

- **30+ Ready-to-use Components** - Everything from buttons to complex data tables
- **Consistent API** - Intuitive naming and parameters across all components
- **Bootstrap 5 Integration** - Modern, responsive design out of the box
- **Form Validation** - Built-in error handling and validation state display
- **Minimal Configuration** - Works seamlessly with Laravel's Blade templating
- **Fully Customizable** - Extend or override any component as needed
- **Interactive Components** - Dropdowns, tabs, accordions, modals, and more

## 📦 Installation

### 1. Install Laravel BladeKit

Install the package via composer:

```bash
composer require twenycode/laravel-bladekit
```

This will automatically register the service provider.

### 2. Install Bootstrap 5 via Laravel UI

```bash
php artisan ui bootstrap
```

Then compile the assets:

```bash
npm install
npm run dev
```

## ⚙️ Configuration

### Bootstrap Setup

Ensure Bootstrap 5 is properly set up in your Laravel application. Your main layout file should include Bootstrap CSS and JS:

```html
<!-- In your layout file (e.g., app.blade.php) -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
```

For Font Awesome icons (used in many examples), include Font Awesome in your project:

```html
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
```

### BladeKit Configuration (Optional)

You can publish the configuration file to customize default styles and component registrations:

```bash
# Publish configuration
php artisan vendor:publish --tag="tweny-bladekit-config"
```

To customize the component views:

```bash
# Publish views for customization
php artisan vendor:publish --tag="tweny-bladekit-views"
```

## 🎯 Quick Start

Once installed, you can immediately start using Laravel BladeKit components in your Blade views:

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

## 📚 Component Documentation

### Button Components

#### `x-button`

A versatile button component with support for various styles, states, and icons.

**Parameters:**
- `type` (string, default: 'button'): Button type (button, submit, reset)
- `id` (string, optional): Button ID attribute
- `label` (string, default: 'Submit'): Button text
- `color` (string, default: 'primary'): Bootstrap color (primary, secondary, success, danger, warning, info, light, dark)
- `size` (string, optional): Button size (sm, lg)
- `outline` (boolean, default: false): Use outline style
- `loading` (boolean, default: false): Show loading state
- `loadingText` (string, optional): Text to show when loading
- `icon` (string, optional): Icon class (e.g., 'fas fa-save')
- `iconPosition` (string, default: 'left'): Icon position ('left' or 'right')

**Examples:**

```blade
<!-- Basic button -->
<x-button label="Click Me" />

<!-- Submit button with success color -->
<x-button type="submit" label="Save" color="success" />

<!-- Small outline button with icon -->
<x-button 
    label="Add Item" 
    icon="fas fa-plus" 
    color="primary" 
    size="sm"
    outline="true"
/>

<!-- Loading state button -->
<x-button 
    label="Submit" 
    loading="true" 
    loading-text="Processing..." 
    type="submit"
/>
```

#### `x-button-group`

Groups multiple buttons together in a horizontal or vertical layout.

**Parameters:**
- `size` (string, default: ''): Button group size (sm, lg)
- `vertical` (boolean, default: false): Use vertical layout
- `toolbar` (boolean, default: false): Create a button toolbar

**Examples:**

```blade
<!-- Basic button group -->
<x-button-group>
    <x-button label="Left" />
    <x-button label="Middle" />
    <x-button label="Right" />
</x-button-group>

<!-- Vertical button group -->
<x-button-group vertical="true">
    <x-button label="Top" />
    <x-button label="Middle" />
    <x-button label="Bottom" />
</x-button-group>

<!-- Small-sized button group -->
<x-button-group size="sm">
    <x-button label="Small 1" />
    <x-button label="Small 2" />
</x-button-group>

<!-- Action buttons group -->
<x-button-group>
    <x-button icon="fas fa-eye" color="info" />
    <x-button icon="fas fa-edit" color="warning" />
    <x-button icon="fas fa-trash" color="danger" />
</x-button-group>
```

#### `x-delete`

A specialized button for delete actions with built-in confirmation dialog.

**Parameters:**
- `action` (string): Form action URL for delete
- `label` (string, default: '<i class="fa fa-trash-alt"></i> Delete'): Button label
- `confirmMessage` (string, default: 'Do you want to delete this item?'): Confirmation message

**Examples:**

```blade
<!-- Basic delete button -->
<x-delete action="{{ route('users.destroy', $user) }}" />

<!-- Customized delete button -->
<x-delete 
    action="{{ route('posts.destroy', $post) }}"
    label="Delete Post"
    confirm-message="Are you sure you want to delete this post? This action cannot be undone."
    class="btn-sm"
/>

<!-- Icon-only delete button -->
<x-delete 
    action="{{ route('comments.destroy', $comment) }}"
    label='<i class="fas fa-trash"></i>'
    class="btn-sm btn-outline-danger"
/>
```

#### `x-dropleft`

Creates a dropdown button with left-aligned menu.

**Parameters:**
- `icon` (string, default: 'fas fa-cog'): Button icon
- `align` (string, default: 'dropleft'): Dropdown alignment

**Examples:**

```blade
<!-- Basic dropleft -->
<x-dropleft>
    <a class="dropdown-item" href="#">Action 1</a>
    <a class="dropdown-item" href="#">Action 2</a>
</x-dropleft>

<!-- Custom icon -->
<x-dropleft icon="fas fa-ellipsis-v">
    <a class="dropdown-item" href="#">Edit</a>
    <a class="dropdown-item" href="#">Delete</a>
</x-dropleft>
```

### Layout Components

#### `x-card`

A Bootstrap card component with optional header, footer, and action buttons.

**Parameters:**
- `cardTitle` (string, optional): Card header title
- `cardButtons` (string, optional): HTML for card action buttons

**Examples:**

```blade
<!-- Basic card -->
<x-card>
    <p>This is a basic card with content.</p>
</x-card>

<!-- Card with title -->
<x-card card-title="User Profile">
    <p>Card content goes here...</p>
</x-card>

<!-- Card with title and action buttons -->
<x-card 
    card-title="Product Details" 
    card-buttons='<x-button label="Edit" size="sm" /><x-button label="Delete" color="danger" size="sm" class="ms-2" />'
>
    <p>Product information goes here...</p>
</x-card>

<!-- Card with footer -->
<x-card card-title="Recent Activity">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Activity 1</li>
        <li class="list-group-item">Activity 2</li>
    </ul>
    
    <x-slot name="footer">
        <small class="text-muted">Last updated 3 mins ago</small>
    </x-slot>
</x-card>
```

#### `x-alert`

Displays alert messages with various styles and optional dismissibility.

**Parameters:**
- `type` (string, default: 'info'): Alert type (primary, secondary, success, danger, warning, info, light, dark)
- `dismissible` (boolean, default: false): Allow alert to be dismissed
- `icon` (string, optional): Icon class

**Examples:**

```blade
<!-- Basic alert -->
<x-alert>
    This is a default info alert.
</x-alert>

<!-- Alert with type -->
<x-alert type="success">
    Your changes have been saved successfully!
</x-alert>

<!-- Dismissible alert -->
<x-alert type="warning" dismissible="true">
    Your account will expire in 3 days.
</x-alert>

<!-- Alert with icon -->
<x-alert type="danger" icon="fas fa-exclamation-triangle">
    <strong>Error!</strong> Something went wrong.
</x-alert>
```

#### `x-modal`

Bootstrap modal dialog with customizable header, body, and footer.

**Parameters:**
- `id` (string): Modal ID
- `modalTitle` (string, optional): Modal header title
- `modalFooter` (string, optional): Modal footer content
- `size` (string, optional): Modal size (sm, lg, xl)
- `centered` (boolean, default: false): Vertically center modal
- `scrollable` (boolean, default: false): Enable scrollable modal body

**Examples:**

```blade
<!-- Basic modal -->
<!-- Button to trigger modal -->
<x-button label="Open Modal" data-bs-toggle="modal" data-bs-target="#exampleModal" />

<!-- Modal -->
<x-modal id="exampleModal" modal-title="Example Modal">
    <p>Modal content goes here...</p>
</x-modal>

<!-- Modal with footer -->
<x-modal id="confirmModal" modal-title="Confirm Action">
    <p>Are you sure you want to proceed?</p>
    
    <x-slot name="modalFooter">
        <x-button type="button" color="secondary" data-bs-dismiss="modal">Cancel</x-button>
        <x-button type="button" color="primary">Confirm</x-button>
    </x-slot>
</x-modal>

<!-- Large centered modal -->
<x-modal 
    id="largeModal" 
    modal-title="Large Modal" 
    size="lg"
    centered="true"
>
    <p>This is a large, centered modal dialog.</p>
</x-modal>
```

#### `x-accordion`

Collapsible content panels for displaying information in a limited space.

**Parameters:**
- `id` (string, optional): Accordion ID
- `items` (array, optional): Array of accordion items
- `flush` (boolean, default: false): Use borderless accordion
- `alwaysOpen` (boolean, default: false): Allow multiple items to be open

**Examples:**

```blade
<!-- Basic accordion -->
<x-accordion id="basicAccordion">
    <x-accordion-item accordion-id="basicAccordion" title="Section 1" open="true">
        <p>Content for section 1...</p>
    </x-accordion-item>
    
    <x-accordion-item accordion-id="basicAccordion" title="Section 2">
        <p>Content for section 2...</p>
    </x-accordion-item>
</x-accordion>

<!-- Flush accordion -->
<x-accordion id="flushAccordion" flush="true">
    <x-accordion-item accordion-id="flushAccordion" title="Item 1">
        <p>Content for item 1...</p>
    </x-accordion-item>
    
    <x-accordion-item accordion-id="flushAccordion" title="Item 2">
        <p>Content for item 2...</p>
    </x-accordion-item>
</x-accordion>

<!-- Accordion with array items -->
<x-accordion 
    id="arrayAccordion"
    :items="[
        ['title' => 'First Item', 'content' => 'Content for first item...'],
        ['title' => 'Second Item', 'content' => 'Content for second item...', 'icon' => 'fas fa-star']
    ]"
/>
```

#### `x-tab`

Tabbed interface with support for icons and custom content.

**Parameters:**
- `id` (string, optional): Tab container ID
- `tabs` (array, optional): Array of tab definitions
- `activeTab` (string, optional): Key of initially active tab
- `type` (string, default: 'tabs'): Tab style (tabs, pills, underline)
- `alignment` (string, default: 'left'): Tab alignment (left, center, right, justified)
- `vertical` (boolean, default: false): Use vertical tabs
- `fade` (boolean, default: true): Use fade animation

**Examples:**

```blade
<!-- Basic tabs -->
<x-tab :tabs="[
    'home' => 'Home',
    'profile' => 'Profile',
    'messages' => 'Messages'
]">
    <x-tab-content tab-id="{{ $tabs->id }}" id="home" active="true">
        <p>Home tab content...</p>
    </x-tab-content>
    
    <x-tab-content tab-id="{{ $tabs->id }}" id="profile">
        <p>Profile tab content...</p>
    </x-tab-content>
    
    <x-tab-content tab-id="{{ $tabs->id }}" id="messages">
        <p>Messages tab content...</p>
    </x-tab-content>
</x-tab>

<!-- Pills style tabs -->
<x-tab 
    :tabs="[
        'info' => 'Information',
        'specs' => 'Specifications',
        'reviews' => 'Reviews'
    ]"
    type="pills"
>
    <!-- Tab content -->
</x-tab>

<!-- Tabs with icons -->
<x-tab 
    :tabs="[
        'account' => ['label' => 'Account', 'icon' => 'fas fa-user'],
        'security' => ['label' => 'Security', 'icon' => 'fas fa-lock'],
        'billing' => ['label' => 'Billing', 'icon' => 'fas fa-credit-card']
    ]"
>
    <!-- Tab content -->
</x-tab>
```

#### `x-progress`

Creates progress bars with various styles and options.

**Parameters:**
- `value` (int|float, default: 0): Current progress value
- `min` (int|float, default: 0): Minimum value
- `max` (int|float, default: 100): Maximum value
- `color` (string, optional): Progress bar color
- `striped` (boolean, default: false): Use striped pattern
- `animated` (boolean, default: false): Animate stripes
- `showLabel` (boolean, default: false): Show percentage label
- `labelFormat` (string, default: '%d%%'): Label format
- `height` (string, optional): Progress bar height

**Examples:**

```blade
<!-- Basic progress bar -->
<x-progress value="60" />

<!-- Progress bar with label -->
<x-progress value="50" show-label="true" color="success" />

<!-- Striped animated progress bar -->
<x-progress value="85" striped="true" animated="true" color="warning" />

<!-- Custom height progress bar -->
<x-progress value="30" height="5px" />
```

### Form Components

#### `x-form`

Form container with CSRF protection, method spoofing, and optional AJAX support.

**Parameters:**
- `action` (string): Form action URL
- `method` (string, default: 'POST'): Form method
- `hasFiles` (boolean, default: false): Enable file uploads
- `ajax` (boolean, default: false): Use AJAX submission
- `id` (string, optional): Form ID
- `submitLabel` (string, optional): Text for submit button
- `cancelLabel` (string, optional): Text for cancel button
- `cancelUrl` (string, optional): URL for cancel button
- `inline` (boolean, default: false): Use inline form layout
- `novalidate` (boolean, default: false): Disable browser validation

**Examples:**

```blade
<!-- Basic form -->
<x-form action="{{ route('users.store') }}">
    <!-- Form fields -->
    <x-button type="submit" label="Save" />
</x-form>

<!-- Form with file uploads -->
<x-form action="{{ route('profile.update') }}" method="PUT" has-files="true">
    <!-- Form fields including file upload -->
    <x-button type="submit" label="Update Profile" />
</x-form>

<!-- Form with built-in buttons -->
<x-form 
    action="{{ route('products.store') }}"
    submit-label="Create Product"
    cancel-label="Cancel"
    cancel-url="{{ route('products.index') }}"
>
    <!-- Form fields -->
</x-form>

<!-- AJAX form -->
<x-form 
    action="{{ route('newsletter.subscribe') }}"
    ajax="true"
    id="newsletter-form"
>
    <!-- Form fields -->
    <x-button type="submit" label="Subscribe" />
</x-form>
```

#### `x-form-group`

Wraps form elements with labels and error handling.

**Parameters:**
- `name` (string): Field name
- `label` (string, optional): Field label
- `required` (boolean, default: false): Mark field as required
- `helpText` (string, optional): Help text below field
- `id` (string, optional): Input field ID
- `bag` (string, default: 'default'): Error bag name
- `horizontal` (boolean, default: false): Use horizontal layout
- `labelCol` (string, default: 'col-md-3'): Label column class
- `fieldCol` (string, default: 'col-md-9'): Field column class

**Examples:**

```blade
<!-- Basic form group -->
<x-form-group name="title" label="Post Title">
    <x-input name="title" />
</x-form-group>

<!-- Required field -->
<x-form-group name="email" label="Email Address" required="true">
    <x-email name="email" />
</x-form-group>

<!-- Form group with help text -->
<x-form-group 
    name="password" 
    label="Password" 
    required="true"
    help-text="Password must be at least 8 characters long."
>
    <x-password name="password" />
</x-form-group>

<!-- Horizontal form group -->
<x-form-group 
    name="address" 
    label="Street Address"
    horizontal="true"
>
    <x-input name="address" />
</x-form-group>
```

#### `x-input`

Text input field with validation support.

**Parameters:**
- `name` (string): Input name
- `id` (string, optional): Input ID
- `type` (string, default: 'text'): Input type
- `value` (mixed, optional): Input value
- `required` (boolean, default: false): Required field
- `autofocus` (boolean, default: false): Autofocus on field
- `placeholder` (string, optional): Input placeholder

**Examples:**

```blade
<!-- Basic text input -->
<x-input name="name" />

<!-- Input with placeholder -->
<x-input name="search" placeholder="Search..." />

<!-- Number input with min/max -->
<x-input 
    name="quantity" 
    type="number" 
    value="1" 
    min="1" 
    max="10" 
/>

<!-- Required input with default value -->
<x-input 
    name="username" 
    value="{{ $user->username }}" 
    required="true" 
/>
```

#### `x-select`

Dropdown select control with single or multiple selection.

**Parameters:**
- `name` (string): Select name
- `options` (array): Array of options (key => value)
- `selected` (mixed, optional): Selected value(s)
- `id` (string, optional): Select ID
- `placeholder` (string, optional): Placeholder text
- `multiple` (boolean, default: false): Allow multiple selections
- `valueField` (string, optional): Field to use as option value
- `labelField` (string, optional): Field to use as option label
- `required` (boolean, default: false): Required field

**Examples:**

```blade
<!-- Basic select -->
<x-select 
    name="country" 
    :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" 
/>

<!-- Select with placeholder -->
<x-select 
    name="state" 
    :options="$states" 
    placeholder="Select a state" 
/>

<!-- Select with pre-selected value -->
<x-select 
    name="category" 
    :options="$categories" 
    selected="{{ $post->category_id }}" 
/>

<!-- Multiple select -->
<x-select 
    name="tags[]" 
    :options="$tags" 
    multiple="true"
    :selected="$post->tags->pluck('id')->toArray()"
/>

<!-- Select with option groups -->
<x-select 
    name="product" 
    :options="[
        ['label' => 'Electronics', 'options' => ['laptop' => 'Laptop', 'phone' => 'Smartphone']],
        ['label' => 'Clothing', 'options' => ['shirt' => 'Shirt', 'pants' => 'Pants']]
    ]"
/>
```

#### `x-checkbox`

Checkbox input field.

**Parameters:**
- `name` (string): Checkbox name
- `id` (string, optional): Checkbox ID
- `checked` (boolean, default: false): Checked state
- `value` (string, default: ''): Checkbox value

**Examples:**

```blade
<!-- Basic checkbox -->
<x-checkbox name="remember" />

<!-- Checkbox with label -->
<div class="form-check">
    <x-checkbox name="agree" id="agree-terms" value="1" />
    <label class="form-check-label" for="agree-terms">
        I agree to the terms and conditions
    </label>
</div>

<!-- Pre-checked checkbox -->
<x-checkbox 
    name="subscribe" 
    checked="{{ $user->subscribed ? 'true' : 'false' }}" 
    value="yes" 
/>
```

#### `x-radio`

Radio button input.

**Parameters:**
- `name` (string): Radio name
- `value` (string): Radio value
- `id` (string, optional): Radio ID
- `checked` (boolean, default: false): Checked state
- `inline` (boolean, default: false): Display inline
- `required` (boolean, default: false): Required field
- `disabled` (boolean, default: false): Disabled state

**Examples:**

```blade
<!-- Radio button -->
<x-radio name="gender" value="male" id="gender-male">Male</x-radio>

<!-- Radio group -->
<div class="mb-3">
    <label class="form-label d-block">Gender</label>
    
    <x-radio name="gender" value="male" id="gender-male">Male</x-radio>
    <x-radio name="gender" value="female" id="gender-female">Female</x-radio>
    <x-radio name="gender" value="other" id="gender-other">Other</x-radio>
</div>

<!-- Inline radio buttons -->
<div class="mb-3">
    <label class="form-label d-block">Contact Method</label>
    
    <x-radio name="contact" value="email" id="contact-email" inline="true">Email</x-radio>
    <x-radio name="contact" value="phone" id="contact-phone" inline="true">Phone</x-radio>
    <x-radio name="contact" value="mail" id="contact-mail" inline="true">Mail</x-radio>
</div>
```

#### `x-file-upload`

File input field with preview support.

**Parameters:**
- `name` (string): Input name
- `id` (string, optional): Input ID
- `accept` (string, optional): Accepted file types
- `multiple` (boolean, default: false): Allow multiple files
- `required` (boolean, default: false): Required field
- `preview` (boolean, default: false): Show file preview
- `previewUrl` (string, optional): URL of existing file for preview
- `placeholder` (string, default: 'Choose file...'): Placeholder text
- `maxFiles` (integer, optional): Maximum number of files
- `maxSize` (integer, optional): Maximum file size in KB
- `acceptedFileTypes` (array, optional): Array of accepted file extensions

**Examples:**

```blade
<!-- Basic file upload -->
<x-file-upload name="document" />

<!-- Image upload with preview -->
<x-file-upload 
    name="avatar" 
    accept="image/*" 
    preview="true" 
    preview-url="{{ $user->avatar_url }}" 
/>

<!-- Multiple file upload -->
<x-file-upload 
    name="photos[]" 
    multiple="true" 
    accept="image/jpeg,image/png" 
/>

<!-- File upload with size restriction -->
<x-file-upload 
    name="resume" 
    accept=".pdf,.doc,.docx" 
    max-size="5000" 
    accepted-file-types="['pdf', 'doc', 'docx']" 
/>
```

#### Other Form Components

- `x-email` - Email input field
- `x-password` - Password input field
- `x-textarea` - Multi-line text area
- `x-multi-select` - Multi-select dropdown
- `x-pick-date` - Date picker input
- `x-toggle-switch` - Toggle switch input

### Navigation Components

#### `x-nav-link`

Navigation link with active state detection.

**Parameters:**
- `href` (string): Link URL
- `label` (string): Link text
- `icon` (string, optional): Icon class
- `badge` (string, optional): Badge text
- `badgeColor` (string, default: 'primary'): Badge color
- `activeClass` (string, default: 'active'): Active state class
- `exact` (boolean, default: false): Exact path matching

**Examples:**

```blade
<!-- Basic nav link -->
<x-nav-link href="{{ route('home') }}" label="Home" />

<!-- Nav link with icon -->
<x-nav-link 
    href="{{ route('dashboard') }}" 
    label="Dashboard" 
    icon="fas fa-tachometer-alt" 
/>

<!-- Nav link with badge -->
<x-nav-link 
    href="{{ route('messages') }}" 
    label="Messages" 
    badge="5" 
    badge-color="danger" 
/>
```

#### `x-dropdown`

Dropdown menu for navigation.

**Parameters:**
- `id` (string, optional): Dropdown ID
- `label` (string, default: 'Dropdown'): Dropdown toggle text
- `icon` (string, optional): Icon class
- `alignment` (string, default: 'dropdown'): Dropdown alignment (dropdown, dropup, dropend, dropstart)
- `color` (string, default: 'secondary'): Button color
- `size` (string, optional): Button size
- `split` (boolean, default: false): Use split button
- `dark` (boolean, default: false): Use dark theme

**Examples:**

```blade
<!-- Basic dropdown -->
<x-dropdown label="Menu">
    <x-dropdown-item href="#">Action</x-dropdown-item>
    <x-dropdown-item href="#">Another action</x-dropdown-item>
    <x-dropdown-item divider />
    <x-dropdown-item href="#">Something else</x-dropdown-item>
</x-dropdown>

<!-- Dropdown with icon -->
<x-dropdown 
    label="User" 
    icon="fas fa-user" 
    color="primary"
>
    <x-dropdown-item href="{{ route('profile') }}">Profile</x-dropdown-item>
    <x-dropdown-item href="{{ route('settings') }}">Settings</x-dropdown-item>
    <x-dropdown-item divider />
    <x-dropdown-item href="{{ route('logout') }}">Logout</x-dropdown-item>
</x-dropdown>

<!-- Split button dropdown -->
<x-dropdown 
    label="Actions" 
    split="true" 
    color="success"
>
    <!-- Dropdown items -->
</x-dropdown>
```

#### `x-breadcrumb`

Breadcrumb navigation to show page hierarchy.

**Parameters:**
- `items` (array, optional): Array of breadcrumb items
- `divider` (string, default: '/'): Divider character
- `withBackground` (boolean, default: false): Add background

**Examples:**

```blade
<!-- Basic breadcrumb -->
<x-breadcrumb :items="[
    ['url' => route('home'), 'label' => 'Home'],
    ['url' => route('products.index'), 'label' => 'Products'],
    'Product Details'
]"
/>

<!-- Breadcrumb with background -->
<x-breadcrumb 
    :items="$breadcrumbs"
    with-background="true"
/>

<!-- Breadcrumb with custom divider -->
<x-breadcrumb 
    :items="[
        ['url' => route('dashboard'), 'label' => 'Dashboard'],
        ['url' => route('users.index'), 'label' => 'Users'],
        $user->name
    ]"
    divider=">"
/>
```

#### `x-pagination`

Pagination controls for collections.

**Parameters:**
- `collection`: The paginated collection
- `size` (string, default: ''): Pagination size (sm, lg)
- `withText` (boolean, default: true): Show pagination text
- `align` (string, default: 'center'): Alignment (start, center, end)
- `simple` (boolean, default: false): Use simple pagination

**Examples:**

```blade
<!-- Basic pagination -->
<x-pagination :collection="$users" />

<!-- Aligned pagination -->
<x-pagination 
    :collection="$products" 
    align="end" 
/>

<!-- Large-sized pagination -->
<x-pagination 
    :collection="$posts" 
    size="lg" 
/>

<!-- Simple pagination without text -->
<x-pagination 
    :collection="$comments" 
    simple="true" 
    with-text="false" 
/>
```

### Table Components

#### `x-table`

Responsive table with sorting and searching capabilities.

**Parameters:**
- `id` (string, optional): Table ID
- `thead` (string, optional): Table header content
- `collection` (object, optional): Paginated collection
- `striped` (boolean, default: false): Use striped rows
- `bordered` (boolean, default: false): Add borders
- `hover` (boolean, default: false): Add hover effect
- `small` (boolean, default: false): Use small table
- `responsive` (boolean, default: true): Make table responsive
- `responsiveBreakpoint` (string, optional): Responsive breakpoint (sm, md, lg, xl)
- `sortable` (boolean, default: false): Enable sorting
- `searchable` (boolean, default: false): Enable searching

**Examples:**

```blade
<!-- Basic table -->
<x-table>
    <x-slot name="thead">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </x-slot>
    
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
            </tr>
        @endforeach
    </tbody>
</x-table>

<!-- Styled table -->
<x-table striped hover bordered>
    <!-- Table content -->
</x-table>

<!-- Sortable and searchable table -->
<x-table 
    striped 
    hover 
    sortable 
    searchable 
    id="users-table"
>
    <x-slot name="thead">
        <x-table-head sortable>ID</x-table-head>
        <x-table-head sortable>Name</x-table-head>
        <x-table-head sortable>Email</x-table-head>
        <x-table-head sortable="false">Actions</x-table-head>
    </x-slot>
    
    <tbody>
        <!-- Table rows -->
    </tbody>
</x-table>

<!-- Table with collection and pagination -->
<x-table 
    :collection="$users" 
    striped 
    hover
>
    <!-- Table content -->
</x-table>
```

#### `x-table-head`

Table header cell with sorting support.

**Parameters:**
- `sortable` (boolean, default: true): Enable sorting on column
- `sortBy` (string, optional): Field to sort by
- `width` (string, optional): Column width
- `align` (string, optional): Text alignment (left, center, right)

**Examples:**

```blade
<!-- Basic table head -->
<x-table-head>Title</x-table-head>

<!-- Sortable table head -->
<x-table-head sortable sort-by="name">Name</x-table-head>

<!-- Non-sortable table head -->
<x-table-head sortable="false">Actions</x-table-head>

<!-- Aligned table head -->
<x-table-head align="center">Status</x-table-head>

<!-- Fixed width table head -->
<x-table-head width="150px">Created At</x-table-head>
```

#### Other Table Components

- `x-table-body` - Table body container
- `x-table-row` - Table row with optional linking
- `x-table-cell` - Table cell with alignment options

## 🔄 Advanced Usage

### AJAX Form Support

BladeKit provides built-in AJAX form handling. Ensure you have included jQuery in your application:

```html
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
```

Then use the AJAX form component:

```blade
<x-form 
    action="{{ route('contact.submit') }}"
    ajax="true"
    id="contactForm"
>
    <x-form-group name="name" label="Your Name">
        <x-input name="name" required />
    </x-form-group>
    
    <x-form-group name="email" label="Email Address">
        <x-email name="email" required />
    </x-form-group>
    
    <x-form-group name="message" label="Message">
        <x-textarea name="message" rows="5" required />
    </x-form-group>
    
    <x-button type="submit" label="Send Message" />
</x-form>
```

AJAX forms expect a JSON response with the following structure:

```php
return response()->json([
    'success' => true,
    'message' => 'Form submitted successfully!',
    'redirect' => route('home'), // Optional redirect URL
]);
```

For validation errors:

```php
return response()->json([
    'success' => false,
    'message' => 'Please correct the errors below.',
    'errors' => $validator->errors(),
]);
```

### Validation Integration

BladeKit automatically integrates with Laravel's validation system. When validation fails, error messages are displayed below the respective form fields:

```php
// In your controller
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
    
    // Process form submission...
}
```

### Component Customization

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

## 📋 Requirements

- PHP 8.0+
- Laravel 8.0+
- Bootstrap 5 (for default styling)
- Laravel UI package
- jQuery (for AJAX form functionality)
- Font Awesome (for icons used in components)

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## 👥 Credits

- [TWENY LIMITED](https://tweny.co.tz)
- [All Contributors](../../contributors)

## 📝 Advanced Usage Examples

### User Registration Form

```blade
<x-card card-title="Create Account">
    <x-form action="{{ route('register') }}" has-files="true">
        <div class="row">
            <div class="col-md-6">
                <x-form-group name="first_name" label="First Name" required>
                    <x-input name="first_name" placeholder="Enter first name" autofocus />
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
        
        <x-form-group name="password" label="Password" required help-text="Password must be at least 8 characters.">
            <x-password name="password" />
        </x-form-group>
        
        <x-form-group name="password_confirmation" label="Confirm Password" required>
            <x-password name="password_confirmation" />
        </x-form-group>
        
        <x-form-group name="avatar" label="Profile Picture">
            <x-file-upload 
                name="avatar" 
                accept="image/*" 
                preview="true" 
                max-size="2048"
            />
        </x-form-group>
        
        <div class="form-check mb-3">
            <x-checkbox name="terms" id="terms-check" required />
            <label class="form-check-label" for="terms-check">
                I agree to the <a href="{{ route('terms') }}" target="_blank">Terms of Service</a>
            </label>
        </div>
        
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('login') }}">Already have an account?</a>
            <x-button type="submit" label="Register" color="primary" />
        </div>
    </x-form>
</x-card>
```

### Product Management Dashboard

```blade
<x-card card-title="Product Management" card-buttons='<x-button label="Add Product" icon="fas fa-plus" color="success" data-bs-toggle="modal" data-bs-target="#addProductModal" />'>
    <x-table striped hover sortable searchable responsive>
        <x-slot name="thead">
            <x-table-head sortable sort-by="id" width="80px">ID</x-table-head>
            <x-table-head sortable sort-by="name">Product Name</x-table-head>
            <x-table-head sortable sort-by="category">Category</x-table-head>
            <x-table-head sortable sort-by="price" align="right">Price</x-table-head>
            <x-table-head sortable sort-by="stock" align="center">Stock</x-table-head>
            <x-table-head sortable sort-by="status" align="center">Status</x-table-head>
            <x-table-head sortable="false" align="center" width="150px">Actions</x-table-head>
        </x-slot>
        
        <x-table-body>
            @forelse($products as $product)
                <tr>
                    <x-table-cell>{{ $product->id }}</x-table-cell>
                    <x-table-cell>{{ $product->name }}</x-table-cell>
                    <x-table-cell>{{ $product->category->name }}</x-table-cell>
                    <x-table-cell align="right">${{ number_format($product->price, 2) }}</x-table-cell>
                    <x-table-cell align="center">{{ $product->stock }}</x-table-cell>
                    <x-table-cell align="center">
                        <span class="badge bg-{{ $product->is_active ? 'success' : 'danger' }}">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </x-table-cell>
                    <x-table-cell align="center">
                        <x-button-group size="sm">
                            <x-button icon="fas fa-eye" color="info" size="sm" href="{{ route('products.show', $product) }}" />
                            <x-button icon="fas fa-edit" color="warning" size="sm" data-bs-toggle="modal" data-bs-target="#editProductModal" data-product-id="{{ $product->id }}" />
                            <x-delete action="{{ route('products.destroy', $product) }}" icon="fas fa-trash" size="sm" color="danger" />
                        </x-button-group>
                    </x-table-cell>
                </tr>
            @empty
                <tr>
                    <x-table-cell colspan="7" align="center">No products found.</x-table-cell>
                </tr>
            @endforelse
        </x-table-body>
    </x-table>
    
    <div class="mt-4">
        <x-pagination :collection="$products" />
    </div>
</x-card>

<!-- Add Product Modal -->
<x-modal id="addProductModal" modal-title="Add New Product" size="lg">
    <x-form action="{{ route('products.store') }}" has-files="true" id="add-product-form">
        <!-- Form fields -->
    </x-form>
    
    <x-slot name="modalFooter">
        <x-button type="button" color="secondary" data-bs-dismiss="modal">Cancel</x-button>
        <x-button type="submit" color="primary" form="add-product-form">Save Product</x-button>
    </x-slot>
</x-modal>
```

### Settings Page with Tabs

```blade
<x-card>
    <x-tab :tabs="[
        'profile' => ['label' => 'Profile', 'icon' => 'fas fa-user'],
        'security' => ['label' => 'Security', 'icon' => 'fas fa-lock'],
        'notifications' => ['label' => 'Notifications', 'icon' => 'fas fa-bell'],
        'billing' => ['label' => 'Billing', 'icon' => 'fas fa-credit-card']
    ]">
        <x-tab-content tab-id="{{ $tabs->id }}" id="profile" active="true">
            <x-form action="{{ route('profile.update') }}" method="PUT" has-files="true">
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <div class="mb-3">
                            <img src="{{ $user->avatar_url }}" alt="Profile" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px;">
                        </div>
                        <x-file-upload name="avatar" accept="image/*" preview="true" />
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <x-form-group name="first_name" label="First Name" required>
                                    <x-input name="first_name" value="{{ $user->first_name }}" />
                                </x-form-group>
                            </div>
                            <div class="col-md-6">
                                <x-form-group name="last_name" label="Last Name" required>
                                    <x-input name="last_name" value="{{ $user->last_name }}" />
                                </x-form-group>
                            </div>
                        </div>
                        
                        <x-form-group name="email" label="Email Address" required>
                            <x-email name="email" value="{{ $user->email }}" />
                        </x-form-group>
                        
                        <x-form-group name="bio" label="Bio">
                            <x-textarea name="bio" rows="4">{{ $user->bio }}</x-textarea>
                        </x-form-group>
                        
                        <div class="text-end">
                            <x-button type="submit" label="Save Changes" color="primary" />
                        </div>
                    </div>
                </div>
            </x-form>
        </x-tab-content>
        
        <x-tab-content tab-id="{{ $tabs->id }}" id="security">
            <x-form action="{{ route('password.update') }}" method="PUT">
                <x-form-group name="current_password" label="Current Password" required>
                    <x-password name="current_password" />
                </x-form-group>
                
                <x-form-group name="password" label="New Password" required>
                    <x-password name="password" />
                </x-form-group>
                
                <x-form-group name="password_confirmation" label="Confirm New Password" required>
                    <x-password name="password_confirmation" />
                </x-form-group>
                
                <div class="text-end">
                    <x-button type="submit" label="Update Password" color="primary" />
                </div>
            </x-form>
        </x-tab-content>
        
        <x-tab-content tab-id="{{ $tabs->id }}" id="notifications">
            <x-form action="{{ route('notifications.update') }}" method="PUT">
                <h5>Email Notifications</h5>
                
                <div class="mb-3">
                    <x-toggle-switch name="email_marketing" label-on="On" label-off="Off" checked="{{ $user->notifications->email_marketing ? 'true' : 'false' }}">
                        Marketing emails and newsletters
                    </x-toggle-switch>
                </div>
                
                <div class="mb-3">
                    <x-toggle-switch name="email_updates" label-on="On" label-off="Off" checked="{{ $user->notifications->email_updates ? 'true' : 'false' }}">
                        Product updates and announcements
                    </x-toggle-switch>
                </div>
                
                <h5 class="mt-4">System Notifications</h5>
                
                <div class="mb-3">
                    <x-toggle-switch name="notification_comments" label-on="On" label-off="Off" checked="{{ $user->notifications->notification_comments ? 'true' : 'false' }}">
                        Comments on your posts
                    </x-toggle-switch>
                </div>
                
                <div class="mb-3">
                    <x-toggle-switch name="notification_mentions" label-on="On" label-off="Off" checked="{{ $user->notifications->notification_mentions ? 'true' : 'false' }}">
                        Mentions and tags
                    </x-toggle-switch>
                </div>
                
                <div class="text-end">
                    <x-button type="submit" label="Save Preferences" color="primary" />
                </div>
            </x-form>
        </x-tab-content>
        
        <x-tab-content tab-id="{{ $tabs->id }}" id="billing">
            <!-- Billing content here -->
        </x-tab-content>
    </x-tab>
</x-card>
```

### Data Dashboard with Multiple Components

```blade
<div class="row">
    <div class="col-md-8">
        <x-card card-title="Sales Overview" card-buttons='<x-dropdown label="Filter" icon="fas fa-filter" size="sm"></x-dropdown>'>
            <!-- Chart content would go here -->
            <div class="chart-container" style="height: 300px;"></div>
            
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="text-center">
                        <h6 class="text-muted">Total Sales</h6>
                        <h3>$45,289</h3>
                        <small class="text-success"><i class="fas fa-arrow-up"></i> 12.5%</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <h6 class="text-muted">Orders</h6>
                        <h3>1,249</h3>
                        <small class="text-success"><i class="fas fa-arrow-up"></i> 8.3%</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <h6 class="text-muted">Customers</h6>
                        <h3>864</h3>
                        <small class="text-success"><i class="fas fa-arrow-up"></i> 4.7%</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <h6 class="text-muted">Avg. Order</h6>
                        <h3>$36.24</h3>
                        <small class="text-danger"><i class="fas fa-arrow-down"></i> 2.1%</small>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
    
    <div class="col-md-4">
        <x-card card-title="Recent Activities">
            <div class="timeline">
                <div class="timeline-item pb-3">
                    <div class="d-flex align-items-start">
                        <div class="timeline-icon bg-primary text-white rounded-circle p-2 me-3">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold">New Order #1234</p>
                            <p class="text-muted small mb-0">John Doe - $129.99</p>
                            <small class="text-muted">2 hours ago</small>
                        </div>
                    </div>
                </div>
                
                <div class="timeline-item pb-3">
                    <div class="d-flex align-items-start">
                        <div class="timeline-icon bg-success text-white rounded-circle p-2 me-3">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold">New Customer Registered</p>
                            <p class="text-muted small mb-0">Jane Smith</p>
                            <small class="text-muted">3 hours ago</small>
                        </div>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="d-flex align-items-start">
                        <div class="timeline-icon bg-warning text-white rounded-circle p-2 me-3">
                            <i class="fas fa-star"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold">New Review</p>
                            <p class="text-muted small mb-0">Product: Wireless Headphones</p>
                            <small class="text-muted">5 hours ago</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-3">
                <x-button label="View All Activities" color="link" size="sm" />
            </div>
        </x-card>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <x-card card-title="Top Products">
            <x-table striped hover small>
                <x-slot name="thead">
                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th class="text-end">Sales</th>
                        <th class="text-end">Revenue</th>
                    </tr>
                </x-slot>
                
                <tbody>
                    <tr>
                        <td>Wireless Headphones</td>
                        <td>Electronics</td>
                        <td class="text-end">245</td>
                        <td class="text-end">$12,250</td>
                    </tr>
                    <tr>
                        <td>Smartwatch Pro</td>
                        <td>Electronics</td>
                        <td class="text-end">187</td>
                        <td class="text-end">$9,350</td>
                    </tr>
                    <tr>
                        <td>Running Shoes</td>
                        <td>Sports</td>
                        <td class="text-end">156</td>
                        <td class="text-end">$7,800</td>
                    </tr>
                    <tr>
                        <td>Coffee Maker</td>
                        <td>Home & Kitchen</td>
                        <td class="text-end">132</td>
                        <td class="text-end">$6,600</td>
                    </tr>
                    <tr>
                        <td>Backpack</td>
                        <td>Fashion</td>
                        <td class="text-end">121</td>
                        <td class="text-end">$3,630</td>
                    </tr>
                </tbody>
            </x-table>
        </x-card>
    </div>
    
    <div class="col-md-6">
        <x-card card-title="Latest Orders" card-buttons='<x-button label="Export" icon="fas fa-download" size="sm" outline="true" />'>
            <x-table striped hover small>
                <x-slot name="thead">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th class="text-end">Amount</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </x-slot>
                
                <tbody>
                    <tr>
                        <td>#ORD-1234</td>
                        <td>John Doe</td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td class="text-end">$129.99</td>
                        <td class="text-center">
                            <x-button icon="fas fa-eye" size="sm" class="btn-sm" />
                        </td>
                    </tr>
                    <tr>
                        <td>#ORD-1233</td>
                        <td>Jane Smith</td>
                        <td><span class="badge bg-warning">Processing</span></td>
                        <td class="text-end">$79.99</td>
                        <td class="text-center">
                            <x-button icon="fas fa-eye" size="sm" class="btn-sm" />
                        </td>
                    </tr>
                    <tr>
                        <td>#ORD-1232</td>
                        <td>Robert Johnson</td>
                        <td><span class="badge bg-info">Shipped</span></td>
                        <td class="text-end">$199.99</td>
                        <td class="text-center">
                            <x-button icon="fas fa-eye" size="sm" class="btn-sm" />
                        </td>
                    </tr>
                    <tr>
                        <td>#ORD-1231</td>
                        <td>Emily Davis</td>
                        <td><span class="badge bg-success">Completed</span></td>
                        <td class="text-end">$149.99</td>
                        <td class="text-center">
                            <x-button icon="fas fa-eye" size="sm" class="btn-sm" />
                        </td>
                    </tr>
                    <tr>
                        <td>#ORD-1230</td>
                        <td>Michael Wilson</td>
                        <td><span class="badge bg-danger">Cancelled</span></td>
                        <td class="text-end">$89.99</td>
                        <td class="text-center">
                            <x-button icon="fas fa-eye" size="sm" class="btn-sm" />
                        </td>
                    </tr>
                </tbody>
            </x-table>
            
            <div class="text-center mt-3">
                <x-button label="View All Orders" color="primary" outline="true" size="sm" />
            </div>
        </x-card>
    </div>
</div>
```

This comprehensive README provides complete documentation for the Laravel BladeKit package, covering all components with detailed parameter explanations and multiple usage examples. The advanced examples demonstrate how to combine components to create sophisticated UI patterns for real-world applications.

