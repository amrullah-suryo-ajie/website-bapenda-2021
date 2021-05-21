<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CalonWPController;
use App\Http\Controllers\WPController;
use App\Http\Controllers\WPApiController;

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
    // return view('welcome');
    return view('login', ['menu' => 'about', 'nama' => 'Amrullah Suryo Ajie']);
});
Route::get('/signin', [PagesController::class, 'showFormLogin']);
Route::post('/signin', [PagesController::class, 'signin']);
Route::get('/register', [PagesController::class, 'showFormRegister']);
Route::post('/register', [PagesController::class, 'register']);
Route::get('/home', [PagesController::class, 'home']);
Route::get('/index', [PagesController::class, 'index']);
Route::resource('calon-wp', CalonWPController::class);
Route::resource('wajib-pajak', WPController::class);
Route::get('wajib-pajak/status/{status}', [WPController::class, 'status']);
Route::get('wp-api', [WPApiController::class, 'index']);
Route::get('laporan-harian', [WPApiController::class, 'index']);
// Route::get('calon-wp', [CalonWPController::class, 'index']);
// Route::post('/add-calon-wp', [CalonWPController::class, 'store']);
// Route::put('/calon-wp', CalonWPController::class);
// Route::delete('/destroy-calon-wp', [CalonWPController::class, 'destroy']);
// Route::get('/signin', 'PagesController@showFormLogin');
// Route::get('/wajib-pajak', [PagesController::class, 'waJibPajak']);
// Route::get('/register', 'PagesController@showFormRegister');
// Route::post('/register', 'PagesController@register');
