<?php
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin/index');
});

Route::get('/createAdmin', [Admin\AuthController::class, 'createCustomer']);

Route::get('login', [Admin\AuthController::class, 'get_login']);
Route::post('post_login', [Admin\AuthController::class, 'post_login'])->name('auth.post_login');

Route::post('users/{id}', function ($id) {
});
