<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('articles', 'API\ArticlesController');

/*
 * Laravel Passport API for Authorizes
 *
*/
<<<<<<< HEAD
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'API\PassportController@login');
    Route::post('register', 'API\PassportController@signup');

    Route::group(['middleware' => ['auth:api', 'web']], function ()
    {
        Route::get('logout', 'API\PassportController@logout');
        Route::get('user', 'API\PassportController@user');
    });
 });
=======

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'API\PassportController@login');
    Route::post('register', 'API\PassportController@signup');

    Route::group([
        'middleware' => ['auth:api', 'web']
    ], function() {
        Route::get('logout', 'API\PassportController@logout');
        Route::get('user', 'API\PassportController@user');
    });
});
>>>>>>> 383e9099c4ccf962941f6a073d574d3aeb1d6102


//Route::post('login', 'API\PassportController@login');
//Route::post('register', 'API\PassportController@register');
//$router->group(['middleware' => 'auth:api'], function () use ($router) {
//    Route::get('logout', 'API\PassportController@logout');
//});
//Route::middleware('auth:api')->group(function () {
//    Route::get('user', 'API\PassportController@details');
//});
