<?php

use App\Http\Controllers\EDIController;
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

Route::get('/', [EDIController::class, 'index'])->name('edi.index');
Route::post('/', [EDIController::class, 'upload'])->name('edi.upload');
Route::get('{payment}', [EDIController::class, 'show'])->name('edi.show');
Route::get('print/{receiver}', [EDIController::class, 'print'])->name('edi.print');
Route::delete('{payment}', [EDIController::class, 'destroy'])->name('edi.destroy');