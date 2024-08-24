<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
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



Route::get('/register', [UserController::class, 'showRegistrationForm'])->middleware(['guest'])->name('register');

Route::post('/register', [UserController::class, 'register'])->middleware(['guest'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm'])->middleware(['guest'])->name('login');

Route::post('/login', [UserController::class, 'login'])->middleware(['guest'])->name('login');

Route::post('/logout', [UserController::class, 'logout'])->middleware(['auth'])->name('logout');


Route::resource('categories', CategoryController::class);


// お問い合わせ関連のルート
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('/contact/thanks', function () {
    return view('contact.thanks');
})->name('contact.thanks');

// 管理画面関連のルート
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');








