<?php

//use App\Http\Controllers\TestsController;
//use App\Http\Controllers\TodoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

//Route::get('/welcome', [TestsController::class, 'index'])->name('tests.index');
//Route::get('/login', [TestsController::class, 'index'])->name('tests.login');



//Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
//Route::post('/todos', [TodoController::class, 'store']);
//Route::delete('/todos/{todo}', [TodoController::class, 'destroy']);



// This is the home page of the application
Route::get('/', [IndexController::class, 'home'])->name('home');

// Show the login form
Route::get('/login', [SessionsController::class, 'create'])->name('login');
// Login the user
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
// Logout the user
Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');

// Show the registration form
Route::get('/register', [UsersController::class, 'create'])->name('register');
// Register the user
Route::post('/register', [UsersController::class, 'store'])->name('register.store');
// Show the user profile
Route::get('/users/{id?}', [UsersController::class, 'show'])->name('users.show');
