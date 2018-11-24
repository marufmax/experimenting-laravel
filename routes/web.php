<?php

use App\Events\TaskCreated;
use App\Models\Task;

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

// Laravel Echo Experiments

/**
 * summary
 */
class Order
{
    public $id;
    
    public function __construct($id)
    {
        $this->id = $id;
    }
}

Route::get('/update', function () {
    OrderStatusUpdated::dispatch(new Order(5));
});


Route::get('order-status-update', function () {
    // OrderStatusUpdated::dispatch();
});


Route::get('/tasks', function () {
    return Task::latest()->pluck('body');
});

Route::post('/tasks', function () {
    $task = Task::forceCreate(request(['body']));

    event(new TaskCreated($task));
});
