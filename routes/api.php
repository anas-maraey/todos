<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 * Auth Routes
 */
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

/*
 * Route Collections
 */
Route::group(['middleware' => 'auth:api'], function(){
    // Users Route Collection
    Route::get('profile', 'UsersController@show');
    Route::get('users', 'UsersController@index');
    Route::put('users/{id}', 'UsersController@update');
    // TODOS Route Collection
    Route::post('todos', 'TodosController@create');
    Route::get('todos', 'TodosController@index');
    Route::get('todos/{id}', 'TodosController@show');
    Route::put('todos/{id}', 'TodosController@update');
    Route::delete('todos/{id}', 'TodosController@delete');
});