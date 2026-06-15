<?php

namespace Shreejan\DashArrange;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Shreejan\DashArrange\Console\Commands\InstallDashArrange;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/**
 * DashArrange Service Provider.
 *
 * Registers package assets, migrations, views, and commands.
 */
class DashArrangeServiceProvider extends PackageServiceProvider
{
    /**
     * Configure the package.
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('dash-arrange')
            ->hasConfigFile('dash-arrange')
            ->hasViews('dash-arrange')
            ->hasTranslations()
            ->hasMigrations([
                '2025_01_09_000000_create_user_widget_preferences_table',
            ])
            ->hasCommands([
                InstallDashArrange::class,
            ]);
    }

    /**
     * Boot the package.
     */
    public function packageBooted(): void
    {
        parent::packageBooted();

        // Publish Dashboard stub
        $this->publishes([
            __DIR__.'/../stubs/Dashboard.php.stub' => app_path('Filament/Pages/Dashboard.php'),
        ], 'dash-arrange-dashboard');

        // Register assets
        FilamentAsset::register([
            Js::make('sortablejs', 'https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js')
                ->loadedOnRequest(),
            Css::make('dashboard-customization', __DIR__.'/../resources/dist/css/dashboard-customization.css'),
        ], package: 'shreejan/dash-arrange');
    }
}
