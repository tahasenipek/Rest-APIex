<?php

use App\Controllers\Api\UserController;
use App\Http\Controllers\Api\TodolistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| routes are loaded by the RouteServiceProvider and all of them will
| Here is where you can register API routes for your application. These
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(TodolistController::class)->group(function()
{
    Route::get('/todolist', 'index')->name('index');
    Route::post('/login','uindex')->name('uindex');
    Route::post('/todolist', 'store')->name('store');
    Route::get('/todolist/{id}', 'show')->name('show');
    Route::put('/todolist/{id}', 'update')->name('update');
    Route::delete('/todolist/{id}', 'destory')->name('destory');
});