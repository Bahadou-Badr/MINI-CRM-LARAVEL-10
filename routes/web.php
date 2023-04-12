<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Route::resources([
    'companies' => App\Http\Controllers\CompanyController::class,
    'employees' => App\Http\Controllers\EmployeController::class,
    'history' => App\Http\Controllers\History\ActionController::class,
    'invitations' => App\Http\Controllers\InvitationController::class,
]);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/register/employee', [App\Http\Controllers\EmployeController::class, 'registerEmployee'])->name('register.employee');
Route::get('/comapny/employees/{company}', [App\Http\Controllers\EmployeController::class, 'getEmployeeList'])->name('company.employees');
Route::get('/verify/invitation', [App\Http\Controllers\InvitationController::class, 'verifyInvitation'])->name('verify.invitation');
Route::put('/cancel/invitation/{invitation}', [App\Http\Controllers\InvitationController::class, 'cancelInvitation'])->name('cancel.invitation');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
