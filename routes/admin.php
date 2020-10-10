<?php

use App\Http\Controllers\Admin\DirectoriesController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\UserController;
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
Route::resource('directories', DirectoriesController::class)
    ->except([
        'show',
    ]);

//Pages
Route::resource('pages', PagesController::class)->except([
    'show',
]);

//Users
Route::resource('users', UserController::class)->except([
    'show',
]);
