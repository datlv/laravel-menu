<?php
Route::group([
    'prefix' => 'backend',
    'as' => 'backend.',
    'namespace' => 'Datlv\Menu',
    'middleware' => config('menu.middleware'),
], function () {
    Route::group(['prefix' => 'menu', 'as' => 'menu.'], function () {
        Route::get('data', ['as' => 'data', 'uses' => 'Controller@data']);
        Route::get('{menu}/create', 'Controller@createChildOf');
        Route::post('move', ['as' => 'move', 'uses' => 'Controller@move']);
        Route::post('{menu}', ['as' => 'storeChildOf', 'uses' => 'Controller@storeChildOf']);
        Route::get('for/{name}', ['as' => 'name', 'uses' => 'Controller@index']);
        Route::get('{menu}/params', 'Controller@params');
        Route::match(['PUT', 'PATCH'], '{menu}/update_params', [
            'as' => 'update_params',
            'uses' => 'Controller@updateParams',
        ]);
    });
    Route::resource('menu', 'Controller');
});