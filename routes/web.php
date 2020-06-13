<?php

use Illuminate\Support\Facades\Route;

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
Route::get('analytic', function(){
   return view('welcome');
});

Route::get('/','LandingPageController@index')->name('index');

Auth::routes();


Route::middleware('auth')->group(function (){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::resource('users', 'UserController');
    Route::get('tasks/{taskId}/show-form', 'TaskController@showForm')->name('show.form');
    Route::resource('tasks', 'TaskController');
    Route::resource('banners', 'BannerController');
    Route::resource('testimonies', 'TestimonyController');
    Route::resource('sliders', 'SliderController');
    Route::resource('payment-methods', 'PaymentMethodController');
    Route::post('surveys/create/form', 'SurveyController@storeForm')->name('create.form');
    Route::post('surveys/submit/form/{formId}', 'SurveyController@submitForm')->name('survey.form');
    Route::get('surveys/create/{taskId}', 'SurveyController@create')->name('surveys.create');
    Route::post('surveys/create/{taskId}', 'SurveyController@store')->name('surveys.store');
    Route::get('surveys/closing-sentence/{formId}', 'SurveyController@closingSentence')->name('closing.sentence');

});

