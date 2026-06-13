<?php

use Illuminate\Support\Facades\Auth;

return [
    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | The user model class to use for widget preferences.
    |
    */
    'user_model' => \App\Models\User::class,

    /*
    |--------------------------------------------------------------------------
    | Dashboard Model
    |--------------------------------------------------------------------------
    |
    | The model class to use for storing dashboard arrangement data.
    |
    */
    'model' => \ArragneFramework\DashArrange\Models\DashboardArrangement::class,

    /*
    |--------------------------------------------------------------------------
    | User ID Resolver
    |--------------------------------------------------------------------------
    |
    | Closure to resolve the current user's ID.
    | Default: Auth::id()
    |
    | For multi-tenant apps, you might use:
    | 'user_id_resolver' => fn () => Tenant::getUserId(),
    |
    */
    'user_id_resolver' => fn () => Auth::id(),

    /*
    |--------------------------------------------------------------------------
    | Permission Check
    |--------------------------------------------------------------------------
    |
    | Closure to check if a widget can be viewed.
    | Receives the widget class name as parameter.
    |
    | Example with FilamentShield:
    | 'permission_check' => fn (string $widgetClass) => {
    |     $widget = resolve($widgetClass);
    |     return $widget->hasPermission() ?? true;
    | },
    |
    */
    'permission_check' => fn (string $widgetClass) => true,

    /*
    |--------------------------------------------------------------------------
    | Default Grid Columns
    |--------------------------------------------------------------------------
    |
    | Default grid column configuration for the dashboard.
    |
    */
    'default_grid_columns' => [
        'md' => 2,
        'xl' => 12,
    ],

    /*
    |--------------------------------------------------------------------------
    | Sortable Options
    |--------------------------------------------------------------------------
    |
    | Options for Sortable.js initialization.
    |
    */
    'sortable_options' => [
        'animation' => 150,
        'handle' => '[x-sortable-handle]',
    ],

    /*
    |--------------------------------------------------------------------------
    | Customize My Dashboard Button
    |--------------------------------------------------------------------------
    |
    | The title of the customize my dashboard button.
    | Customize button color, colors can be added in AdminPanelProvider.php -> colors array.
    |
    */
    'customize_dashboard_title' => 'Customize My Dashboard',
    'customize_dashboard_button_color' => 'primary',
];

