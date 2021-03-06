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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Events
$router->group(['prefix' => 'events'], function () use ($router) {
    $router->get('/', ['as' => 'events-all', 'uses' => 'EventController@index']);
    $router->post('/add', ['as' => 'events-add', 'uses' => 'EventController@post']);
    $router->delete('/delete', ['as' => 'events-delete', 'uses' => 'EventController@delete']);
});