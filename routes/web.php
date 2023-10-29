<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;






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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/exercise/index', [ExerciseController::class, 'index'])->name('exercise.index');
Route::get('/exercise/create', [ExerciseController::class, 'create'])->name('exercise.create');
Route::post('/exercise', [ExerciseController::class, 'store'])->name('exercise.store');
Route::get('/exercise/{exercise}/edit', [ExerciseController::class, 'edit'])->name('exercise.edit');
Route::put('/exercise/{exercise}/update', [ExerciseController::class, 'update'])->name('exercise.update');
Route::delete('/exercise/{exercise}/destroy', [ExerciseController::class, 'destroy'])->name('exercise.destroy');
Route::middleware(['auth'])->group(function () {
    Route::get('/exercise', [ExerciseController::class, 'index']) ->name('exercise.index');
});

