<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\IndexController::class,'index'])->name('index.index');

Route::get('/place',[\App\Http\Controllers\PlaceController::class,'index'])->name('place.index');
Route::get('/place/{categorySlug}/{placeSlug}',[\App\Http\Controllers\PlaceController::class,'show'])->name('place.show');

Route::get('/portfolio',[\App\Http\Controllers\PortfolioController::class,'index'])->name('portfolio.index');
Route::get('/portfolio/{categorySlug}',[\App\Http\Controllers\PortfolioController::class,'show'])->name('portfolio.show');

Route::get('/article',[\App\Http\Controllers\ArticleController::class,'index'])->name('article.index');
Route::get('/article/{articleSlug}',[\App\Http\Controllers\ArticleController::class,'show'])->name('article.show');
