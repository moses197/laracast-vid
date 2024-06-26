<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Mail;

// Route::get('test', function() {
//     // return new \App\Mail\JobPosted();
//     Mail::to('leomoszeko@gmail.com')->send(
//         new JobPosted()
//     );

//     return 'Done';
// });

// Route::get('/', function () {
    
    //     return view('home');
    // });

Route::get('/test', function() {
    // dispatch(function() {
    //     logger('hello from the queue');
    // })->delay(7);
    $job = Job::first();
    TranslateJob::dispatch($job);
    return 'Done';
});
    
    Route::view('/', 'home');
    Route::view('/contact', 'contact');

    // Route::resource('jobs', JobController::class); // only => [] and except => [] can be use here e.g Route::resource('jobs', JobController::class, [ only => ['edit', 'update', 'etc'] ]); // same as except

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

Route::get('/jobs', [JobController::class,'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class,'store'])->middleware('auth');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');
    // ->can('edit-job', 'job'); //Gate implementation of can

Route::patch('/jobs/{job}', [JobController::class,'update']);
Route::delete('/jobs/{job}', [JobController::class,'destroy']);

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);