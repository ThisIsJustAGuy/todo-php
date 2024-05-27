<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('todos', TodosController::class);
Route::get('todos/{todo}/complete', [TodosController::class, 'complete'])->name('todos.complete');

Route::get('logout', function() {
    Auth::logout();
    return redirect('home');
});
Auth::routes();

//php artisan make:model BookCategory -crR

//composer require laravel/ui
//php artisan ui bootstrap --auth
//npm run build
//chown -R www-data:www-data /var/www/storage
