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
//
//Route::group([
//    'prefix' => 'auth'
//], function () {
//    Route::post('login', 'API\PassportController@login');
//    Route::post('register', 'API\PassportController@signup');
//
//    Route::group(['middleware' => ['auth:api', 'web']], function ()
//    {
//        Route::get('logout', 'API\PassportController@logout');
//        Route::get('user', 'API\PassportController@user');
//    });
// });


/**
 * Laravel JWT API Routers
 */
Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');

    Route::get('user', 'ApiController@getAuthUser');

    Route::get('articles', 'API\ArticlesController@index');
    Route::get('articles/{id}', 'API\ArticleController@show');
    Route::post('articles', 'API\ArticleController@store');
    Route::put('articles/{id}', 'API\ArticleController@update');
    Route::delete('articles/{id}', 'API\ArticleController@destroy');
});

//Route::post('login', 'API\PassportController@login');
//Route::post('register', 'API\PassportController@register');
//$router->group(['middleware' => 'auth:api'], function () use ($router) {
//    Route::get('logout', 'API\PassportController@logout');
//});
//Route::middleware('auth:api')->group(function () {
//    Route::get('user', 'API\PassportController@details');
//});
