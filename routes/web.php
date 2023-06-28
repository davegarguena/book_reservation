<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$router->get('/', function () use ($router) {
return $router->app->version();
});
// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
$router->get('/users',['uses' => 'UserController@getUsers']);

});
// more simple routes
$router->get('/users',['uses' => 'UserController@getUsers']);
$router->get('/users', 'UserController@index'); // get all users
$router->post('/adduser', 'UserController@add'); // create new user
$router->get('/getuser/{id}', 'UserController@show'); // get user by id
$router->put('/updateuser/{id}', 'UserController@update'); // update user
$router->patch('/updateuser/{id}', 'UserController@update'); // update user
$router->delete('/deleteuser/{id}', 'UserController@delete'); // delete
