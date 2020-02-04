<?php

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
    return view('product.listProducts');
});

Route::get('/products', 'ProductController@getProduct');
Route::get('/product/{id}', 'ProductController@viewProduct');
Route::get('/products/register', 'ProductController@productRegistration');
Route::post('/product/register', 'ProductController@productRegister');
Route::post('/product/update', 'ProductController@update');
Route::get('/product/delete/{id}', 'ProductController@delete');

Route::get('/retailers', 'RetailerController@getRetailers');
Route::get('/retailer/list', 'RetailerController@index');
Route::get('/autocomplete/fetch', 'RetailerController@fetch')->name('autocomplete.fetch');
Route::get('/retailer/register', 'RetailerController@retailerRegistration');
Route::post('/retailers/register', 'RetailerController@retailerRegister');
Route::post('/retailer/update', 'RetailerController@update');
Route::get('/retailer/{id}', 'RetailerController@show');




