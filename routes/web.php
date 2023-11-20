<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Route::group(['namespace' => 'App\Http\Controllers\Auth'] , function (){
    // Authentication Routes...
    Route::get('login'                    , 'LoginController@showLoginuserForm')    ->name('loginuser');
    Route::get('login/{provider}'         , 'LoginController@redirectToProvider')   ->name('redirectToProvider');
    Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback')->name('handleProviderCallback');
    Route::get('remember'                 , 'LoginController@showLoginrememberForm')->name('remember');
    Route::post('remember'                , 'LoginController@remember')             ->name('remember');
    Route::post('login-user'              , 'LoginController@loginuser')            ->name('login-user');
    Route::get('logout'                   , 'LoginController@logout')               ->name('logout');
    Route::get('reload-captcha'           , 'LoginController@reloadcaptcha')        ->name('reload-captcha');
    Route::get('token'                    , 'TokenController@showToken')            ->name('phone.token');
    Route::post('token'                   , 'TokenController@token')                ->name('verify.phone.token');
    Route::get('setpass'                  , 'TokenController@setpassshow')          ->name('setpass');
    Route::post('setpass'                 , 'TokenController@update')               ->name('setpass');
    Route::get('register'                 , 'RegisterController@showRegistrationuserForm');
    Route::post('register'                , 'RegisterController@registeruser')->name('register');

});
