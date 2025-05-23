<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/staff', function () {
    return view('admin_page.welcome');
})->name('staff');

Route::get('/staff/register', function() {
    return view('admin_page.auth.register-page');
})->name('staff-register');

Route::get('/staff/login', function() {
    return view('admin_page.auth.login-page');
})->name('staff-login');

Route::get('/staff/verify-email', function() {
    return view('admin_page.auth.verify-email');
})->name('staff-verify-email');

Route::get('/staff/verify-success', function() {
    return view('admin_page.auth.verify-success');
})->name('staff-verify-success');

Route::post('/register/new-staff', [RegisterController::class, 'register']);

Route::post('/register/update-staff', [RegisterController::class, 'checkUserExist']);

Route::get('/staff/find-email', function () {
    return view('admin_page.auth.find-email');
})->name('staff-find-email');

Route::get('/staff/forgot-password', function() {
    return view('admin_page.auth.forgot-password');
});

Route::post('/get-staff', [UserController::class, 'getInfo']);

Route::post('/get-member', [UserController::class, 'getInfo']);

Route::get('/staff/verify-password', function() {
    return view('admin_page.auth.verify-password');
});

Route::get('/staff/dashboard/simpan', function() {
    return view('admin_page.dashboard.simpan');
})->name('simpan');

Route::get('/staff/dashboard/history', function() {
    return view('admin_page.dashboard.histories');
})->name('history');

Route::get('/staff/dashboard/profile', function() {
    return view('admin_page.dashboard.profile');
})->name('staff-profile');

Route::post('/resolve-email-staff', [UserController::class, 'getEmail']);

Route::post('/resolve-email-member', [UserController::class, 'getEmail']);

Route::get('/member/login', function(){
    return view ('user_page.auth.login-page');
})->name('member-login');

Route::get('/member', function(){
    return view('user_page.welcome');
})->name('member');

Route::get('/member/find-email', function(){
    return view('user_page.auth.find-email');
})->name('member-find-email');

Route::get('/member/forgot-password', function(){
    return view('user_page.auth.forgot-password');
});

Route::get('/member/verify-password', function(){
    return view('user_page.auth.verify-password');
});

Route::get('member/dashboard/account', function(){
    return view('user_page.dashboard.account');
})->name('account');

Route::get('member/dashoboard/profile', function(){
    return view('user_page.dashboard.profile');
})->name('member-profile');