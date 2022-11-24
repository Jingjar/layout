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

Route::get('/', function () {
    return view('welcome');
});

Route::namespace ('App\Http\Controllers')->group(function () {
    Route::get('page2', 'pages@pages');
});
Route::get('header', function () {
    return view('layout.header');
});
Route::get('footer', function () {
    return view('layout.footer');
});

Route::get('sidebar', function () {
    return view('layout.sidebar');
});
Route::get('master', function () {
    return view('layout.master');
});
Route::get('page1', function () {
    return view('page1');
});
// Route::get('page2', function () {
//     return view('page2');
// });
Route::get('photo', function () {
    return view('photo');
});