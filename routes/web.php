<?php

use Illuminate\Support\Facades\Route;
use Illuminate\support\Facades\Auth;
use App\Http\Controllers\Admin\ProjectController;

// rotta di welcome
Route::get('/', function () {
    return view('welcome');
});

// rotta di autenticazione
Auth::routes();

// rotta della dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// gruppo di rotte per autenticazione

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource( 'projects', ProjectController::class );
});


//rotta del logout

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
