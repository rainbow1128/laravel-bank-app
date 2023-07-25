<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;


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
    return view('index');
});

Route::get('/signup', function() {
    return view('signup');
})-> name('signup');

Route::get('/login', function() {
    return view('login');
})-> name('login');

Route::get('/services', function() {
    return view('services');
})-> name('services');

Route::get('/contact', function() {
    return view ('contact');
})-> name('contact');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/process', [UserController::class, 'store']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard/profile', [DashboardController::class, 'profile']) -> name('dashboard.profile');


Route::patch('/profile/update', [DashboardController::class, 'update_profile']) -> name('profile.update');

//loans are processed here:

Route::get('/dashboard/loans', [LoanController::class, 'showApplications']) -> name('dashboard.loans');

Route::post('/dashboard/loans', [LoanController::class, 'loanApplication']) -> name('dashboard.loans');

//edit and delete loans

    //get request leading to pages where users can edit their loan information
Route::get('/loans/edit/{loanId}', [LoanController::class, 'editLoanApplication'])-> name('loans.edit');
Route::patch('/loans/edit/{loanId}', [LoanController::class, 'saveEditLoanApplication'])-> name('loans.edit');

Route::delete('/loans/delete/{loanId}', [LoanController::class, 'deleteLoanApplication'])-> name('loans.delete');