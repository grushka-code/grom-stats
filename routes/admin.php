<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Directories
Route::resource('directories', \App\Http\Controllers\DirectoriesController::class)
    ->except([
        'show',
    ]);

//Pages
Route::resource('pages', \App\Http\Controllers\PagesController::class)->except([
    'show',
]);

//Users
Route::resource('users', \App\Http\Controllers\UserController::class)->except([
    'show',
]);