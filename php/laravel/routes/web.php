<?php

//use App\Http\Controllers\TestsController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/welcome', [TestsController::class, 'index'])->name('tests.index');
//Route::get('/login', [TestsController::class, 'index'])->name('tests.login');

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
Route::post('/todos', [TodoController::class, 'store']);
Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);
