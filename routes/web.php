<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Route::get('/', function () {
//     return view('task');
// });
Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('task', [TaskController::class, 'index'])->name('task');
Route::resource('task', TaskController::class);
