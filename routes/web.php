<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');

Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register');

Route::get('/email', function () {
    return new App\Mail\Contact([
      'nom' => 'simplon',
      'email' => 'tapsobanafissatou8@gmail.com',
      'message' => 'felicition votre compte à été creer avec succès !'
      ]);
});
/*
Route::get('/', function () {
    return new ressources\views\clients([
  
      ]);
});
*/