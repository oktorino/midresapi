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
* return simple collection in models ex : 
  ```php
    return App\User::first();
  ```
* Handling exception.
* Handling validation exception.

## Installation 
### Requires :
* PHP 7.2 * or latest
* Laravel 7,8, or latest


Installation Midresapi in [Composer](https://getcomposer.org):

```bash
composer require oktorino/midresapi --dev
```

### Register to MiddlewareRoute

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
 ## Usage & Example 
 ### return success message
 ```php
  return "successs";
  #or
  return response("success");
 ```
response : 
 ```json
 {
  "status_code": 200,
  "success": true,
  "message": "success",
  "data": null
}
 ```
 ### return with data
 #### return model; 
 ```php
  $user=\App\User::first();
  return response($user);
 ```
response : 
 ```json
 {
    "status_code": 200,
    "success": true,
    "message": "ok",
    "data": {
        "id": 1,
        "email": "admin@crmsaba.com",
        "username": "admin",
    }
 }
 ```
  #### return collection; 
 ```php
  $users=\App\User::limit(2)->get();
  return response($users);
 ```
response : 
 ```json
 {
    "status_code": 200,
    "success": true,
    "message": "ok",
    "data": [
        {
            "id": 5532,
            "email": "danu@saba.com"
        },
        {
            "id": 5531,
            "email": "suwandi5353@gmail.com"
        }
    ]
 }
 ```
 that also support return fractal in tranformer






## License


midrespi createb  by [Tuah Oktorino](https://www.linkedin.com/in/tuah-oktorino/).
