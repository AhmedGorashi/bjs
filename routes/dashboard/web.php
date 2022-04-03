<?php
Route::prefix('dashboard')->name('dashboard.')->middleware(['auth','admin'])->group(function () {
    Route::get('/', 'WelcomeController@index')->name('welcome');
    Route::resource('jobs', 'JobsController');
    Route::get('jobs-list', 'JobsController@jobsList')->name('jobs-list');

    Route::resource('users', 'UserController');


});//end of dashboard routes
