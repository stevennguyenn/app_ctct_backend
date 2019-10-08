<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('scheme/create_user', function(){
	Schema::create('user', function($table) {
		$table -> increments('id');
		$table -> string('name');
		$table -> integer('age');
		$table -> text('note') -> nullable();
		$table -> string('password');
		$table -> timestamps();
		$table -> string('img_src') -> nullable();
		$table -> string('token') -> nullable();
	});
});

Route::get('scheme/rename', function() {
	Schema::rename('User','user');
});

Route::get('scheme/change_attribute', function(){
	Schema::table('User', function($table){
		$table -> string('name', 50) -> change();
	});
});

Route::get('scheme/deleteUser', function(){
	Schema::dropIfExists("User");	
});


Route::get('schema/drop_column', function(){
	Schema::table("temp", function($table){
		$table -> dropColumn("name");
	});
});

Route::get('schema/addColumn', function(){
	Schema::table("temp", function($table){
		$table -> string("nameTemp");
	});
});

Route::get('schema/create/lesson', function(){
	Schema::create('lesson', function($table){
		$table -> increments('id');
		$table -> string('name') -> unique();
		$table -> timestamps();
		$table -> text('desc') -> nullable();
		$table -> integer('count_id') -> unsigned();
		$table -> foreign('count_id') -> references('id') -> on('count') -> onDelete('cascade');
	});
});



