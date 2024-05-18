<?php

use App\Http\Controllers\GenderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function() {
	Route::get('/', 'login')->name('login');
	Route::post('/process/login', 'processLogin');
});
Route::group(['middleware' => 'auth'], function() {
	Route::controller(UserController::class)->group(function() {
		Route::get('/user/list', 'index');
		Route::get('/user/create', 'create');
		Route::get('/user/show/{id}', 'show');
		Route::get('/user/edit/{id}', 'edit');
		Route::get('/user/delete/{id}', 'delete');
		Route::post('/user/store', 'store');
		Route::put('/user/update/{id}', 'update');
		Route::delete('/user/destroy/{user}', 'destroy');
		Route::get('/process/logout', 'processLogout');
	});
	
	Route::controller(GenderController::class)->group(function() {
		Route::get('/genders', 'index');
		Route::get('/gender/create', 'create');
		Route::get('/gender/show/{id}', 'show');
		Route::get('/gender/delete/{id}', 'delete');
		Route::get('/gender/edit/{id}', 'edit');
		Route::post('/gender/store', 'store');
		Route::delete('/gender/destroy/{gender}', 'destroy');
		Route::put('/gender/update/{gender}', 'update');
	});
});