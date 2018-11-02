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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/downloadDomPdf', 'PdfExportController@generatePdf');

Route::get('email-test', function () {
    $details['email'] = 'desk.maruf@gmail.com';

    dispatch(new App\Jobs\SendEmailJob($details));

    dd('done');
});


Route::get('submit-contact', 'ContactController@index');
Route::post('submit-contact', 'ContactController@store');
