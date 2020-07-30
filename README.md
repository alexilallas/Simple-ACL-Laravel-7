# Simple-ACL-Laravel-7
Just a Simple ACL to protect routes of your aplication

## Requirements

* "php": "^7.2.5"

## Getting Started
##### 1. Add the Middeware to the $routeMiddleware in `app/Http/Kernel.php`
```php
protected $routeMiddleware = [
    ....
    'acl' => \App\Http\Middleware\CheckPermission::class,
];
```
##### 2. Create the basic Authentication of [Laravel](https://laravel.com/docs/7.x/authentication)

* `composer require laravel/ui`

* `php artisan ui vue --auth`

  then

* `npm install && npm run dev`
##### 3. Run the Migrations

`php artisan migrate --seed`

##### 4. Protect the routes!

*Example of route protected with the **acl** Middleware*
```php

Route::get('/home',
    [
    'middleware' => 'acl:visualizarDashboard',
    'uses' => 'HomeController@index'
    ]
);

```
