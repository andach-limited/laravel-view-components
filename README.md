# Laravel View Components by Andach

[![Latest Version on Packagist](https://img.shields.io/packagist/v/andach/laravel-view-components.svg?style=flat-square)](https://packagist.org/packages/andach/laravel-view-components)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/andach/laravel-view-components/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/andach/laravel-view-components/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/andach/laravel-view-components/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/andach/laravel-view-components/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/andach/laravel-view-components.svg?style=flat-square)](https://packagist.org/packages/andach/laravel-view-components)

This is the standard Laravel form components package for Andach Limited. It helps us keep our apps all consistently formatted and branded. It is not likely to be of use to most people in its current state, but has been released open source in the hope that it will help some people learn and understand how to make their own similar packages. 

## Installation

You can install the package via composer:

```bash
composer require andach/laravel-view-components
php artisan view-components:install
```

Then publish the js with:

```bash
php artisan vendor:publish --tag=view-components-assets
```

And if desired, can publish the config and views with:

```bash
php artisan vendor:publish --tag=view-components-config
php artisan vendor:publish --tag=view-components-views
```

The config file can then be edited to point the views towards your local copy to modify them if needed.

### Tailwind

You will need Tailwind and FontAwesome installed in your laravel project:

```bash
npm install tailwindcss @tailwindcss/vite @fortawesome/fontawesome-free
npm install 
```

Also update your ```resources/css/app.css to include:```

```css
@import 'tailwindcss';
@import '@fortawesome/fontawesome-free/css/all.css';

@source '../../vendor/andach/laravel-view-components/src/Components/*.php';
@source '../../vendor/andach/laravel-view-components/resources/views/**/*.blade.php';
@source '../../vendor/andach/laravel-view-components/config/view-components.php';
@source '../../config/view-components.php';
```

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
