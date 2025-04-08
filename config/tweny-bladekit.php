<?php

use TwenyCode\LaravelBladeKit\Components;

return [
    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from Tweny UI Kit are loaded in. You can
    | disable or overwrite any component class or alias that you want.
    |
    */

    'components' => [
        // Buttons
        'button' => Components\Button\Button::class,
        'delete' => Components\Button\Delete::class,
        'button-group' => Components\Button\ButtonGroup::class,

        // Layout Components
        'card' => Components\Div\Card::class,
        'alert' => Components\Div\Alert::class,
        'modal' => Components\Div\Modal::class,
        'accordion' => Components\Div\Accordion::class,
        'tab' => Components\Div\Tab::class,

        // Forms Elements
        'form' => Components\Forms\Form::class,
        'form-group' => Components\Forms\FormGroup::class,
        'error' => Components\Forms\Error::class,
        'input' => Components\Forms\Elements\Input::class,
        'email' => Components\Forms\Elements\Email::class,
        'password' => Components\Forms\Elements\Password::class,
        'textarea' => Components\Forms\Elements\Textarea::class,
        'checkbox' => Components\Forms\Elements\Checkbox::class,
        'radio' => Components\Forms\Elements\Radio::class,
        'select' => Components\Forms\Elements\Select::class,
        'file-upload' => Components\Forms\Elements\FileUpload::class,

        // Navigation
        'nav-link' => Components\Navigation\NavLink::class,
        'dropdown' => Components\Navigation\Dropdown::class,
        'breadcrumb' => Components\Navigation\Breadcrumb::class,
        'pagination' => Components\Navigation\Pagination::class,

        // Table
        'table' => Components\Table\Table::class,
        'table-head' => Components\Table\TableHead::class,
        'table-body' => Components\Table\TableBody::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Styles
    |--------------------------------------------------------------------------
    |
    | Default styling classes applied to components
    |
    */
    'styles' => [
        'button' => [
            'base' => 'btn',
            'primary' => 'btn-primary',
            'secondary' => 'btn-secondary',
            'success' => 'btn-success',
            'danger' => 'btn-danger',
            'warning' => 'btn-warning',
            'info' => 'btn-info',
            'light' => 'btn-light',
            'dark' => 'btn-dark',
            'link' => 'btn-link',
            'small' => 'btn-sm',
            'large' => 'btn-lg',
        ],
        'form' => [
            'group' => 'mb-3',
            'control' => 'form-control',
            'label' => 'form-label',
            'check' => 'form-check',
            'check-input' => 'form-check-input',
            'check-label' => 'form-check-label',
            'select' => 'form-select',
            'feedback-invalid' => 'invalid-feedback',
            'feedback-valid' => 'valid-feedback',
            'is-invalid' => 'is-invalid',
            'is-valid' => 'is-valid',
        ],
    ],
];