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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/getstarted', function () {
    return "hello this is routed for get started.";
});


Route::get('/getmethod', function () {
    return "this is get method";
});

Route::post('/postmethod', function () {
    return "this is post method";
});
