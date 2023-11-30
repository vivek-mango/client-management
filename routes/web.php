<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/create-client', function () {
        return view('clients/create');
    });

    Route::get('/list-client', [ClientController::class,'index'])->name('lists');

    Route::post('/create-client', [ClientController::class,'store'])->name('clients.create');

    Route::get('/edit-client/{id}', [ClientController::class,'edit'])->name('clients.edit');

    Route::put('/update-client/{id}', [ClientController::class,'update'])->name('clients.update');

    Route::delete('/delete-client/{id}', [ClientController::class,'destroy'])->name('clients.destroy');
});




