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

$router->group(['prefix' => 'user'], function () use ($router) {
    $router->get('transaction', 'TransactionController@getData');
    $router->get('transaction/{id}', 'TransactionController@getDataById');
    $router->post('transaction/', 'TransactionController@addData');
    $router->put('transaction/{id}', 'TransactionController@updateData');
    $router->delete('transaction/{id}', 'TransactionController@deleteData');

    $router->get('customer', 'UserController@getData');
    $router->get('customer/{id}', 'UserController@getDataById');
    $router->post('customer/', 'UserController@addData');
    $router->put('customer/{id}', 'UserController@updateData');
    $router->delete('customer/{id}', 'UserController@deleteData');
});

