<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(
    ['namespace' => 'Api'],
    function () {
        Route::get('products', 'ProductController@getAllProducts');
        Route::get('products/new', 'ProductController@getNewProducts');
        Route::get('products/suggestion', 'ProductController@getSuggestionProducts');
        Route::get('products/hot', 'ProductController@getHotProducts');
        Route::get('products/search', 'ProductController@searchProduct');
        Route::get('products/{id}', 'ProductController@getDetailProduct');
        Route::post('products', 'ProductController@createProduct');
        Route::put('products/{id}', 'ProductController@updateProduct');
        Route::delete('products/{id}', 'ProductController@deleteProduct');
    }
);

Route::group(
    ['namespace' => 'Api'],
    function () {
    Route::post('transaction', 'TransactionController@createOrder');
});

Route::group(
    ['namespace' => 'Api'],
    function () {
    Route::get('category', 'CategoryController@getCategory');
    Route::get('category/{id}', 'CategoryController@getCategoryProduct');
});

Route::group(
    ['namespace' => 'Api\Auth'],
    function () {
        Route::post('register', 'UserController@register');
        Route::post('login', 'UserController@login');
    }
);
