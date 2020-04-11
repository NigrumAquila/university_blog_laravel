<?php

Route::get('/', 'MainController@index')->name('index');
Route::get('/results', 'MainController@results')->name('results');
Route::get('/subjects', 'MainController@subjects')->name('subjects');

Route::resource('/faculties', 'FacultiesController', ['only' => ['index', 'show']]);
Route::resource('/groups', 'GroupsController', ['only' => ['index', 'show']]);
Route::resource('/group_subjects', 'GroupSubjectsController', ['only' => ['index', 'show']]);
Route::resource('/lecturers', 'LecturersController', ['only' => ['index']]);
Route::resource('/students', 'StudentsController', ['only' => ['index']]);

Route::group(['middleware' => 'role'], function()
{
    Route::resource('/faculties', 'FacultiesController', ['only' => ['store', 'edit', 'update', 'destroy']]);
    Route::resource('/groups', 'GroupsController', ['only' => ['store', 'edit', 'update', 'destroy']]);
    Route::resource('/group_subjects', 'GroupSubjectsController', ['only' => ['edit', 'update']]);
    Route::resource('/lecturers', 'LecturersController', ['only' => ['show', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('/students', 'StudentsController', ['only' => ['store', 'show', 'edit', 'update', 'destroy']]);
    Route::resource('/users', 'Admin\UsersController');
    Route::get('/faculties/{id}/delete', 'FacultiesController@showDeleteForm')->name('faculties.showDeleteForm');
    Route::get('/groups/{id}/delete', 'GroupsController@showDeleteForm')->name('groups.showDeleteForm');
});

Route::group(['middleware' => ['web']], function() 
{
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@showLogoutForm']); 
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout.post', 'uses' => 'Auth\LoginController@logout']); 
});
