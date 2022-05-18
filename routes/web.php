<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\NotesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('painel')->name('painel.')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('notes/', [NotesController::class, 'index'])->name('notas.index');
    Route::get('notes/form', [NotesController::class, 'create'])->name('notas.create');
    Route::post('notes', [NotesController::class, 'store'])->name('notas.store');
    Route::get('notes/form/{id}', [NotesController::class, 'edit'])->name('notas.edit');
    Route::put('notes/form/{id}', [NotesController::class, 'update'])->name('notas.update');
    Route::get('notes/delete/{id}', [NotesController::class, 'destroy'])->name('notas.destroy');
});
