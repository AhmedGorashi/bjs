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

Route::name('site.')->group(function () {
    Route::get('/', 'Site\HomeController@index')->name('home');
    Route::get('/profile', 'Site\HomeController@profile')->name('profile');
    Route::get('/home', 'Site\HomeController@index')->name('home');
    Route::get('/jobs', 'Site\HomeController@jobs')->name('jobs');
    Route::get('/job_details/{id}', 'Site\HomeController@jobDetails')->name('job_details');
    Route::get('/apply', 'Site\HomeController@apply')->name('apply');
    Route::post('/user_experience', 'Site\HomeController@userExperience')->name('user_experience');
    Route::post('/profile_store', 'Site\HomeController@profileStore')->name('profile_store');


});


Auth::routes();

