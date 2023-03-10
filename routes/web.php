<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use app\Providers\AuthServiceProvider;

Route::get('/', [TodolistController::class, 'index'])->name('index');
Route::post('/', [TodolistController::class, 'store'])->name('store');
Route::put('/', [TodolistController::class, 'update'])->name('update');
Route::delete('/{todolist:id}', [TodolistController::class, 'destroy'])->name('destroy');

