<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;


// Route::get('/', function () {
    
    //     return view('home');
    // });
    
    Route::view('/', 'home');
    Route::view('/contact', 'contact');

    Route::resource('jobs', JobController::class); // only => [] and except => [] can be use here e.g Route::resource('jobs', JobController::class, [ only => ['edit', 'update', 'etc'] ]); // same as except

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });


// Route::get('/contact', function () {
//     return view('contact');
// });


// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);