<?php

use Illuminate\Support\Facades\Route;
use App\Models\Products;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductsController;

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

Route::get('/home', function () {
    return '<H1>Backend test<H1> <br>
    Select product<br><br>
    
    Products:<input><br>
    Stores:<input><br>
    Url: <input><br><br>
    <a href="http://localhost:8000/add">Add product</a>
    <a href="http://localhost:8000/remove">Remove product</a>
   
    ';
});

Route::get('/saved', function () {
    return 'Product is saved<br><br>
    <a href="http://localhost:8000/home">Back to home page</a>';
});

Route::get('/removed', function () {
    return 'Product is removed <br><br>
    <a href="http://localhost:8000/home">Back to home page</a>';
});

Route::get('/save', function () {
    return '<H1>Add product</H1><br><br>
    
    Products:<input><br>
    Stores:<input><br>
    Url: <input><br><br>
    <a href="http://localhost:8000/saved">Save product</a>
    ';
    
});

Route::get('/add', function () {
    return '<H1>Add product</H1><br><br>
    
    Products:<input><br>
    Stores:<input><br>
    Url: <input><br><br>
    <a href="http://localhost:8000/saved">Save</a>
    <a href="http://localhost:8000/home">Cancel</a>';
    
});

Route::get('/remove', function () {
    return '<H1>Remove product</H1><br><br>
    
    Products:<input><br>
    Stores:<input><br>
    Url: <input><br><br>
    <a href="http://localhost:8000/removed">Remove</a>
    <a href="http://localhost:8000/home">Cancel</a>';
    
});
Route::post('add_product', 'HomeController@store');
Route::get('products', [ProductsController::class,'showProduct']);
Route::get('stores', [ProductsController::class,'showStore']);
Route::get('urls', [ProductsController::class,'showUrl']);

Route::get('/add_product',[ProductsController::class,'addProduct'])->name('products.add');
Route::post('/add_product',[ProductsController::class,'saveProduct'])->name('save.product');
Route::get('/edit_product/{id}',[ProductsController::class,'editProduct'])->name('products.edit');
Route::get('/stores/{id}',[ProductsController::class,'editStore'])->name('store.edit');
Route::get('/delete_product/{id}',[ProductsController::class,'deleteProduct'])->name('products.delete');
Route::get('/update_product',[ProductsController::class,'updateProduct'])->name('update.product');
