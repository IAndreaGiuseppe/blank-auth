# Blank Authentication Views for Laravel

This package gives you a blank starting point for your authentication layout.

Beside the most common [laravel/ui](https://github.com/laravel/ui) package `blank-auth` gives you only the general blank starting point, *without any preset*, of the common authentication views.

## Setup

0. Require the package with Composer

```bash
composer require iag/blank-auth
```

or inside your composer.json:

```json
{
    "iag/blank-auth": "^2.0.0"
}
```

1. Once the `iag/blank-auth` package has been installed, you must install the frontend views using the Install Artisan command:

```bash
php artisan blankauth:install
```

2. Go to your `project/resources/views` folder and style or modify the auth views as your needs.

3. Open the auth views on `routes/web.php` using the `Auth::routes();` function.

## Extras

This package gives you a solid HTML5 semantic for the following views:

* a layout and navbar preset,
* a blank account index views,
* all Laravel auth views.
