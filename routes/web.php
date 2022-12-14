<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//require route dashborad
require_once('dashborad.php');
//require route front
require_once('front.php');

// Auth::routes(['register' => false]);
Route::match(['get', 'post'], 'register', function () {
    abort(404);
});
Route::match(['get', 'post'], 'password/reset', function () {
    abort(404);
});




