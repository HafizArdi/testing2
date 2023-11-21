<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

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
    return view('welcome');
});

Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
Route::get('/form', [FormController::class, 'index']);
Route::get('/admin/approval', [FormController::class, 'index_approval']);
Route::get('/admin/approval/approve/{id}', [FormController::class, 'approve'])->name('approval.approve');
Route::get('/admin/approval/reject/{id}', [FormController::class, 'reject'])->name('approval.reject');
Route::get('/admin/history', [FormController::class, 'index_history']);
