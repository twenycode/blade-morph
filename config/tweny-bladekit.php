<?php

use TwenyCode\TwenyUiKit\Components;


return [

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from Blade UI Kit are loaded in. You can
    | disable or overwrite any component class or alias that you want.
    |
    */

    'components' => [
        //  Buttons
        'button' => Components\Button\Button::class,
        'delete' => Components\Button\Delete::class,
        'dropleft' => Components\Button\Dropleft::class,

        //  Bootstrap Div Classes
        'card' => Components\Div\Card::class,
        'alert' => Components\Div\Alert::class,
        'modal' => Components\Div\Modal::class,

        //  Forms Elements
        'form' => Components\Forms\Form::class,
        'error' => Components\Forms\Error::class,
        'ajax-error' => Components\Forms\AjaxError::class,
        'label' => Components\Forms\Elements\Label::class,
        'input' => Components\Forms\Elements\Input::class,
        'password' => Components\Forms\Elements\Password::class,
        'email' => Components\Forms\Elements\Email::class,
        'textarea' => Components\Forms\Elements\Textarea::class,
        'checkbox' => Components\Forms\Elements\Checkbox::class,
        'pick-date' => Components\Forms\Elements\PickDate::class,

        //  Navigation
        'nav-link' => Components\Navigation\NavLink::class,
        'nav-modal' => Components\Navigation\NavModal::class,

        //  Table
        'table' => Components\Table\Table::class

    ],


];
