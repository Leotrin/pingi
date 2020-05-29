<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ping', function () {
    $exitCode = Artisan::call('check-servers');
});
//Route::get('/ping','Controller@pingMango');

Auth::routes(['verify' => true]);

Route::group(['middleware'=>['auth','verified']], function(){
    Route::get('/home','HomeController@__index')->name('home');

    Route::match(['get','post'],'/profile','HomeController@__profile');
    Route::match(['post'],'/update/password','HomeController@__password');

    Route::get('web-ping','WebsiteController@__index');
    Route::get('web-traceroute','WebsiteController@__index');
    Route::group(['prefix'=>'website'], function(){
        Route::get('/','WebsiteController@__index');
        Route::post('/new','WebsiteController@__store');
        Route::post('/check','WebsiteController@__check');
        Route::post('/ping','WebsiteController@__ping');
        Route::post('/search','WebsiteController@__search');
        Route::post('/traceroute','WebsiteController@__traceroute');
        Route::post('/update','WebsiteController@__store');
        Route::post('/destroy','WebsiteController@__destroy');
        Route::post('/start','WebsiteController@__start');
        Route::post('/pause','WebsiteController@__pause');

        Route::get('/history/{id}','WebsiteController@__history');
    });
});
