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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::resource('notifications', 'NotificationController');

Route::resource('videos', 'VideoController');
Route::get('/videos/rubrique/{id}', 'VideoController@byRUbrique')->name('videos.byRubrique')->middleware('auth');
Route::get('/videos/delete/{id}', 'VideoController@destroy')->name('videos.delete')->middleware('auth');

Route::resource('rubriques', 'RubriqueController');
Route::get('/rubriques/delete/{id}', 'RubriqueController@destroy')->name('rubriques.delete')->middleware('auth');

Route::resource('faq', 'FaqController');
Route::get('/faq/delete/{id}', 'FaqController@destroy')->name('faq.delete')->middleware('auth');

Route::resource('sections', 'FaqSectionController');
Route::get('/sections/faq/{id}', 'FaqSectionController@byFaq')->name('sections.byFaq')->middleware('auth');
Route::get('/sections/delete/{id}', 'FaqSectionController@destroy')->name('sections.delete')->middleware('auth');

Route::resource('questions', 'FaqQuestionController');
Route::get('/questions/section/{id}', 'FaqQuestionController@byFaqSection')->name('questions.byFaqSection')->middleware('auth');
Route::get('/questions/create/{id}', 'FaqQuestionController@create')->name('questions.new')->middleware('auth');
Route::get('/questions/delete/{id}', 'FaqQuestionController@destroy')->name('questions.delete')->middleware('auth');

Route::resource('users', 'UserController');
Route::get('/users/delete/{id}', 'UserController@destroy')->name('users.delete')->middleware('auth');