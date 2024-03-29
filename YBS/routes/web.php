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



Route::namespace('Admin')->prefix('admix')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

    Route::get('/login','adminController@login' )->name('AdminLogIn');
    Route::post('/checklogin','adminController@checklogin' );



    
    Route::middleware('auth:admins')->group(function(){
        Route::get('/logout','adminController@logout' )->name('AdminLogOut');

        Route::get('/','adminController@home' );
        Route::get('/dashboard','adminController@home' )->name('AdminDashBoard');

        Route::prefix('busstop')->group(function () {
            Route::get('/','busStopController@index')->name('listingBusstop');;
            Route::get('/setup','busStopController@busstopSetup' )->name('setupBusStop');
            Route::post('/setup','busStopController@busstopInsert' );
            Route::get('/edit/{id}','busStopController@busstopEdit' )->where('id', '[0-9]+');
            Route::post('/update','busStopController@busstopUpdate' );
            Route::get('/delete/{id}','busStopController@busstopDelete')->where('id', '[0-9]+');
        });

        Route::prefix('busline')->group(function () {
            Route::get('/','busLineController@busline')->name('listingBusLine');
            Route::get('/setup','busLineController@buslineSetup' )->name('setupBusLine');
            Route::post('/setup','busLineController@buslineInsert' );
            Route::get('/edit/{id}','busLineController@buslineEdit' )->where('id', '[0-9]+');
            Route::post('/update','busLineController@buslineUpdate' );
            Route::get('/delete/{id}','busLineController@buslineDelete')->where('id', '[0-9]+');
        });
    
        Route::prefix('township')->group(function () {
            Route::get('/','townshipController@township')->name('listingTownship');
            Route::get('/setup','townshipController@townshipSetup' )->name('setupTownship');
            Route::post('/setup','townshipController@townshipInsert' );
            Route::get('/edit/{id}','townshipController@townshipEdit' )->where('id', '[0-9]+');
            Route::post('/update','townshipController@townshipUpdate' );
            Route::get('/delete/{id}','townshipController@townshipDelete')->where('id', '[0-9]+');
        });

        Route::prefix('buslineroute')->group(function () {
            Route::get('/','busLineRouteController@index')->name('listingBusLineRoute');
            Route::get('/setup','busLineRouteController@Setup' )->name('setupBusLineRoute');
            Route::post('/setup','busLineRouteController@Insert' );
            Route::get('/edit/{id}','busLineRouteController@Edit' )->where('id', '[0-9]+');
            Route::post('/update','busLineRouteController@Update' );
            Route::get('/delete/{id}','busLineRouteController@Delete')->where('id', '[0-9]+');
        });

    });
});