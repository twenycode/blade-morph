# Laravel BladeMorph Documentation
A comprehensive set of Laravel Blade components to accelerate your UI development.

This documentation provides comprehensive examples of each component in the Laravel BladeMorph package, showing both the Blade usage syntax and the resulting HTML output.

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

### 1. Install Laravel BladeMorph

```bash
composer require twenycode/blademorph
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
php artisan vendor:publish --tag="blademorph-config"
```

To customize the component views:

```bash
# Publish views for customization
php artisan vendor:publish --tag="blademorph-views"
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