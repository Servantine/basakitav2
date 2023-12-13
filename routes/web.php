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

Route::get('/', 'App\Http\Controllers\AuthController@index');

Route::middleware(['guest'])->group(function(){
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
    Route::get('/login', 'App\Http\Controllers\AuthController@loginin')->name('login');
});


Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'App\Http\Controllers\AuthController@logout');
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::get('/dashboard', 'App\Http\Controllers\PageController@index');
    Route::get('/warlok', 'App\Http\Controllers\PageController@warlok')->middleware('useraccess:wargalokal');
    Route::post('/langgananmalioboro', 'App\Http\Controllers\UserController@langgananmalioboro')->middleware('useraccess:wargalokal');
    Route::post('/langganansagan', 'App\Http\Controllers\UserController@langganansagan')->middleware('useraccess:wargalokal');
    Route::get('/kirimsampah', 'App\Http\Controllers\PageController@kirimsampah')->middleware('useraccess:wargalokal');
    Route::get('/riwayatkirim', 'App\Http\Controllers\PageController@riwayatkirim')->middleware('useraccess:wargalokal');
    Route::post('/simpantransaksi', 'App\Http\Controllers\PageController@simpantransaksi')->middleware('useraccess:wargalokal');
    Route::get('/warlokkmebali', 'App\Http\Controllers\UserController@warlokkmebali')->middleware('useraccess:wargalokal');
    Route::get('/pengantar', 'App\Http\Controllers\PageController@pengantar')->middleware('useraccess:pengantar');
    Route::get('/pemilik', 'App\Http\Controllers\PageController@pemilik')->middleware('useraccess:pemilikbank');
    Route::get('/kelolabanksampah', 'App\Http\Controllers\PageController@kelolabanksampah')->middleware('useraccess:pemilikbank');
    Route::get('/buatbanksampah', 'App\Http\Controllers\PageController@buatbanksampah')->middleware('useraccess:pemilikbank');
    Route::post('/simpanbanksampah', 'App\Http\Controllers\PageController@simpanbanksampah')->middleware('useraccess:pemilikbank');
    Route::get('/editbanksampah/{id}', 'App\Http\Controllers\PageController@editbanksampah')->middleware('useraccess:pemilikbank');
    Route::any('/saveeditbanksampah/{id}', 'App\Http\Controllers\PageController@saveeditbanksampah')->middleware('useraccess:pemilikbank');
    Route::get('/pemilikkembali', 'App\Http\Controllers\PageController@kelolabanksampah')->middleware('useraccess:pemilikbank');
    Route::get('/permintaansampah', 'App\Http\Controllers\PageController@permintaansampah')->middleware('useraccess:pemilikbank');
    Route::get('/terimatransaksi/{id}', 'App\Http\Controllers\PageController@terimatransaksi')->middleware('useraccess:pemilikbank');
    Route::get('/tolaktransaksi/{id}', 'App\Http\Controllers\PageController@tolaktransaksi')->middleware('useraccess:pemilikbank');
    Route::get('/selesaitransaksi/{id}', 'App\Http\Controllers\PageController@selesaitransaksi')->middleware('useraccess:pemilikbank');
});




Route::post('/simpanuser', 'App\Http\Controllers\UserController@simpanusers');



Route::get('/register', function () {
    return view('register');
});

//warlok

Route::get('/warlokregister', function () {
    return view('/warlok/register');
});


//pengantar
Route::get('/pengantarregister', function () {
    return view('/pengantar/register');
});

//pemilik
Route::get('/pemilikregister', function () {
    return view('/pemilik/register');
});