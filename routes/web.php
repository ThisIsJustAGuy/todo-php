<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('todos', TodosController::class);
Route::get('todos/{todo}/complete', [TodosController::class, 'complete'])->name('todos.complete');

Route::get('logout', function() {
    Auth::logout();
    return redirect('home');
});
Auth::routes();

