<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LoanTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LoanApplicationsController;
use App\Http\Controllers\DashboardController;
use App\Models\Bank;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $banks = \App\Models\Bank::all();
    return view('welcome', compact('banks'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/documentation', function () {
    return view('documentation');
})->middleware(['auth'])->name('documentation');

Route::prefix('/')
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::get('all-loan-applications', [
            LoanApplicationsController::class,
            'index',
        ])->name('all-loan-applications.index');
        Route::post('all-loan-applications', [
            LoanApplicationsController::class,
            'store',
        ])->name('all-loan-applications.store');
        Route::get('all-loan-applications/create', [
            LoanApplicationsController::class,
            'create',
        ])->name('all-loan-applications.create');
        Route::get('all-loan-applications/{loanApplications}', [
            LoanApplicationsController::class,
            'show',
        ])->name('all-loan-applications.show');
        Route::get('all-loan-applications/{loanApplications}/edit', [
            LoanApplicationsController::class,
            'edit',
        ])->name('all-loan-applications.edit');
        Route::put('all-loan-applications/{loanApplications}', [
            LoanApplicationsController::class,
            'update',
        ])->name('all-loan-applications.update');
        Route::delete('all-loan-applications/{loanApplications}', [
            LoanApplicationsController::class,
            'destroy',
        ])->name('all-loan-applications.destroy');

        Route::resource('banks', BankController::class);
        Route::resource('loan-types', LoanTypeController::class);
        Route::resource('users', UserController::class);
    });