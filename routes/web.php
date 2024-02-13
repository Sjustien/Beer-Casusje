<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BierController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [BierController::class, 'index'])->name('bier.index');
Route::get('/bier/{bier}', [BierController::class, 'show'])->name('bier.show');
Route::put('/bier/{bier}', [BierController::class, 'update'])->name('bier.update');

Route::post('/comments/{bier}', [CommentController::class, 'store'])->name('comments.store');
