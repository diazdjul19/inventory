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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Category
Route::resource('category','CategoryController');
Route::get('category/delete/{id}',"CategoryController@destroy")->name("category.destroy");
Route::get('/search_category', "CategoryController@search");


// Product
Route::resource('product','ProductController');
Route::get('product/delete/{id}',"ProductController@destroy")->name("product.destroy");
Route::get('/search_product', "ProductController@search");

// Stock
Route::resource('stock','StockController');
Route::get('stock/delete/{id}', "StockController@destroy")->name("stock.destroy");
Route::get('/search_stock', "StockController@search");

// Customer
Route::resource('customer', 'CustomerController');
Route::get('customer/delete/{id}', "CustomerController@destroy")->name("customer.destroy");
Route::get('/search_customer', "CustomerController@search");


// Sales
Route::resource('sales', 'SalesController');
Route::get('sales/delete/{id}', "SalesController@destroy")->name("sales.destroy");
Route::get('/search_sales', "SalesController@search");


// Supplier
Route::resource('supplier', 'SupplierController');
Route::get('supplier/delete/{id}', "SupplierController@destroy")->name("supplier.destroy");
Route::get('/search_supplier', "SupplierController@search");


// Buying
Route::resource('buying', 'BuyingController');
Route::get('buying/delete/{id}', "BuyingController@destroy")->name("buying.destroy");
Route::get('/search_buying', "BuyingController@search");

Route::get('buying/approve/{id}', "BuyingController@approve")->name("buying.approve");
Route::get('buying/cancel/{id}', "BuyingController@cancel")->name("buying.cancel");



Route::get('testing',function(){
    return \App\Models\MsProduct::with('category')->paginate(5);
});