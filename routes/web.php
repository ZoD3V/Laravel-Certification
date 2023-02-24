<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\DepartementController;
use App\Http\Controllers\backend\StaffController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\UserDepartementController;
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

Auth::routes();

Route::get('/admin/home', [AdminController::class, 'index'])->name('home');

//user
Route::get('/admin/manage/user', [UserController::class, 'index'])->name('b.manage.user');
Route::get('/admin/manage/user/create', [UserController::class, 'create'])->name('b.manage.create.user');
Route::post('/admin/manage/user/create/process', [UserController::class, 'create_process'])->name('b.manage.create.process.user');
Route::get('/admin/manage/user/edit/{id}', [UserController::class, 'edit'])->name('b.manage.edit.user');
Route::post('/admin/manage/user/edit/process/{id}', [UserController::class, 'edit_process'])->name('b.manage.edit.process.user');
Route::delete('/admin/manage/user/delete/{id}', [UserController::class, 'destroy'])->name('b.manage.delete.user');

Route::get('/admin/manage/departement', [DepartementController::class, 'index'])->name('b.manage.departement');
Route::get('/admin/manage/departement/create', [DepartementController::class, 'create'])->name('b.manage.create.departement');
Route::post('/admin/manage/departement/create/process', [DepartementController::class, 'create_process'])->name('b.manage.create.process.departement');
Route::get('/admin/manage/departement/edit/{id}', [DepartementController::class, 'edit'])->name('b.manage.edit.departement');
Route::post('/admin/manage/departement/edit/process/{id}', [DepartementController::class, 'edit_process'])->name('b.manage.edit.process.departement');
Route::delete('/admin/manage/departement/delete/{id}', [DepartementController::class, 'destroy'])->name('b.manage.delete.departement');

Route::get('/admin/manage/user-departement', [UserDepartementController::class, 'index'])->name('b.manage.user_departement');
Route::get('/admin/manage/user-departement/create', [UserDepartementController::class, 'create'])->name('b.manage.create.user_departement');
Route::post('/admin/manage/user-departement/create/process', [UserDepartementController::class, 'create_process'])->name('b.manage.create.process.user_departement');
Route::get('/admin/manage/user-departement/edit/{id}', [UserDepartementController::class, 'edit'])->name('b.manage.edit.user_departement');
Route::post('/admin/manage/user-departement/edit/process/{id}', [UserDepartementController::class, 'edit_process'])->name('b.manage.edit.process.user_departement');
Route::delete('/admin/manage/user-departement/delete/{id}', [UserDepartementController::class, 'destroy'])->name('b.manage.delete.user_departement');

Route::get('/staff/home', [StaffController::class, 'index'])->name('home.staff');

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});
