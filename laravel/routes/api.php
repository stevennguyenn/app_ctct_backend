<?php

use Illuminate\Http\Request;
use App\User;
use \App\Http\Resources\CountCollection;
use \App\Models\Count;
use App\Http\Requests\User\UserRequest;
// use \App\Http\Controllers\Api\User\UserController;
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

Route::group(['prefix' => 'users'], function(){
    Route::post('login', 'Api\User\UserController@login');
    Route::post('register', 'Api\User\UserController@register');

//    Route::group(['middleware' => 'auth:api'], function(){
//        Route::get('logout', 'Api\User\UserController@logout');
//        Route::get('user', 'Api\User\UserController@user');
//    });
});

Route::post('counts', function (Request $request){
    $offset = $request->offset;
    $limit = $request->limit;
    return (new CountCollection(Count::limit($limit)->offset($offset)->get()));
});


Route::get('counts/{id}', 'Api\Count\CountController@show')->middleware("auth:api");

Route::put('counts/{id}', 'Api\Count\CountController@update')->name('counts.update');

Route::patch('counts/{id}', 'Api\Count\CountController@update')->name('counts.update');

Route::delete('counts/{id}', 'Api\Count\CountController@destroy')->name('counts.destroy');
