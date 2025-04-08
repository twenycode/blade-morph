# Laravel BladeKit Documentation

This documentation provides comprehensive examples of each component in the Laravel BladeKit package, showing both the Blade usage syntax and the resulting HTML output.

## Table of Contents

- [Installation](#installation)
- [Button Components](#button-components)
  - [Button](#button)
  - [Button Group](#button-group)
  - [Delete Button](#delete-button)
- [Layout Components](#layout-components)
  - [Card](#card)
  - [Alert](#alert)
  - [Modal](#modal)
  - [Accordion](#accordion)
  - [Tab](#tab)
- [Form Components](#form-components)
  - [Form](#form)
  - [Form Group](#form-group)
  - [Input](#input)
  - [Email](#email)
  - [Password](#password)
  - [Textarea](#textarea)
  - [Checkbox](#checkbox)
  - [Radio](#radio)
  - [Select](#select)
  - [File Upload](#file-upload)
- [Navigation Components](#navigation-components)
  - [Nav Link](#nav-link)
  - [Dropdown](#dropdown)
  - [Breadcrumb](#breadcrumb)
  - [Pagination](#pagination)
- [Table Components](#table-components)
  - [Table](#table)
  - [Table Head](#table-head)
  - [Table Body](#table-body)
- [Advanced Usage](#advanced-usage)
  - [AJAX Form Support](#ajax-form-support)
  - [Validation Integration](#validation-integration)
  - [Component Customization](#component-customization)

## Installation

### 1. Install Laravel BladeKit

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

### 3. Optional: Publish Configuration

```bash
# Publish configuration
php artisan vendor:publish --tag="tweny-bladekit-config"
```

To customize the component views:

```bash
# Publish views for customization
php artisan vendor:publish --tag="tweny-bladekit-views"
```

## Button Components

### Button

The Button component creates a versatile Bootstrap button with support for various styles, states, and icons.

#### Basic Usage

```blade
<x-button label="Click Me" />
```

**Output HTML:**
```html
<button type="button" id="btn_60fb5d1a2c7f3" class="btn btn-primary">
  Click Me
</button>
```

#### Submit Button with Success Color

```blade
<x-button type="submit" label="Save" color="success" />
```

**Output HTML:**
```html
<button type="submit" id="btn_60fb5d1a2c7f4" class="btn btn-success">
    Save
</button>
```

#### Button with Icon

```blade
<x-button label="Add Item" icon="fas fa-plus" color="primary" size="sm" outline="true" />
```

**Output HTML:**
```html
<button type="button" id="btn_60fb5d1a2c7f5" class="btn btn-outline-primary btn-sm">
    <i class="fas fa-plus me-1"></i> Add Item
</button>
```

#### Loading State Button

```blade
<x-button label="Submit" loading="true" loading-text="Processing..." type="submit" />
```

**Output HTML:**
```html
<button type="submit" id="btn_60fb5d1a2c7f6" class="btn btn-primary disabled" disabled>
    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
    Processing...
</button>
```

#### Full Button Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `type` | string | 'button' | Button type (button, submit, reset) |
| `id` | string | auto-generated | Button ID attribute |
| `label` | string | 'Submit' | Button text |
| `color` | string | 'primary' | Bootstrap color (primary, secondary, success, danger, warning, info, light, dark) |
| `size` | string | null | Button size (sm, lg) |
| `outline` | boolean | false | Use outline style |
| `loading` | boolean | false | Show loading state |
| `loadingText` | string | null | Text to show when loading |
| `icon` | string | null | Icon class (e.g., 'fas fa-save') |
| `iconPosition` | string | 'left' | Icon position ('left' or 'right') |

### Button Group

The Button Group component groups multiple buttons together in a horizontal or vertical layout.

#### Basic Button Group

```blade
<x-button-group>
    <x-button label="Left" />
    <x-button label="Middle" />
    <x-button label="Right" />
</x-button-group>
```

**Output HTML:**
```html
<div class="btn-group" role="group" aria-label="Button group">
    <button type="button" id="btn_60fb5d1a2c7f7" class="btn btn-primary">Left</button>
    <button type="button" id="btn_60fb5d1a2c7f8" class="btn btn-primary">Middle</button>
    <button type="button" id="btn_60fb5d1a2c7f9" class="btn btn-primary">Right</button>
</div>
```

#### Vertical Button Group

```blade
<x-button-group vertical="true">
    <x-button label="Top" />
    <x-button label="Middle" />
    <x-button label="Bottom" />
</x-button-group>
```

**Output HTML:**
```html
<div class="btn-group-vertical" role="group" aria-label="Button group">
    <button type="button" id="btn_60fb5d1a2c7fa" class="btn btn-primary">Top</button>
    <button type="button" id="btn_60fb5d1a2c7fb" class="btn btn-primary">Middle</button>
    <button type="button" id="btn_60fb5d1a2c7fc" class="btn btn-primary">Bottom</button>
</div>
```

#### Small-sized Button Group

```blade
<x-button-group size="sm">
    <x-button label="Small 1" />
    <x-button label="Small 2" />
</x-button-group>
```

**Output HTML:**
```html
<div class="btn-group btn-group-sm" role="group" aria-label="Button group">
    <button type="button" id="btn_60fb5d1a2c7fd" class="btn btn-primary">Small 1</button>
    <button type="button" id="btn_60fb5d1a2c7fe" class="btn btn-primary">Small 2</button>
</div>
```

#### Button Group Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `size` | string | '' | Button group size (sm, lg) |
| `vertical` | boolean | false | Use vertical layout |
| `toolbar` | boolean | false | Create a button toolbar |

### Delete Button

The Delete Button component provides a specialized button for delete actions with a built-in confirmation dialog.

```blade
<x-delete action="{{ route('users.destroy', 1) }}" />
```

**Output HTML:**
```html
<form method="POST" action="http://example.com/users/1" class="form-inline form-delete" role="form" autocomplete="off">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="DELETE">
    <button class="btn" onclick="return confirm('Do you want to delete this item?')">
        <i class="fa fa-trash-alt"></i> Delete
    </button>
</form>
```

#### Custom Delete Button

```blade
<x-delete 
    action="{{ route('posts.destroy', 1) }}"
    label="Delete Post"
    confirm-message="Are you sure you want to delete this post? This action cannot be undone."
    class="btn-sm btn-outline-danger"
/>
```

**Output HTML:**
```html
<form method="POST" action="http://example.com/posts/1" class="form-inline form-delete" role="form" autocomplete="off">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="DELETE">
    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
        Delete Post
    </button>
</form>
```

#### Delete Button Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `action` | string | required | Form action URL for delete |
| `label` | string | '<i class="fa fa-trash-alt"></i> Delete' | Button label |
| `confirmMessage` | string | 'Do you want to delete this item?' | Confirmation message |

## Layout Components

### Card

The Card component creates a Bootstrap card with optional header, footer, and action buttons.

#### Basic Card

```blade
<x-card>
    <p>This is a basic card with content.</p>
</x-card>
```

**Output HTML:**
```html
<div class="card">
    <div class="card-body">
        <p>This is a basic card with content.</p>
    </div>
</div>
```

#### Card with Title

```blade
<x-card card-title="User Profile">
    <p>Card content goes here...</p>
</x-card>
```

**Output HTML:**
```html
<div class="card">
    <div class="card-header">
        <div class="card-title">
            User Profile
        </div>
    </div>
    <div class="card-body">
        <p>Card content goes here...</p>
    </div>
</div>
```

#### Card with Title and Action Buttons

```blade
<x-card 
    card-title="Product Details" 
    card-buttons='<x-button label="Edit" size="sm" /><x-button label="Delete" color="danger" size="sm" class="ms-2" />'
>
    <p>Product information goes here...</p>
</x-card>
```

**Output HTML:**
```html
<div class="card">
    <div class="card-header">
        <div class="card-title">
            Product Details
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-sm-12 col-md-12 col-lg-12 text-end">
                <button type="button" id="btn_60fb5d1a2c7ff" class="btn btn-primary btn-sm">Edit</button>
                <button type="button" id="btn_60fb5d1a2c800" class="btn btn-danger btn-sm ms-2">Delete</button>
            </div>
        </div>
        <p>Product information goes here...</p>
    </div>
</div>
```

#### Card Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `cardTitle` | string | null | Card header title |
| `cardButtons` | string | null | HTML for card action buttons |

### Alert

The Alert component displays alert messages with various styles and optional dismissibility.

#### Basic Alert

```blade
<x-alert>
    This is a default info alert.
</x-alert>
```

**Output HTML:**
```html
<!-- This component includes flash messages from the flash package -->
@include('flash::message')
```

Note: The Alert component is designed to work with the `laracasts/flash` package for displaying flash messages. You can view the full implementation in the view file.

### Modal

The Modal component creates a Bootstrap modal dialog with customizable header, body, and footer.

#### Basic Modal

```blade
<x-modal id="exampleModal" modal-title="Example Modal">
    <p>Modal content goes here...</p>
</x-modal>
```

**Output HTML:**
```html
<div class="modal fade" id="exampleModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Example Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal content goes here...</p>
            </div>
        </div>
    </div>
</div>
```

#### Modal with Footer

```blade
<x-modal id="confirmModal" modal-title="Confirm Action">
    <p>Are you sure you want to proceed?</p>
    
    <x-slot name="modalFooter">
        <x-button type="button" color="secondary" data-bs-dismiss="modal">Cancel</x-button>
        <x-button type="button" color="primary">Confirm</x-button>
    </x-slot>
</x-modal>
```

**Output HTML:**
```html
<div class="modal fade" id="confirmModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_60fb5d1a2c801" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="btn_60fb5d1a2c802" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
```

#### Modal Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `id` | string | required | Modal ID |
| `modalTitle` | string | null | Modal header title |
| `modalFooter` | string | null | Modal footer content |
| `size` | string | null | Modal size (sm, lg, xl) |
| `centered` | boolean | false | Vertically center modal |
| `scrollable` | boolean | false | Enable scrollable modal body |

### Accordion

The Accordion component creates collapsible content panels for displaying information in a limited space.

#### Basic Accordion

```blade
<x-accordion id="basicAccordion">
    <x-accordion-item accordion-id="basicAccordion" title="Section 1" open="true">
        <p>Content for section 1...</p>
    </x-accordion-item>
    
    <x-accordion-item accordion-id="basicAccordion" title="Section 2">
        <p>Content for section 2...</p>
    </x-accordion-item>
</x-accordion>
```

**Output HTML:**
```html
<div class="accordion" id="basicAccordion">
    <!-- Slot content will be rendered here with accordion items -->
</div>
```

#### Accordion with Array Items

```blade
<x-accordion 
    id="arrayAccordion"
    :items="[
        ['title' => 'First Item', 'content' => 'Content for first item...'],
        ['title' => 'Second Item', 'content' => 'Content for second item...', 'icon' => 'fas fa-star']
    ]"
/>
```

**Output HTML:**
```html
<div class="accordion" id="arrayAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading_arrayAccordion_0">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#collapse_arrayAccordion_0" aria-expanded="true" 
                    aria-controls="collapse_arrayAccordion_0" data-bs-parent="#arrayAccordion">
                First Item
            </button>
        </h2>
        <div id="collapse_arrayAccordion_0" class="accordion-collapse collapse show" 
             aria-labelledby="heading_arrayAccordion_0" data-bs-parent="#arrayAccordion">
            <div class="accordion-body">
                Content for first item...
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading_arrayAccordion_1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#collapse_arrayAccordion_1" aria-expanded="false" 
                    aria-controls="collapse_arrayAccordion_1" data-bs-parent="#arrayAccordion">
                <i class="fas fa-star me-2"></i> Second Item
            </button>
        </h2>
        <div id="collapse_arrayAccordion_1" class="accordion-collapse collapse" 
             aria-labelledby="heading_arrayAccordion_1" data-bs-parent="#arrayAccordion">
            <div class="accordion-body">
                Content for second item...
            </div>
        </div>
    </div>
</div>
```

#### Accordion Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `id` | string | auto-generated | Accordion ID |
| `items` | array | null | Array of accordion items |
| `flush` | boolean | false | Use borderless accordion |
| `alwaysOpen` | boolean | false | Allow multiple items to be open |

### Tab

The Tab component creates a tabbed interface with support for icons and custom content.

#### Basic Tabs

```blade
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
```

**Output HTML:**
```html
<div>
    <ul class="nav nav-tabs mb-3" id="tabs_60fb5d1a2c803-nav" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tabs_60fb5d1a2c803-home-tab" data-bs-toggle="tab" 
                    data-bs-target="#tabs_60fb5d1a2c803-home" type="button" role="tab" 
                    aria-controls="tabs_60fb5d1a2c803-home" aria-selected="true">
                Home
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tabs_60fb5d1a2c803-profile-tab" data-bs-toggle="tab" 
                    data-bs-target="#tabs_60fb5d1a2c803-profile" type="button" role="tab" 
                    aria-controls="tabs_60fb5d1a2c803-profile" aria-selected="false">
                Profile
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tabs_60fb5d1a2c803-messages-tab" data-bs-toggle="tab" 
                    data-bs-target="#tabs_60fb5d1a2c803-messages" type="button" role="tab" 
                    aria-controls="tabs_60fb5d1a2c803-messages" aria-selected="false">
                Messages
            </button>
        </li>
    </ul>
    <div class="tab-content" id="tabs_60fb5d1a2c803-content">
        <div class="tab-pane fade show active" id="tabs_60fb5d1a2c803-home" role="tabpanel" 
             aria-labelledby="tabs_60fb5d1a2c803-home-tab">
            <p>Home tab content...</p>
        </div>
        <div class="tab-pane fade" id="tabs_60fb5d1a2c803-profile" role="tabpanel" 
             aria-labelledby="tabs_60fb5d1a2c803-profile-tab">
            <p>Profile tab content...</p>
        </div>
        <div class="tab-pane fade" id="tabs_60fb5d1a2c803-messages" role="tabpanel" 
             aria-labelledby="tabs_60fb5d1a2c803-messages-tab">
            <p>Messages tab content...</p>
        </div>
    </div>
</div>
```

#### Tabs with Icons

```blade
<x-tab 
    :tabs="[
        'account' => ['label' => 'Account', 'icon' => 'fas fa-user'],
        'security' => ['label' => 'Security', 'icon' => 'fas fa-lock'],
        'billing' => ['label' => 'Billing', 'icon' => 'fas fa-credit-card']
    ]"
>
    <!-- Tab content here -->
</x-tab>
```

**Output HTML:**
```html
<div>
    <ul class="nav nav-tabs mb-3" id="tabs_60fb5d1a2c804-nav" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tabs_60fb5d1a2c804-account-tab" data-bs-toggle="tab" 
                    data-bs-target="#tabs_60fb5d1a2c804-account" type="button" role="tab" 
                    aria-controls="tabs_60fb5d1a2c804-account" aria-selected="true">
                <i class="fas fa-user me-1"></i> Account
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tabs_60fb5d1a2c804-security-tab" data-bs-toggle="tab" 
                    data-bs-target="#tabs_60fb5d1a2c804-security" type="button" role="tab" 
                    aria-controls="tabs_60fb5d1a2c804-security" aria-selected="false">
                <i class="fas fa-lock me-1"></i> Security
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tabs_60fb5d1a2c804-billing-tab" data-bs-toggle="tab" 
                    data-bs-target="#tabs_60fb5d1a2c804-billing" type="button" role="tab" 
                    aria-controls="tabs_60fb5d1a2c804-billing" aria-selected="false">
                <i class="fas fa-credit-card me-1"></i> Billing
            </button>
        </li>
    </ul>
    <div class="tab-content" id="tabs_60fb5d1a2c804-content">
        <!-- Tab content would be rendered here -->
    </div>
</div>
```

#### Tab Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `id` | string | auto-generated | Tab container ID |
| `tabs` | array | null | Array of tab definitions |
| `activeTab` | string | First tab | Key of initially active tab |
| `type` | string | 'tabs' | Tab style (tabs, pills, underline) |
| `alignment` | string | 'left' | Tab alignment (left, center, right, justified) |
| `vertical` | boolean | false | Use vertical tabs |
| `fade` | boolean | true | Use fade animation |

## Form Components

### Form

The Form component creates a form with CSRF protection, method spoofing, and optional AJAX support.

#### Basic Form

```blade
<x-form action="{{ route('users.store') }}">
    <!-- Form fields -->
    <x-button type="submit" label="Save" />
</x-form>
```

**Output HTML:**
```html
<form id="form_60fb5d1a2c805" method="POST" action="http://example.com/users" role="form" autocomplete="off">
    <input type="hidden" name="_token" value="...">
    
    <div class="form-content">
        <!-- Form fields would be rendered here -->
        <button type="submit" id="btn_60fb5d1a2c806" class="btn btn-primary">Save</button>
    </div>
</form>
```

#### Form with File Uploads

```blade
<x-form action="{{ route('profile.update') }}" method="PUT" has-files="true">
    <!-- Form fields including file upload -->
    <x-button type="submit" label="Update Profile" />
</x-form>
```

**Output HTML:**
```html
<form id="form_60fb5d1a2c807" method="POST" action="http://example.com/profile" enctype="multipart/form-data" role="form" autocomplete="off">
    <input type="hidden" name="_token" value="...">
    <input type="hidden" name="_method" value="PUT">
    
    <div class="form-content">
        <!-- Form fields would be rendered here -->
        <button type="submit" id="btn_60fb5d1a2c808" class="btn btn-primary">Update Profile</button>
    </div>
</form>
```

#### Form with Built-in Buttons

```blade
<x-form 
    action="{{ route('products.store') }}"
    submit-label="Create Product"
    cancel-label="Cancel"
    cancel-url="{{ route('products.index') }}"
>
    <!-- Form fields -->
</x-form>
```

**Output HTML:**
```html
<form id="form_60fb5d1a2c809" method="POST" action="http://example.com/products" role="form" autocomplete="off">
    <input type="hidden" name="_token" value="...">
    
    <div class="form-content">
        <!-- Form fields would be rendered here -->
    </div>
    
    <div class="form-actions mt-4">
        <button type="submit" id="btn_60fb5d1a2c80a" class="btn btn-primary">Create Product</button>
        <a href="http://example.com/products" class="btn btn-secondary ms-2">Cancel</a>
    </div>
</form>
```

#### Form Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `action` | string | required | Form action URL |
| `method` | string | 'POST' | Form method |
| `hasFiles` | boolean | false | Enable file uploads |
| `ajax` | boolean | false | Use AJAX submission |
| `id` | string | auto-generated | Form ID |
| `submitLabel` | string | null | Text for submit button |
| `cancelLabel` | string | null | Text for cancel button |
| `cancelUrl` | string | previous URL | URL for cancel button |
| `inline` | boolean | false | Use inline form layout |
| `novalidate` | boolean | false | Disable browser validation |

### Form Group

The Form Group component wraps form elements with labels and error handling.

#### Basic Form Group

```blade
<x-form-group name="title" label="Post Title">
    <x-input name="title" />
</x-form-group>
```

**Output HTML:**
```html
<div class="mb-3">
    <label for="title" class="form-label">
        Post Title
    </label>

    <input name="title" type="text" id="title" class="form-control">

    <!-- Error messages would appear here if validation fails -->
</div>
```

#### Required Field

```blade
<x-form-group name="email" label="Email Address" required="true">
    <x-email name="email" />
</x-form-group>
```

**Output HTML:**
```html
<div class="mb-3">
    <label for="email" class="form-label">
        Email Address
        <span class="text-danger">*</span>
    </label>

    <input name="email" type="email" id="email" class="form-control">

    <!-- Error messages would appear here if validation fails -->
</div>
```

#### Form Group with Help Text

```blade
<x-form-group 
    name="password" 
    label="Password" 
    required="true"
    help-text="Password must be at least 8 characters long."
>
    <x-password name="password" />
</x-form-group>
```

**Output HTML:**
```html
<div class="mb-3">
    <label for="password" class="form-label">
        Password
        <span class="text-danger">*</span>
    </label>

    <input name="password" type="password" id="password" class="form-control">

    <div class="form-text text-muted">
        Password must be at least 8 characters long.
    </div>

    <!-- Error messages would appear here if validation fails -->
</div>
```

#### Horizontal Form Group

```blade
<x-form-group 
    name="address" 
    label="Street Address"
    horizontal="true"
>
    <x-input name="address" />
</x-form-group>
```

**Output HTML:**
```html
<div class="row mb-3">
    <label for="address" class="col-md-3 col-form-label">
        Street Address
    </label>

    <div class="col-md-9">
        <input name="address" type="text" id="address" class="form-control">

        <!-- Error messages would appear here if validation fails -->
    </div>
</div>
```

#### Form Group Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | required | Field name |
| `label` | string | formatted field name | Field label |
| `required` | boolean | false | Mark field as required |
| `helpText` | string | null | Help text below field |
| `id` | string | name | Input field ID |
| `bag` | string | 'default' | Error bag name |
| `horizontal` | boolean | false | Use horizontal layout |
| `labelCol` | string | 'col-md-3' | Label column class |
| `fieldCol` | string | 'col-md-9' | Field column class |

### Input

The Input component creates a text input field with validation support.

```blade
<x-input name="name" placeholder="Enter your name" />
```

**Output HTML:**
```html
<input name="name" type="text" id="name" placeholder="Enter your name" class="form-control">
```

#### Input with Value

```blade
<x-input name="username" value="johndoe" required="true" />
```

**Output HTML:**
```html
<input name="username" type="text" id="username" value="johndoe" class="form-control" required>
```

#### Input Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | required | Input name |
| `id` | string | name | Input ID |
| `type` | string | 'text' | Input type |
| `value` | mixed | null | Input value |
| `required` | boolean | false | Required field |
| `autofocus` | boolean | false | Autofocus on field |
| `placeholder` | string | null | Input placeholder |

### Email

The Email component creates an email input field.

```blade
<x-email name="email" placeholder="example@domain.com" />
```

**Output HTML:**
```html
<input name="email" type="email" id="email" placeholder="example@domain.com" class="form-control">
```

#### Email Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | 'email' | Input name |
| `id` | string | name | Input ID |
| `value` | string | '' | Input value |
| `required` | boolean | false | Required field |
| `placeholder` | string | null | Input placeholder |

### Password

The Password component creates a password input field.

```blade
<x-password name="password" />
```

**Output HTML:**
```html
<input name="password" type="password" id="password" class="form-control">
```

#### Password Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | 'password' | Input name |
| `id` | string | name | Input ID |
| `required` | boolean | false | Required field |
| `placeholder` | string | null | Input placeholder |

### Textarea

The Textarea component creates a multi-line text input field.

```blade
<x-textarea name="description" rows="5">Default content here</x-textarea>
```

**Output HTML:**
```html
<textarea name="description" id="description" rows="5" class="form-control">Default content here</textarea>
```

#### Textarea Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | required | Textarea name |
| `id` | string | name | Textarea ID |
| `rows` | integer | 3 | Number of rows |

### Checkbox

The Checkbox component creates a checkbox input field.

```blade
<x-checkbox name="remember" id="remember-me" value="1" checked="true" />
```

**Output HTML:**
```html
<input name="remember" type="checkbox" id="remember-me" value="1" checked>
```

#### Checkbox with Label (using Bootstrap form-check)

```blade
<div class="form-check">
    <x-checkbox name="terms" id="terms-checkbox" value="accepted" />
    <label class="form-check-label" for="terms-checkbox">
        I accept the terms and conditions
    </label>
</div>
```

**Output HTML:**
```html
<div class="form-check">
    <input name="terms" type="checkbox" id="terms-checkbox" value="accepted">
    <label class="form-check-label" for="terms-checkbox">
        I accept the terms and conditions
    </label>
</div>
```

#### Checkbox Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | required | Checkbox name |
| `id` | string | name | Checkbox ID |
| `checked` | boolean | false | Checked state |
| `value` | string | '' | Checkbox value |

### Radio

The Radio component creates a radio button input.

```blade
<x-radio name="gender" value="male" id="gender-male">Male</x-radio>
```

**Output HTML:**
```html
<div class="form-check">
    <input type="radio" name="gender" id="gender-male" value="male" class="form-check-input">
    <label class="form-check-label" for="gender-male">
        Male
    </label>
</div>
```

#### Radio Group

```blade
<div class="mb-3">
    <label class="form-label d-block">Gender</label>
    <x-radio name="gender" value="male" id="gender-male">Male</x-radio>
    <x-radio name="gender" value="female" id="gender-female">Female</x-radio>
    <x-radio name="gender" value="other" id="gender-other">Other</x-radio>
</div>
```

**Output HTML:**
```html
<div class="mb-3">
    <label class="form-label d-block">Gender</label>
    <div class="form-check">
        <input type="radio" name="gender" id="gender-male" value="male" class="form-check-input">
        <label class="form-check-label" for="gender-male">Male</label>
    </div>
    <div class="form-check">
        <input type="radio" name="gender" id="gender-female" value="female" class="form-check-input">
        <label class="form-check-label" for="gender-female">Female</label>
    </div>
    <div class="form-check">
        <input type="radio" name="gender" id="gender-other" value="other" class="form-check-input">
        <label class="form-check-label" for="gender-other">Other</label>
    </div>
</div>
```

#### Inline Radio Buttons

```blade
<div class="mb-3">
    <label class="form-label d-block">Contact Method</label>
    <x-radio name="contact" value="email" id="contact-email" inline="true">Email</x-radio>
    <x-radio name="contact" value="phone" id="contact-phone" inline="true">Phone</x-radio>
    <x-radio name="contact" value="mail" id="contact-mail" inline="true">Mail</x-radio>
</div>
```

**Output HTML:**
```html
<div class="mb-3">
    <label class="form-label d-block">Contact Method</label>
    <div class="form-check form-check-inline">
        <input type="radio" name="contact" id="contact-email" value="email" class="form-check-input">
        <label class="form-check-label" for="contact-email">Email</label>
    </div>
    <div class="form-check form-check-inline">
        <input type="radio" name="contact" id="contact-phone" value="phone" class="form-check-input">
        <label class="form-check-label" for="contact-phone">Phone</label>
    </div>
    <div class="form-check form-check-inline">
        <input type="radio" name="contact" id="contact-mail" value="mail" class="form-check-input">
        <label class="form-check-label" for="contact-mail">Mail</label>
    </div>
</div>
```

#### Radio Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | required | Radio name |
| `value` | string | required | Radio value |
| `id` | string | auto-generated | Radio ID |
| `checked` | boolean | false | Checked state |
| `inline` | boolean | false | Display inline |
| `required` | boolean | false | Required field |
| `disabled` | boolean | false | Disabled state |

### Select

The Select component creates a dropdown select control with single or multiple selection.

#### Basic Select

```blade
<x-select 
    name="country" 
    :options="['us' => 'United States', 'ca' => 'Canada', 'mx' => 'Mexico']" 
/>
```

**Output HTML:**
```html
<select name="country" id="country" class="form-select">
    <option value="us">United States</option>
    <option value="ca">Canada</option>
    <option value="mx">Mexico</option>
</select>
```

#### Select with Placeholder

```blade
<x-select 
    name="state" 
    :options="$states" 
    placeholder="Select a state" 
/>
```

**Output HTML:**
```html
<select name="state" id="state" class="form-select">
    <option value="" disabled selected>Select a state</option>
    <!-- Options from $states array would be rendered here -->
</select>
```

#### Select with Pre-selected Value

```blade
<x-select 
    name="category" 
    :options="$categories" 
    selected="2" 
/>
```

**Output HTML:**
```html
<select name="category" id="category" class="form-select">
    <!-- Each option from $categories would be rendered with selected="selected" for the matching value -->
    <option value="1">Category 1</option>
    <option value="2" selected>Category 2</option>
    <option value="3">Category 3</option>
</select>
```

#### Multiple Select

```blade
<x-select 
    name="tags[]" 
    :options="$tags" 
    multiple="true"
    :selected="[1, 3]"
/>
```

**Output HTML:**
```html
<select name="tags[]" id="tags" class="form-select" multiple>
    <!-- Each option from $tags would be rendered with selected="selected" for values in the selected array -->
    <option value="1" selected>Tag 1</option>
    <option value="2">Tag 2</option>
    <option value="3" selected>Tag 3</option>
</select>
```

#### Select with Option Groups

```blade
<x-select 
    name="product" 
    :options="[
        ['label' => 'Electronics', 'options' => ['laptop' => 'Laptop', 'phone' => 'Smartphone']],
        ['label' => 'Clothing', 'options' => ['shirt' => 'Shirt', 'pants' => 'Pants']]
    ]"
/>
```

**Output HTML:**
```html
<select name="product" id="product" class="form-select">
    <optgroup label="Electronics">
        <option value="laptop">Laptop</option>
        <option value="phone">Smartphone</option>
    </optgroup>
    <optgroup label="Clothing">
        <option value="shirt">Shirt</option>
        <option value="pants">Pants</option>
    </optgroup>
</select>
```

#### Select Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | required | Select name |
| `options` | array | [] | Array of options (key => value) |
| `selected` | mixed | null | Selected value(s) |
| `id` | string | name | Select ID |
| `placeholder` | string | null | Placeholder text |
| `multiple` | boolean | false | Allow multiple selections |
| `valueField` | string | null | Field to use as option value |
| `labelField` | string | null | Field to use as option label |
| `required` | boolean | false | Required field |

### File Upload

The File Upload component creates a file input field with preview support.

#### Basic File Upload

```blade
<x-file-upload name="document" />
```

**Output HTML:**
```html
<div class="file-upload-component">
    <div class="input-group">
        <input type="file" name="document" id="document" class="form-control">
    </div>
</div>
```

#### Image Upload with Preview

```blade
<x-file-upload 
    name="avatar" 
    accept="image/*" 
    preview="true" 
    preview-url="{{ $user->avatar_url }}" 
/>
```

**Output HTML:**
```html
<div class="file-upload-component">
    <div class="input-group">
        <input type="file" name="avatar" id="avatar" class="form-control" accept="image/*">
        <button class="btn btn-outline-secondary" type="button" onclick="window.open('user-avatar.jpg', '_blank')">
            <i class="fas fa-eye"></i> View
        </button>
    </div>
    
    <div id="avatar_preview" class="file-preview mt-2">
        <div class="current-file mb-2">
            <small class="text-muted">Current file:</small>
            <div class="d-flex align-items-center">
                <i class="fas fa-file me-2"></i>
                <a href="user-avatar.jpg" target="_blank">user-avatar.jpg</a>
            </div>
        </div>
        <div class="new-file-preview d-none">
            <small class="text-muted">Selected file:</small>
            <div class="selected-file-info"></div>
        </div>
    </div>
    
    <script>
        // JavaScript for file preview functionality
    </script>
</div>
```

#### File Upload with Size Restriction

```blade
<x-file-upload 
    name="resume" 
    accept=".pdf,.doc,.docx" 
    max-size="5000" 
    accepted-file-types="['pdf', 'doc', 'docx']" 
/>
```

**Output HTML:**
```html
<div class="file-upload-component">
    <div class="input-group">
        <input type="file" name="resume" id="resume" class="form-control" accept=".pdf,.doc,.docx">
    </div>
    <div class="form-text mt-1">
        <small>Max file size: 5000 KB</small>
        <small> • Accepted formats: pdf, doc, docx</small>
    </div>
</div>
```

#### File Upload Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | required | Input name |
| `id` | string | name | Input ID |
| `accept` | string | null | Accepted file types |
| `multiple` | boolean | false | Allow multiple files |
| `required` | boolean | false | Required field |
| `preview` | boolean | false | Show file preview |
| `previewUrl` | string | null | URL of existing file for preview |
| `placeholder` | string | 'Choose file...' | Placeholder text |
| `maxFiles` | integer | null | Maximum number of files |
| `maxSize` | integer | null | Maximum file size in KB |
| `acceptedFileTypes` | array | null | Array of accepted file extensions |

## Navigation Components

### Nav Link

The Nav Link component creates a navigation link with active state detection.

#### Basic Nav Link

```blade
<x-nav-link href="{{ route('home') }}" label="Home" />
```

**Output HTML:**
```html
<a href="http://example.com" class="nav-link ">
    Home
</a>
```

#### Nav Link with Icon

```blade
<x-nav-link 
    href="{{ route('dashboard') }}" 
    label="Dashboard" 
    icon="fas fa-tachometer-alt" 
/>
```

**Output HTML:**
```html
<a href="http://example.com/dashboard" class="nav-link ">
    <i class="fas fa-tachometer-alt me-1"></i>
    Dashboard
</a>
```

#### Nav Link with Badge

```blade
<x-nav-link 
    href="{{ route('messages') }}" 
    label="Messages" 
    badge="5" 
    badge-color="danger" 
/>
```

**Output HTML:**
```html
<a href="http://example.com/messages" class="nav-link ">
    Messages
    <span class="badge bg-danger ms-1">5</span>
</a>
```

#### Nav Link Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `href` | string | required | Link URL |
| `label` | string | required | Link text |
| `icon` | string | null | Icon class |
| `badge` | string | null | Badge text |
| `badgeColor` | string | 'primary' | Badge color |
| `activeClass` | string | 'active' | Active state class |
| `exact` | boolean | false | Exact path matching |

### Dropdown

The Dropdown component creates a dropdown menu for navigation.

#### Basic Dropdown

```blade
<x-dropdown label="Menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Something else</a>
</x-dropdown>
```

**Output HTML:**
```html
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown_60fb5d1a2c80b" data-bs-toggle="dropdown" aria-expanded="false">
        Menu
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdown_60fb5d1a2c80b">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else</a>
    </ul>
</div>
```

#### Dropdown with Icon

```blade
<x-dropdown 
    label="User" 
    icon="fas fa-user" 
    color="primary"
>
    <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
    <a class="dropdown-item" href="{{ route('settings') }}">Settings</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
</x-dropdown>
```

**Output HTML:**
```html
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown_60fb5d1a2c80c" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-user me-1"></i>
        User
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdown_60fb5d1a2c80c">
        <a class="dropdown-item" href="http://example.com/profile">Profile</a>
        <a class="dropdown-item" href="http://example.com/settings">Settings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="http://example.com/logout">Logout</a>
    </ul>
</div>
```

#### Split Button Dropdown

```blade
<x-dropdown 
    label="Actions" 
    split="true" 
    color="success"
>
    <a class="dropdown-item" href="#">Edit</a>
    <a class="dropdown-item" href="#">Delete</a>
</x-dropdown>
```

**Output HTML:**
```html
<div class="dropdown">
    <div class="btn-group">
        <button type="button" class="btn btn-success">
            Actions
        </button>
        <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown_60fb5d1a2c80d">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdown_60fb5d1a2c80d">
            <a class="dropdown-item" href="#">Edit</a>
            <a class="dropdown-item" href="#">Delete</a>
        </ul>
    </div>
</div>
```

#### Dropdown Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `id` | string | auto-generated | Dropdown ID |
| `label` | string | 'Dropdown' | Dropdown toggle text |
| `icon` | string | null | Icon class |
| `alignment` | string | 'dropdown' | Dropdown alignment (dropdown, dropup, dropend, dropstart) |
| `color` | string | 'secondary' | Button color |
| `size` | string | null | Button size |
| `split` | boolean | false | Use split button |
| `dark` | boolean | false | Use dark theme |

### Breadcrumb

The Breadcrumb component creates breadcrumb navigation to show page hierarchy.

#### Basic Breadcrumb

```blade
<x-breadcrumb :items="[
    ['url' => route('home'), 'label' => 'Home'],
    ['url' => route('products.index'), 'label' => 'Products'],
    'Product Details'
]" />
```

**Output HTML:**
```html
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="http://example.com">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="http://example.com/products">Products</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            Product Details
        </li>
    </ol>
</nav>
```

#### Breadcrumb with Background

```blade
<x-breadcrumb 
    :items="$breadcrumbs"
    with-background="true"
/>
```

**Output HTML:**
```html
<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-2 rounded bg-light">
        <!-- Breadcrumb items would be rendered here -->
    </ol>
</nav>
```

#### Breadcrumb with Custom Divider

```blade
<x-breadcrumb 
    :items="[
        ['url' => route('dashboard'), 'label' => 'Dashboard'],
        ['url' => route('users.index'), 'label' => 'Users'],
        $user->name
    ]"
    divider=">"
/>
```

**Output HTML:**
```html
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="http://example.com/dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="http://example.com/users">Users</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            John Doe
        </li>
    </ol>
</nav>
```

#### Breadcrumb Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `items` | array | null | Array of breadcrumb items |
| `divider` | string | '/' | Divider character |
| `withBackground` | boolean | false | Add background |

### Pagination

The Pagination component creates pagination controls for collections.

```blade
<x-pagination :collection="$users" />
```

**Output HTML:**
```html
<div>
    <div class="d-flex justify-content-center">
        <!-- Laravel pagination links rendered here -->
        <ul class="pagination">
            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                <span class="page-link" aria-hidden="true">‹</span>
            </li>
            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="http://example.com/users?page=2">2</a></li>
            <li class="page-item"><a class="page-link" href="http://example.com/users?page=3">3</a></li>
            <li class="page-item">
                <a class="page-link" href="http://example.com/users?page=2" rel="next" aria-label="Next »">‹</a>
            </li>
        </ul>
    </div>
    <div class="pagination-info mt-2 text-muted small text-center">
        Showing 1 to 10 of 30 entries
    </div>
</div>
```

#### Pagination Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `collection` | object | required | The paginated collection |
| `size` | string | '' | Pagination size (sm, lg) |
| `withText` | boolean | true | Show pagination text |
| `align` | string | 'center' | Alignment (start, center, end) |
| `simple` | boolean | false | Use simple pagination |

## Table Components

### Table

The Table component creates a responsive table with sorting and searching capabilities.

#### Basic Table

```blade
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
```

**Output HTML:**
```html
<div class="table-responsive">
    <table id="table_60fb5d1a2c80e" class="table">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <!-- Table rows would be rendered here -->
        </tbody>
    </table>
</div>
```

#### Styled Table

```blade
<x-table striped hover bordered>
    <!-- Table content -->
</x-table>
```

**Output HTML:**
```html
<div class="table-responsive">
    <table id="table_60fb5d1a2c80f" class="table table-striped table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <!-- Table headers would be rendered here -->
            </tr>
        </thead>
        <tbody>
            <!-- Table rows would be rendered here -->
        </tbody>
    </table>
</div>
```

#### Sortable and Searchable Table

```blade
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
```

**Output HTML:**
```html
<div class="table-responsive">
    <div class="mb-3">
        <input type="text" class="form-control" id="users-table_search" placeholder="Search..." autocomplete="off">
    </div>
    <table id="users-table" class="table table-striped table-hover" data-sortable>
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th class=no-sort>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Table rows would be rendered here -->
        </tbody>
    </table>
    <!-- JavaScript for searching and sorting would be rendered here -->
</div>
```

#### Table Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `id` | string | auto-generated | Table ID |
| `thead` | string | null | Table header content |
| `collection` | object | null | Paginated collection |
| `striped` | boolean | false | Use striped rows |
| `bordered` | boolean | false | Add borders |
| `hover` | boolean | false | Add hover effect |
| `small` | boolean | false | Use small table |
| `responsive` | boolean | true | Make table responsive |
| `responsiveBreakpoint` | string | null | Responsive breakpoint (sm, md, lg, xl) |
| `sortable` | boolean | false | Enable sorting |
| `searchable` | boolean | false | Enable searching |

### Table Head

Table Head component for creating sortable table headers.

```blade
<x-table-head sortable sort-by="name">Name</x-table-head>
```

**Output HTML:**
```html
<th data-sort-by=name>
    Name
</th>
```

#### Table Head Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `sortable` | boolean | true | Enable sorting on column |
| `sortBy` | string | null | Field to sort by |
| `width` | string | null | Column width |
| `align` | string | null | Text alignment (left, center, right) |

### Table Body

Table Body component for wrapping table rows.

```blade
<x-table-body id="user-table-body">
    <!-- Table rows -->
</x-table-body>
```

**Output HTML:**
```html
<tbody id="user-table-body">
    <!-- Table rows would be rendered here -->
</tbody>
```

#### Table Body Parameters

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `id` | string | null | HTML ID for the table body |

## Advanced Usage

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

When validation fails, the error messages will automatically be displayed below the form fields:

```html
<div class="mb-3">
    <label for="email" class="form-label">
        Email Address
        <span class="text-danger">*</span>
    </label>

    <input name="email" type="email" id="email" class="form-control is-invalid">

    <div class="invalid-feedback">
        The email field is required.
    </div>
</div>
```

### Component Customization

You can extend any component to modify its behavior:

#### 1. Create a Custom Component

```php
<?php

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

#### 2. Register Your Custom Component

In your `AppServiceProvider`:

```php
use Illuminate\Support\Facades\Blade;
use App\View\Components\CustomButton;

public function boot()
{
    Blade::component('custom-button', CustomButton::class);
}
```

#### 3. Use Your Custom Component

```blade
<x-custom-button label="My Custom Button" />
```

**Output HTML:**
```html
<button type="button" id="btn_60fb5d1a2c810" class="btn btn-primary my-custom-class">
    My Custom Button
</button>
```

## Complete Examples

### Registration Form

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

### User Settings with Tabs

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
        
        <!-- Other tab contents would be defined here -->
    </x-tab>
</x-card>
```

### Data Table with CRUD Actions

```blade
<x-card card-title="Users Management" card-buttons='<x-button label="Add User" icon="fas fa-plus" color="success" data-bs-toggle="modal" data-bs-target="#addUserModal" />'>
    <x-table striped hover sortable searchable responsive>
        <x-slot name="thead">
            <x-table-head sortable sort-by="id" width="80px">ID</x-table-head>
            <x-table-head sortable sort-by="name">Name</x-table-head>
            <x-table-head sortable sort-by="email">Email</x-table-head>
            <x-table-head sortable sort-by="role">Role</x-table-head>
            <x-table-head sortable sort-by="created_at">Created</x-table-head>
            <x-table-head sortable="false" align="center" width="150px">Actions</x-table-head>
        </x-slot>
        
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="text-center">
                        <x-button-group size="sm">
                            <x-button icon="fas fa-eye" color="info" size="sm" href="{{ route('users.show', $user) }}" />
                            <x-button icon="fas fa-edit" color="warning" size="sm" data-bs-toggle="modal" data-bs-target="#editUserModal" data-user-id="{{ $user->id }}" />
                            <x-delete action="{{ route('users.destroy', $user) }}" label='<i class="fas fa-trash"></i>' class="btn-sm btn-danger" />
                        </x-button-group>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
    
    <div class="mt-4">
        <x-pagination :collection="$users" />
    </div>
</x-card>

<!-- Add User Modal -->
<x-modal id="addUserModal" modal-title="Add New User" size="lg">
    <x-form action="{{ route('users.store') }}" id="add-user-form">
        <x-form-group name="name" label="Full Name" required>
            <x-input name="name" placeholder="Enter full name" />
        </x-form-group>
        
        <x-form-group name="email" label="Email Address" required>
            <x-email name="email" placeholder="Enter email address" />
        </x-form-group>
        
        <x-form-group name="role" label="Role" required>
            <x-select name="role" :options="['admin' => 'Administrator', 'editor' => 'Editor', 'user' => 'Regular User']" placeholder="Select role" />
        </x-form-group>
        
        <x-form-group name="password" label="Password" required>
            <x-password name="password" />
        </x-form-group>
        
        <x-form-group name="password_confirmation" label="Confirm Password" required>
            <x-password name="password_confirmation" />
        </x-form-group>
    </x-form>
    
    <x-slot name="modalFooter">
        <x-button type="button" color="secondary" data-bs-dismiss="modal">Cancel</x-button>
        <x-button type="submit" color="primary" form="add-user-form">Save User</x-button>
    </x-slot>
</x-modal>
```

## Troubleshooting

### Common Issues

#### 1. Components Not Rendering Correctly

Make sure Bootstrap 5 CSS is properly included in your layout file:

```html
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
```

#### 2. JavaScript Features Not Working

Ensure that Bootstrap 5 JavaScript is loaded and jQuery is included for AJAX forms:

```html
<!-- jQuery (required for AJAX forms) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (required for dropdowns, modals, etc.) -->
<script src="{{ asset('js/app.js') }}" defer></script>
```

#### 3. Icons Not Displaying

Add Font Awesome to your layout:

```html
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
```

#### 4. Form Validation Not Working

Make sure your controller is using Laravel's validation correctly and returning back with errors:

```php
$request->validate([
    'email' => 'required|email',
    // more validation rules
]);
```

Or for AJAX forms, ensure you're returning the correct JSON structure:

```php
return response()->json([
    'success' => false,
    'message' => 'Validation failed',
    'errors' => $validator->errors(),
]);
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Credits

- [TWENY LIMITED](https://tweny.co.tz)
- [All Contributors](../../contributors)