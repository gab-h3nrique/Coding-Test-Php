<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaInicial\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|
|php artisan route:clear && php artisan route:cache
|
|
*/

 Route::get('/', [HomeController::class, 'index']);
 Route::post('/affiliates', [HomeController::class, 'affiliates'])->name('affiliates');