<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'student', 'middleware' => 'auth'], function ($router){

    // http://localhost/student
    $router->get('/', 'StudentController@index');

    //http://localhost/student/50
    $router->get('{id}', 'StudentController@find');

    //http://localhost/student
    $router->post('/', 'StudentController@create');

    //http://localhost/student/50
    $router->put('{id}', 'StudentController@update');

    //http://localhost/student/50
    $router->delete('{id}', 'StudentController@delete');
});