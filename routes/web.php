<?php

use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\RegistrationController;
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

Route::get('/', function () {
    return view('homepage');
})->name('homepage');


Route::controller(LoginRegisterController::class)->group(function() {  
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
    
    Route::get('/institution-register')->name('institution_register');
    Route::post('/institution-register')->name('institution_register_process');

    Route::get('/contributor-register', 'createContributor')->name('contributor_register');
    Route::post('/contributor-register', 'storeContributor')->name('contributor_register_process');
});
