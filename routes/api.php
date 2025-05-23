<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\LoanTypeController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\LoanApplicationsController;
use App\Http\Controllers\Api\BankAllLoanApplicationsController;
use App\Http\Controllers\Api\UserAllLoanApplicationsController;
use App\Http\Controllers\Api\LoanTypeAllLoanApplicationsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource(
            'all-loan-applications',
            LoanApplicationsController::class
        );

        Route::apiResource('banks', BankController::class);

        // Bank All Loan Applications
        Route::get('/banks/{bank}/all-loan-applications', [
            BankAllLoanApplicationsController::class,
            'index',
        ])->name('banks.all-loan-applications.index');
        Route::post('/banks/{bank}/all-loan-applications', [
            BankAllLoanApplicationsController::class,
            'store',
        ])->name('banks.all-loan-applications.store');

        Route::apiResource('loan-types', LoanTypeController::class);

        // LoanType All Loan Applications
        Route::get('/loan-types/{loanType}/all-loan-applications', [
            LoanTypeAllLoanApplicationsController::class,
            'index',
        ])->name('loan-types.all-loan-applications.index');
        Route::post('/loan-types/{loanType}/all-loan-applications', [
            LoanTypeAllLoanApplicationsController::class,
            'store',
        ])->name('loan-types.all-loan-applications.store');

        Route::apiResource('users', UserController::class);

        // User All Loan Applications
        Route::get('/users/{user}/all-loan-applications', [
            UserAllLoanApplicationsController::class,
            'index',
        ])->name('users.all-loan-applications.index');
        Route::post('/users/{user}/all-loan-applications', [
            UserAllLoanApplicationsController::class,
            'store',
        ])->name('users.all-loan-applications.store');
    });
