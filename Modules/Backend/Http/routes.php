<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'backend',
    'as' => 'Backend::',
    'namespace' => 'Modules\Backend\Http\Controllers'
], function()
{

    Route::get('/home', 'BackendController@index')->name('home');


    Route::group([
        'prefix' => 'categories',
        'as' => 'CategoriesController.'
    ],function(){
        //CRUD
        Route::get('/', 'CategoriesController@index')->name('index');
        Route::post('/create', 'CategoriesController@store')->name('store');
        Route::get('/{category}', 'CategoriesController@show')->name('show');
        Route::post('/{category}/edit', 'CategoriesController@edit')->name('edit');
        Route::delete('/{category}/destroy', 'CategoriesController@destroy')->name('destroy');
        //Other method
        Route::get('/{category}/move/up', 'CategoriesController@move_up')->name('moveup');
        Route::get('/{category}/move/down', 'CategoriesController@move_down')->name('movedown');
        Route::post('/{category}/assign/image', 'CategoriesController@assignimage')->name('assignImage');
    });

});
