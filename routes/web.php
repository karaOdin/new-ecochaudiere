<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
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



Route::get('/', function () {
    $products = DB::table('products')->skip(1)->take(3)->get();
    return view('welcome', compact('products'));
});

Route::get('/contactus', function () {
    return view('contact');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{slug}',[ProductController::class,'getOnePrd']);
