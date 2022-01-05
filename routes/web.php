<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\Admin\HomeController;

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

// Route::get('/', [QueueController::class, 'index'])
// ->name('index');
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Auth::routes();

// Route::get('/','HomeController@index')->name('welcome');
// Route::post('/queue','QueueController@store')->name('queue.store');
// Route::get('/queue','QueueController@show')->name('queue.show');
// Route::resource('admin/queue' ,[QueueController::class ,'index'])->name('index');
//
Route::get('/index_booking',[HomeController::class , 'index'])->name('index.booking');
Route::get('/create_booking',[HomeController::class , 'create'])->name('create.booking');
Route::post('/store_booking',[HomeController::class , 'storeBooking'])->name('store.booking');
Route::post('/delete_booking/{id}',[HomeController::class , 'deleteBooking'])->name('delete.booking');
Route::post('/used_booking/{id}',[HomeController::class , 'usedBooking'])->name('used.booking');
Route::post('/update_status/{id}',[HomeController::class , 'updateStatus'])->name('update.status');
 Route::post('/queue',[QueueController::class] , 'store')->name('queue.store');
  Route::get('/queue',[QueueController::class ,'show'])->name('queue.show');
  Route::get('/index', 'QueueController@search')->name('queue.search');



//++++
// Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function(){
//     Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
//         Route::get('queue','QueueController@index')->name('queue.index');
//     Route::post('queue/{id}','QueueController@status')->name('queue.status');
//     Route::delete('queue/{id}','QueueController@destory')->name('queue.destory');
// });
//
Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function(){
        Route::get('dashboard',[DashboardController::class , 'index'])->name('admin.dashboard');
            Route::get('queue',[QueueController::class ,'index'])->name('queue.index');
        Route::post('queue/{id}',[QueueController::class ,'status'])->name('queue.status');
        Route::delete('queue/{id}',[QueueController::class ,'destory'])->name('queue.destory');
});
