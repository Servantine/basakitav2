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
    Route::post('/langganan/{id}', 'App\Http\Controllers\UserController@langganan')->middleware('useraccess:wargalokal');
    Route::get('/kirimsampah', 'App\Http\Controllers\PageController@kirimsampah')->middleware('useraccess:wargalokal');
    Route::get('/riwayatkirim', 'App\Http\Controllers\PageController@riwayatkirim')->middleware('useraccess:wargalokal');
    Route::post('/simpantransaksi', 'App\Http\Controllers\PageController@simpantransaksi')->middleware('useraccess:wargalokal');
    Route::get('/lakukanpembayaran/{id}', 'App\Http\Controllers\PageController@lakukanpembayaran')->middleware('useraccess:wargalokal');
    Route::get('/warlokkmebali', 'App\Http\Controllers\UserController@warlokkmebali')->middleware('useraccess:wargalokal');
    Route::get('/luaranwarlok', 'App\Http\Controllers\PageController@luaranwarlok')->middleware('useraccess:wargalokal');
    Route::get('/downloadluaranwarlok', 'App\Http\Controllers\PageController@downloadluaranwarlok')->middleware('useraccess:wargalokal');
    Route::get('/download1bulanyanglalu', 'App\Http\Controllers\PageController@download1bulanyanglalu')->middleware('useraccess:wargalokal');
    Route::get('/download1tahunyanglalu', 'App\Http\Controllers\PageController@download1tahunyanglalu')->middleware('useraccess:wargalokal');

    
    Route::get('/pengantar', 'App\Http\Controllers\PageController@pengantar')->middleware('useraccess:pengantar');
    Route::get('/kelolakendaraan', 'App\Http\Controllers\PageController@kelolakendaraan')->middleware('useraccess:pengantar');
    Route::get('/buatkendaraan', 'App\Http\Controllers\PageController@buatkendaraan')->middleware('useraccess:pengantar');
    Route::post('/simpankendaraan', 'App\Http\Controllers\PageController@simpankendaraan')->middleware('useraccess:pengantar');
    Route::get('/pengantarkembali', 'App\Http\Controllers\PageController@kelolakendaraan')->middleware('useraccess:pengantar');
    Route::get('/banksampahsemua', 'App\Http\Controllers\PageController@banksampahsemua')->middleware('useraccess:pengantar');
    Route::get('/tolaktransaksi2/{id}', 'App\Http\Controllers\PageController@tolaktransaksi2');
    Route::get('/lihatpesanan/{id}', 'App\Http\Controllers\PageController@lihatpesanan')->middleware('useraccess:pengantar');
    Route::get('/bankmalioboro', 'App\Http\Controllers\PageController@bankmalioboro')->middleware('useraccess:pengantar');
    Route::get('/banksagan', 'App\Http\Controllers\PageController@banksagan')->middleware('useraccess:pengantar');
    Route::get('/luaranpengantar', 'App\Http\Controllers\PageController@luaranpengantar')->middleware('useraccess:pengantar');
    Route::get('/antartransaksi/{id}', 'App\Http\Controllers\PageController@antartransaksi')->middleware('useraccess:pengantar');


    Route::get('/pemilik', 'App\Http\Controllers\PageController@pemilik')->middleware('useraccess:pemilikbank');
    Route::get('/kelolabanksampah', 'App\Http\Controllers\PageController@kelolabanksampah')->middleware('useraccess:pemilikbank');
    Route::get('/buatbanksampah', 'App\Http\Controllers\PageController@buatbanksampah')->middleware('useraccess:pemilikbank');
    Route::post('/simpanbanksampah', 'App\Http\Controllers\PageController@simpanbanksampah')->middleware('useraccess:pemilikbank');
    Route::get('/editbanksampah/{id}', 'App\Http\Controllers\PageController@editbanksampah')->middleware('useraccess:pemilikbank');
    Route::any('/saveeditbanksampah/{id}', 'App\Http\Controllers\PageController@saveeditbanksampah')->middleware('useraccess:pemilikbank');
    Route::any('/saveeditbanksampah2/{id}', 'App\Http\Controllers\PageController@saveeditbanksampah2')->middleware('useraccess:pemilikbank');
    Route::get('/pemilikkembali', 'App\Http\Controllers\PageController@kelolabanksampah')->middleware('useraccess:pemilikbank');
    Route::get('/permintaansampah', 'App\Http\Controllers\PageController@permintaansampah')->middleware('useraccess:pemilikbank');
    Route::get('/luaranpemilik', 'App\Http\Controllers\PageController@luaranpemilik')->middleware('useraccess:pemilikbank');
    Route::get('/prosessampah/{id}', 'App\Http\Controllers\PageController@prosessampah')->middleware('useraccess:pemilikbank');
    Route::get('/terimatransaksi/{id}', 'App\Http\Controllers\PageController@terimatransaksi')->middleware('useraccess:pemilikbank');
    Route::get('/tolaktransaksi/{id}', 'App\Http\Controllers\PageController@tolaktransaksi');
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