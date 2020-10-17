<?php

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

Route::view('/', 'index')
    ->name('home');

Route::view('/admin', 'admin')
    ->middleware(['web', 'auth', 'role:admin|writer'])
    ->name('admin');

Route::get('/pages', 'App\Http\Controllers\PagesController@index')
    ->name('pages');

Route::get('/pages/{page_slug}', 'App\Http\Controllers\PagesController@page')
    ->name('pages.page');

Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);
