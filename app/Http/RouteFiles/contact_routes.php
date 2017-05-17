<?php

Route::get('dashboard', [
    'uses' => 'ContactAppController@dashboard',
    'as' => 'dashboard'
]);
Route::get('contacts/dashboard', [
    'uses' => 'ContactAppController@dashboard',
    'as' => 'contacts/dashboard'
]);
Route::get('contacts/all', [
    'uses' => 'ContactAppController@index',
    'as' => 'contacts/all'
]);
Route::get('contacts/create', [
    'uses' => 'ContactAppController@create',
    'as' => 'contacts/create'
]);
Route::post('contacts/save', [
    'uses' => 'ContactAppController@save',
    'as' => 'contacts/save'
]);
Route::get('contacts/show/{data}', [
    'uses' => 'ContactAppController@show',
    'as' => 'contacts/show'
]);
Route::post('contacts/show', [
    'uses' => 'ContactAppController@show',
    'as' => 'contacts/show'
]);
Route::get('contacts/delete/{cid}', [
    'uses' => 'ContactAppController@destroy',
    'as' => 'contacts/delete'
]);
Route::get('contacts/edit/{cid}', [
    'uses' => 'ContactAppController@edit',
    'as' => 'contacts/edit'
]);
Route::post('contacts/update/{cid?}', [
    'uses' => 'ContactAppController@update',
    'as' => 'contacts/update'
]);
Route::get('contacts/search', [
    'uses' => 'ContactAppController@search',
    'as' => 'contacts/search'
]);

Route::post('contacts/search', [
    'uses' => 'ContactAppController@processsearch',
    'as' => 'contacts/search'
]);
