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
        'dropleft' => Components\Button\Dropleft::class,
        'button-group' => Components\Button\ButtonGroup::class,

        // Bootstrap Div Classes
        'card' => Components\Div\Card::class,
        'alert' => Components\Div\Alert::class,
        'modal' => Components\Div\Modal::class,
        'toast' => Components\Div\Toast::class,
        'accordion' => Components\Div\Accordion::class,
        'accordion-item' => Components\Div\AccordionItem::class,
        'tab' => Components\Div\Tab::class,
        'tab-content' => Components\Div\TabContent::class,
        'progress' => Components\Div\Progress::class,

        // Forms Elements
        'form' => Components\Forms\Form::class,
        'form-group' => Components\Forms\FormGroup::class,
        'error' => Components\Forms\Error::class,
        'ajax-error' => Components\Forms\AjaxError::class,
        'label' => Components\Forms\Elements\Label::class,
        'input' => Components\Forms\Elements\Input::class,
        'password' => Components\Forms\Elements\Password::class,
        'email' => Components\Forms\Elements\Email::class,
        'textarea' => Components\Forms\Elements\Textarea::class,
        'checkbox' => Components\Forms\Elements\Checkbox::class,
        'radio' => Components\Forms\Elements\Radio::class,
        'select' => Components\Forms\Elements\Select::class,
        'multi-select' => Components\Forms\Elements\MultiSelect::class,
        'file-upload' => Components\Forms\Elements\FileUpload::class,
        'pick-date' => Components\Forms\Elements\PickDate::class,
        'toggle-switch' => Components\Forms\Elements\ToggleSwitch::class,

        // Navigation
        'nav-link' => Components\Navigation\NavLink::class,
        'nav-modal' => Components\Navigation\NavModal::class,
        'dropdown' => Components\Navigation\Dropdown::class,
        'dropdown-item' => Components\Navigation\DropdownItem::class,
        'breadcrumb' => Components\Navigation\Breadcrumb::class,
        'pagination' => Components\Navigation\Pagination::class,

        // Table
        'table' => Components\Table\Table::class,
        'table-head' => Components\Table\TableHead::class,
        'table-body' => Components\Table\TableBody::class,
        'table-row' => Components\Table\TableRow::class,
        'table-cell' => Components\Table\TableCell::class,
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
            'file' => 'form-control',
            'range' => 'form-range',
            'plaintext' => 'form-control-plaintext',
            'feedback-invalid' => 'invalid-feedback',
            'feedback-valid' => 'valid-feedback',
            'is-invalid' => 'is-invalid',
            'is-valid' => 'is-valid',
        ],
    ],
];