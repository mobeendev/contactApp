<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// route to show/process the login form

Route::get('login', [
    'uses' => 'AuthController@showLogin',
    'as' => 'login'
]);


Route::post('login', [
    'uses' => 'AuthController@doLogin',
    'as' => 'login'
]);


Route::get('/logout', [
    'uses' => 'AuthController@logout',
    'as' => 'logout'
]);

Route::get('register', [
    'uses' => 'AuthController@showRegister',
    'as' => 'register'
]);

Route::post('register', [
    'uses' => 'AuthController@doRegister',
    'as' => 'doregister'
]);
