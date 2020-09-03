<?php

use Illuminate\Support\Facades\Route;

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
Route::get("/", function () {
    return redirect()->route("categories.index");
});
Route::resource("categories", "CategoriesController");
Route::resource("products", "ProductController")->except("show");
Route::resource("product_pictures", "ProductPicturesController")->only(["destroy",
]);
Route::resource("store", "StoreController");
Route::post("/add_product_to_cart/{product}", "StoreController@addToCart")->name("add_product_to_cart");
Route::get("/cart", "StoreController@viewCart")->name("view_cart");
Route::delete("/remove_from_cart", "StoreController@removeFromCart")->name("remove_from_cart");
Route::delete("/empty_cart", "StoreController@emptyCart")->name("empty_cart");
Route::get("/checkout", "StoreController@checkout")->name("checkout");
Route::resource("customers", "CustomerController");
Route::get("/{slug}", "ProductController@show")->name("product_detail");
