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
```

You can publish the config with:

```bash
php artisan view-components:install
```

And if desired, can publish the views with:

```
php artisan vendor:publish --tag=signoff-views
```

The config file can then be edited to point the views towards your local copy to modify them if needed.

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
