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

    $router->group(['prefix' => 'readers'], function () use ($router) {
        $router->get('', 'ReaderController@index');
        $router->post('', 'ReaderController@store');
        $router->get('{id}', 'ReaderController@show');
        $router->put('{id}', 'ReaderController@update');
        $router->delete('{id}', 'ReaderController@destroy');
    });

    $router->group(['prefix' => 'projects'], function () use ($router) {
        $router->get('', 'ProjectController@index');
        $router->post('', 'ProjectController@store');
        $router->get('{id}', 'ProjectController@show');
        $router->put('{id}', 'ProjectController@update');
        $router->delete('{id}', 'ProjectController@destroy');
    });

    $router->group(['prefix' => 'categories'], function () use ($router) {
        $router->get('', 'CategoryController@index');
        $router->post('', 'CategoryController@store');
        $router->get('{id}', 'CategoryController@show');
        $router->put('{id}', 'CategoryController@update');
        $router->delete('{id}', 'CategoryController@destroy');
    });

    $router->group(['prefix' => 'posts'], function () use ($router) {
        $router->get('', 'PostController@index');
        $router->post('', 'PostController@store');
        $router->get('{id}', 'PostController@show');
        $router->put('{id}', 'PostController@update');
        $router->delete('{id}', 'PostController@destroy');
    });

    $router->group(['prefix' => 'comments'], function () use ($router) {
        $router->get('', 'CommentController@index');
        $router->post('', 'CommentController@store');
        $router->get('{id}', 'CommentController@show');
        $router->put('{id}', 'CommentController@update');
        $router->delete('{id}', 'CommentController@destroy');
    });

    $router->post('admin/login', 'LoginController@verifyAdminCredentials');
    $router->post('/login', 'LoginController@verifyReaderCredentials');
});

$router->post('/api/auth', 'AuthController@buildToken');
