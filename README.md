# Blank Authentication Views for Laravel

This package gives you a blank starting point for your authentication views.

> v2.0 supports Laravel ^7.0

Beside the most common [laravel/ui](https://github.com/laravel/ui) package `blank-auth` gives you only the general **blank** starting point, **without any preset**, of the common authentication views.

## Setup

0. Require the package with Composer

```bash
composer require iag/blank-auth
```

or inside your composer.json:

```json
{
    "iag/blank-auth": "^2.0"
}
```

1. Once the `iag/blank-auth` package has been installed, you MUST install the frontend views using the Install Artisan command:

```bash
php artisan blankauth:install
```

2. Go to your `../resources/views` folder and style or modify the auth views as your needs.

3. Open the auth routes on `routes/web.php` using the `Auth::routes();` function.

4. If you wish to use the `account` landing page, remember to open the route:

```php
Route::get('/account', function () {
    return view('account.index');
})->name('account.index');
```

or simply:

```php
Route::view('/account', 'account.index')->name('account.index');
```

## Integration with `laravel/ui`

This package can be easily integrate with `laravel/ui`. Use `iag/blank-auth` to scaffold a blank, solid and semantic structure for your auth process and use `laravel/ui` to manage the entire auth process.

0. You can require `laravel/ui` package:

```json
{
    "iag/blank-auth": "^2.0",
    "laravel/ui": "^2.0"
}
```

1. Integrates only controllers:

```bash
php artisan ui:controllers
```

2. Path customization

You can customize the post-authentication redirect path using the `HOME` constant defined in your `RouteServiceProvider`:

```php
public const HOME = '/account';
```

## Extras

This package gives you a solid HTML5 semantic for the following views:

* a layout and navbar preset,
* a blank account index views,
* all Laravel auth views.
