<?php

use Illuminate\Http\Request;
use App\User;
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

//Route::get('counts', 'Api\Count\CountController@index')->name('counts.index');
Route::get('counts', function (){
    return new \App\Http\Resources\CountCollection(\App\Models\Count::paginate());
});

Route::get('counts/{id}', 'Api\Count\CountController@show')->name('counts.show');

Route::post('counts', 'Api\Count\CountController@store')->name('counts.store');

Route::put('counts/{id}', 'Api\Count\CountController@update')->name('counts.update');

Route::patch('counts/{id}', 'Api\Count\CountController@update')->name('counts.update');

Route::delete('counts/{id}', 'Api\Count\CountController@destroy')->name('counts.destroy');
