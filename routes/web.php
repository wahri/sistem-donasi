<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Models\Donation;
use App\Models\RequestDonation;
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

Route::get('/', [FrontPageController::class, 'index'])->name('homepage');

Route::get('/donasi/{id}', [FrontPageController::class, 'detailDonasi'])->name('detailDonasi');
Route::get('/donasi', [FrontPageController::class, 'donasiPage'])->name('donasiPage');

Route::get('/relawan', [FrontPageController::class, 'volunteerPage'])->name('volunteerPage');
Route::get('/kontak', [FrontPageController::class, 'contactPage'])->name('contactPage');

Route::get('/readNotification/{notification}', [FrontPageController::class, 'readNotification'])->name('readNotification');
Route::post('/requestConfirmation/{request}', [DonationController::class, 'requestConfirmation'])->name('requestConfirmation');
Route::post('/requestDecline/{request}', [DonationController::class, 'requestDecline'])->name('requestDecline');
Route::post('/requestDonation', [DonationController::class, 'requestDonation'])->name('requestDonation');


Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
  Route::get('/', [AdminController::class, 'dashboard'])->name('index');

  Route::get('/transaction', [AdminController::class, 'transactionPage'])->name('transaction');

  Route::get('/setting', [AdminController::class, 'settingPage'])->name('setting');

  Route::get('/donation', [AdminController::class, 'donationPage'])->name('donation');
  Route::delete('/donation/{id}', [AdminController::class, 'deleteDonation'])->name('deleteDonation');
  Route::get('/donation/trash', [AdminController::class, 'donationTrashPage'])->name('donationTrash');
  Route::get('/donation/restore/{id}', [AdminController::class, 'donationRestore'])->name('donationRestore');
  Route::get('/donation/delete/{id}', [AdminController::class, 'donationDeletePermanent'])->name('donationDeletePermanent');

  Route::resource('/user', UserController::class);
  Route::put('/user/confirmation/{id}', [UserController::class, 'accountConfirmation'])->name('accountConfirmation');
});

Route::get('/pengaturan-akun', [FrontPageController::class, 'settingAccount'])->name('settingAccount');

Route::post('/updateProfile', [FrontPageController::class, 'updateProfile'])->name('updateProfile');
Route::post('/changePassword', [FrontPageController::class, 'changePassword'])->name('changePassword');


Route::controller(LoginRegisterController::class)->group(function () {
  Route::get('/login', 'login')->name('filament.auth.login');
  Route::post('/authenticate', 'authenticate')->name('authenticate');
  Route::post('/auth/logout', 'logout')->name('filament.auth.logout');

  Route::get('/register', 'registerPage')->name('register');

  Route::get('/institution-register', 'createInstitution')->name('institution_register');
  Route::post('/institution-register', 'storeInstitution')->name('institution_register_process');

  Route::get('/contributor-register', 'createContributor')->name('contributor_register');
  Route::post('/contributor-register', 'storeContributor')->name('contributor_register_process');
});
