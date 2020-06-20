<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->group(['prefix' => 'admins'], function () use ($router) {
        $router->get('', 'AdminController@index');
        $router->post('', 'AdminController@store');
        $router->get('{id}', 'AdminController@show');
        $router->put('{id}', 'AdminController@update');
        $router->delete('{id}', 'AdminController@destroy');
    });
});

$router->post('/api/auth', 'AuthController@buildToken');
