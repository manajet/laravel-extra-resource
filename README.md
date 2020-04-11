# Extra Resource for Laravel

[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

## About

This packages allows you to add extra parameters to your Eloquent API resources and collections.

Highly inspired by [gdebrauwer's issue answer](https://github.com/laravel/framework/issues/23826) and [his pull-request](https://github.com/laravel/framework/pull/28358).

## Installation

Require the `manajet/laravel-extra-resource` package in your `composer.json` and update your dependencies:
```sh
composer require manajet/laravel-extra-resource
```

## Create resource

You can create a new resource with this command:

```sh
php artisan make:extraresource MyResource
```

As well as Laravel make:resource command, you can pass `--collection` option to create a new collection with extra parameters:

```sh
php artisan make:extraresource MyCollection --collection
```

## Usage

You can use your resources as you did before. To pass extra parameters, use the `using` method.

Resource:

```php
$user = User::find(1);
return (new UserResource($user))->using(['foo' => 'bar']);
```

And in your Resource class:

```php
return [
    'id' => $this->id,
    'name' => $this->name,
    'email' => $this->email,
    'foo' => $this->extra['foo'],
]
```

Collection:

Collection will try to use your Resource class, so you need to create it first.

```php
$users = User::all();
return (new UserCollection($users))->using(['foo' => 'bar']);
```

You can also use it with the static `collection` method:


```php
$users = User::all();
return UserResource::collection($users)->using(['foo' => 'bar']);
```
    
## License

Released under the MIT License, see [LICENSE](LICENSE).
