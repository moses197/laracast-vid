<?php

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    
    return view('home');
});


// Index
Route::get('/jobs', [JobController::class, 'index']);

// Create
Route::get('/jobs/create', [JobController::class, 'create']);

// Show
Route::get('/jobs/{job}', [JobController::class, 'show']);


// Store
Route::post('/jobs', [JobController::class, 'store']);


// edit
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

// Update
Route::patch('/jobs/{job}', [JobController::class, 'update']);

// Destroy
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::get('/contact', function () {
    return view('contact');
});
