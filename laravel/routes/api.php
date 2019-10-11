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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('counts', 'Api\Count\CountController@index')->name('counts.index');
Route::post('counts', function (Request $request){
    $offset = $request->offset;
    $limit = $request->limit;
    return (new CountCollection(Count::limit($limit)->offset($offset)->get()));
});

Route::get('user/{id}', function($id) {

})->name('user.id');


Route::post('users', 'Api\User\UserController@store');

Route::get('counts/{id}', 'Api\Count\CountController@show')->name('counts.show');

//Route::post('counts', 'Api\Count\CountController@store')->name('counts.store');

Route::put('counts/{id}', 'Api\Count\CountController@update')->name('counts.update');

Route::patch('counts/{id}', 'Api\Count\CountController@update')->name('counts.update');

Route::delete('counts/{id}', 'Api\Count\CountController@destroy')->name('counts.destroy');
