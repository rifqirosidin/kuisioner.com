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
Route::get('/list/survey','SurveyController@index')->name('list.survey');
Route::get('/about','LandingPageController@aboutUs')->name('aboutUs');
Route::get('/contact','LandingPageController@contact')->name('contact');

Auth::routes();
Route::middleware('auth')->group(function (){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('users', 'UserController');
    Route::get('tasks/{taskId}/show-form', 'TaskController@showForm')->name('show.form');
    Route::resource('tasks', 'TaskController');
    Route::resource('payment-methods', 'PaymentMethodController');
    Route::post('surveys/create/form', 'SurveyController@storeForm')->name('create.form');
    Route::post('surveys/submit/form/{formId}', 'SurveyController@submitForm')->name('survey.form');
    Route::get('surveys/create/{taskId}', 'SurveyController@create')->name('surveys.create');
    Route::post('surveys/create/{taskId}', 'SurveyController@store')->name('surveys.store');
    Route::get('surveys/closing-sentence/{formId}', 'SurveyController@closingSentence')->name('closing.sentence');
    Route::resource('transactions', 'TransactionController');
    Route::resource('balances', 'BalanceController');
    Route::resource('top-up', 'TopUpBalanceController');



    //admin
    Route::middleware('admin')->group(function (){
        Route::resource('banners', 'BannerController');
        Route::resource('testimonies', 'TestimonyController');
        Route::resource('about-us', 'AboutUsController');
        Route::resource('sliders', 'SliderController');
        Route::patch('verify/payments', 'PaymentController@verifyPayment')->name('verify.payment');
        Route::resource('payments', 'PaymentController');
        Route::get('/form/respondents', 'TaskController@displayRespondent')->name('display.respondent.update');
        Route::get('ajax/price-balances', 'PriceBalanceController@ajaxPriceBalance')->name('ajax.price.balance');
        Route::resource('price-balances', 'PriceBalanceController');
        Route::patch('verify/receive-balances', 'TopUpBalanceController@ajaxVerified')->name('receive.balance');
        Route::patch('verify/reject-balances', 'TopUpBalanceController@ajaxUnVerified')->name('reject.balance');
    });


});

