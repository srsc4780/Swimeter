<?php

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

Route::group(['namespace' => 'Api'], function () {
    Route::group(['prefix' => 'device', 'namespace' => 'Device'], function () {
        Route::any('usage', 'ConsumptionController@saveConsumption');
    });

    Route::group(['prefix' => 'meters'], function () {
        Route::group(['prefix' => '{meter}'], function () {
            Route::get('consumptions', 'MeterController@consumptions');
        });
    });
});
