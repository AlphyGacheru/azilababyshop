<?php

use App\Models\Tshirt;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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
    return view('index');
})->name('index');

Route::get('/t-shirts', function () {
    $tshirts = App\Models\Tshirt::latest()->get();
    return view('t-shirts', compact('tshirts'));
})->name('t-shirts');

// T-shirts
Route::resource('t-shirtsAdmin', 'App\Http\Controllers\TshirtController')->except([
    'show', 'edit', 'update'
]);;

// Onesies
Route::resource('onesies', 'App\Http\Controllers\OnesiesController')->except([
    'show', 'edit', 'update'
]);

// Trousers
Route::resource('trousers', 'App\Http\Controllers\TrouserController')->except([
    'show', 'edit', 'update'
]);

// Shorts
Route::resource('shorts', 'App\Http\Controllers\ShortController')->except([
    'show', 'edit', 'update'
]);

// Shorts
Route::resource('skirts', 'App\Http\Controllers\SkirtController')->except([
    'show', 'edit', 'update'
]);

// Dresses
Route::resource('dresses', 'App\Http\Controllers\DressController')->except([
    'show', 'edit', 'update'
]);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
