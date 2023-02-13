<?php

Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');

    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@showDashboardPage')->name('home');

    Route::group(['prefix' => 'meters', 'as' => 'meters.'], function () {
        Route::get('/', 'MeterController@index')->name('list');

        Route::group(['prefix' => '{meter}'], function () {
            Route::get('/', 'MeterController@view')->name('view');

            Route::group(['prefix' => 'consumptions', 'as' => 'consumptions.'], function () {
                Route::get('/', 'ConsumptionController@index')->name('list');
            });
        });
    });

    Route::group(['prefix' => 'billing', 'as' => 'billing.'], function () {
        Route::get('/', 'BillingController@index')->name('list');
        Route::post('/add-transaction', 'BillingController@addTransaction')->name('add-transaction');
    });

    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::get('/', 'AccountController@showAccountInfoPage')->name('info');
        Route::post('/', 'AccountController@updateAccountInfo');
    });

    Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
        Route::get('/', 'DashboardController@showDashboardPage')->name('dashboard');

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', 'UserController@index')->name('list');

            Route::get('create', 'UserController@add')->name('add');
            Route::post('/', 'UserController@create');

            Route::group(['prefix' => '{user}'], function () {
                Route::get('/', 'UserController@view')->name('view');

                Route::get('edit', 'UserController@edit')->name('edit');
                Route::post('/', 'UserController@update')->name('update');

                Route::group(['prefix' => 'meters', 'as' => 'meters.'], function () {
                    Route::get('add', 'MeterController@add')->name('add');
                    Route::post('add', 'MeterController@create');

                    Route::group(['prefix' => '{meter}'], function () {
                        Route::get('/', 'MeterController@view')->name('view');
                        Route::get('consumptions', 'MeterController@consumptions')->name('consumptions');
                    });
                });
            });
        });

        Route::group(['prefix' => 'invoices', 'as' => 'invoices.'], function () {
            Route::get('/', 'InvoiceController@index')->name('list');

            Route::group(['prefix' => '{invoice}'], function () {
                Route::get('change-status', 'InvoiceController@changeStatus')->name('change-status');
            });
        });
    });
});
