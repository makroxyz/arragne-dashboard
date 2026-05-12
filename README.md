# DashArrange

A Filament plugin that allows users to customize their dashboard widgets with drag & drop functionality.

[![GitHub](https://img.shields.io/badge/GitHub-Repository-blue)](https://github.com/shreejanpandit/arragne-dashboard)

## Installation

```bash
composer require shreejan/dash-arrange
```

## Setup

### Quick Setup (Recommended)

Run the install command which will automatically:
- Publish and run migrations
- Publish the Dashboard stub

```bash
php artisan dash-arrange:install
```
Make sure your `app/Providers/Filament/AdminPanelProvider.php` uses the correct Dashboard class:

```php
use App\Filament\Pages\Dashboard; // Instead of Filament\Pages\Dashboard
```

That's it! The package is now ready to use.

### Manual Setup

If you prefer to set up manually:

#### 1. Publish and Run Migrations

```bash
php artisan vendor:publish --tag=dash-arrange-migrations
php artisan vendor:publish --tag=dash-arrange-dashboard
php artisan migrate
```

#### 2. Update Your Dashboard Page

Update your `app/Filament/Pages/Dashboard.php` to use DashArrange:

```php
<?php

namespace App\Filament\Pages;

use Shreejan\DashArrange\Traits\HasDashArrange;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    use HasDashArrange;

    protected string $view = 'dash-arrange::dashboard';

    public function mount(): void
    {
        // Initialize DashArrange functionality
        $this->mountHasDashArrange();
    }
}
```

#### 3. Update AdminPanelProvider

Make sure your `app/Providers/Filament/AdminPanelProvider.php` uses the correct Dashboard class:

```php
use App\Filament\Pages\Dashboard; // Instead of Filament\Pages\Dashboard
```

#### 4. (Optional) Publish Configuration

```bash
php artisan vendor:publish --tag=dash-arrange-config
```

## Usage

Once installed, users will see a **"Customize My Dashboard"** button on their dashboard. They can:

- **Drag and drop** widgets to reorder them
- **Show/hide** widgets using checkboxes
- **Save** their preferences (stored per user)
- **Revert** unsaved changes with the Cancel button
- Widget preferences are **persistent** and **user-specific**

## Configuration

Edit `config/dash-arrange.php` to customize:

- **Grid columns**: Default number of columns for the dashboard grid
- **User model**: Customize the user model if needed
- **Permission checks**: Add custom permission logic for widgets
- **Customize Dashboard Button**: 
  - `customize_dashboard_title`: The title text for the customize dashboard button (default: 'Customize My Dashboard')
  - `customize_dashboard_button_color`: The color of the customize dashboard button. Colors can be added in `AdminPanelProvider.php` -> `colors()` method (default: 'primary')

## Requirements

- PHP ^8.2
- Filament ^4.0
- Laravel ^12.0

## Features

- ✅ Drag & drop widget reordering
- ✅ Show/hide widgets with checkboxes
- ✅ User-specific preferences (stored in database)
- ✅ Permission-based widget visibility (FilamentShield compatible)
- ✅ Responsive grid layout
- ✅ Widget column span support
- ✅ Easy installation command
- ✅ Fully customizable configuration

## Support

- **GitHub Repository**: [https://github.com/shreejanpandit/arragne-dashboard](https://github.com/shreejanpandit/arragne-dashboard)
- **Issues**: [Report a bug or request a feature](https://github.com/shreejanpandit/arragne-dashboard/issues)

## Credits

- [Shreejan Pandit][link-shreejan]
- [Prajwal Banstola][link-prajwal]

### Security

If you discover a security vulnerability within this package, please send an e-mail to shreezanpandit@gmail.com. All security vulnerabilities will be promptly addressed.

### 📄 License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[link-shreejan]: https://github.com/shreejanpandit
[link-prajwal]: https://github.com/prazwal-bns
