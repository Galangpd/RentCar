<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('detail/{car:slug}', [HomeController::class, 'detail'])->name('detail');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact', [HomeController::class, 'contactStore'])->name('contact.store');


Route::group(['middleware' => 'is_admin', 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('cars', CarController::class);
    Route::put('cars/update-image/{id}', [CarController::class, 'updateImage'])->name('cars.updateImage');

    Route::get('messages', [MessageController::class, 'index'])->name('message.index');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
});


Auth::routes(['register' => false]);

