<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => ['api','cors']], function () {
    Route::post('auth/register', 'Auth\ApiRegisterController@create');
    Route::post('auth/resetpassword', 'Auth\ApiResetPasswordController@sendResetLinkEmail');
	Route::get('/categories','Api\\CategoriesController@getCategoriesWithNoParents');
    Route::get('/categories/{categorie}/childs','Api\\CategoriesController@getCategoriesFromParent');
    Route::get('/categories/{categorie}','Api\\CategoriesController@getCategorie');
});

Route::middleware('auth:api')->group(function(){

    Route::get('/check-token',function(){
        return ['message' => 'Authenticated'];
    });

    //Return user informations.
    Route::get('/user',function (Request $request) {
        return $request->user();
    });

    Route::get('/user/is-admin',function (Request $request) {
        return $request->user()->is_admin;
    });


    //Categories
    //Route::get('/categories','Api\\CategoriesController@getCategoriesWithNoParents');
    //Route::get('/categories/{categorie}/childs','Api\\CategoriesController@getCategoriesFromParent');
    //Route::get('/categories/{categorie}','Api\\CategoriesController@getCategorie');


});