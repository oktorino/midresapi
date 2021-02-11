<!-- <p align="center">
    <img src="https://raw.githubusercontent.com/oktorino/midresapi/stable/docs/logo.png" alt="Collision logo" width="480">
    <br>
    <img src="https://raw.githubusercontent.com/oktorino/midresapi/stable/docs/example.png" alt="Collision code example" height="300">
</p> -->

<p align="center">
  <!-- <a href="https://travis-ci.org/oktorino/midresapi"><img src="https://img.shields.io/travis/oktorino/midresapi/stable.svg" alt="Build Status"></img></a> -->
  <a href="https://scrutinizer-ci.com/g/oktorino/midrespapi"><img src="https://img.shields.io/scrutinizer/g/oktorino/midresapi.svg" alt="Quality Score"></img></a>
  <a href="https://packagist.org/packages/oktorino/midrespapi"><img src="https://poser.pugx.org/oktorino/midresapi/d/total.svg" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/oktorino/midrespapi"><img src="https://poser.pugx.org/oktorino/midresapi/v/stable.svg" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/oktorino/midrespapi"><img src="https://poser.pugx.org/oktorino/midresapi/license.svg" alt="License"></a>
</p>

---

Midres api , return response with consistency structure in json, 

* simple use.
* simple return models,collecton and also fractal transofrmer
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
        "email": "admin@basahinajadeh.com",
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
            "email": "dancuk@dummy.com"
        },
        {
            "id": 5531,
            "email": "jancuk@dummy.com"
        }
    ]
 }
 ```
 that also support return fractal in tranformer



 ## Failed Response
 * reponse mistakes
 ```json
 {
    "status_code": 500,
    "success": false,
    "message": "Something went wrong !!!",
    "data": null,
    "errors": [
        {
            "message": "Undefined variable: undefine_var",
            "file": "/home/tuah/apps/consistency_response/routes/api.php",
            "line": 24
        }
    ]
}
 ```
  * Mistake on purpose
  ex : 
```php
  return response("can't be proccess");
```
 ```json
{
    "status_code": 422,
    "success": false,
    "message": "can't proccess",
    "data": null
}
 ```

* Return failed validation
```json
{
    "status_code": 422,
    "success": false,
    "message": "The given data was invalid.",
    "data": null,
    "errors": {
        "validation": [
            "The attendance no field is required."
        ]
    }
}
```




## License


midrespi createb  by [Tuah Oktorino](https://www.linkedin.com/in/tuah-oktorino/).
