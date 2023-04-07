<?php

use App\Http\Controllers\TodoController;
use App\Http\Livewire\Todo\TodoTable;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('', TodoTable::class)->name('todo.index');
    Route::get('todo', TodoTable::class)->name('todo.index');
    Route::resource('todo', TodoController::class, [
        'except' =>
            ['index', 'show']
    ]);
});
