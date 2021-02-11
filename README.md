<!-- <p align="center">
    <img src="https://raw.githubusercontent.com/nunomaduro/collision/stable/docs/logo.png" alt="Collision logo" width="480">
    <br>
    <img src="https://raw.githubusercontent.com/nunomaduro/collision/stable/docs/example.png" alt="Collision code example" height="300">
</p>

<p align="center">
  <a href="https://travis-ci.org/nunomaduro/collision"><img src="https://img.shields.io/travis/nunomaduro/collision/stable.svg" alt="Build Status"></img></a>
  <a href="https://scrutinizer-ci.com/g/nunomaduro/collision"><img src="https://img.shields.io/scrutinizer/g/nunomaduro/collision.svg" alt="Quality Score"></img></a>
  <a href="https://packagist.org/packages/nunomaduro/collision"><img src="https://poser.pugx.org/nunomaduro/collision/d/total.svg" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/nunomaduro/collision"><img src="https://poser.pugx.org/nunomaduro/collision/v/stable.svg" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/nunomaduro/collision"><img src="https://poser.pugx.org/nunomaduro/collision/license.svg" alt="License"></a>
</p> -->

---

Midres api , return response with consistency structure in json, 

* simple use.
* Handling exception.
* Handling validation exception.

## Installation & Usage

> **Requires [PHP 7.2.5+](https://php.net/releases/)**

Require Collision using [Composer](https://getcomposer.org):

```bash
composer require oktorino/midresapi --dev
```

## Register to MiddlewareRoute

Configure in kernel.php, and place at middllewareRoute :
```php
'midresapi' => \Oktorino\Midresapi\ConsistencyStructure::class;
```
then call this "midresapi" on your api routes. example in api.php : 
```php
Route::get('/', function(){
    return response("response work !!!");
})->middleware("midresapi");

```




## License


midrespi createb  by [Tuah Oktorino](https://www.linkedin.com/in/tuah-oktorino/).
