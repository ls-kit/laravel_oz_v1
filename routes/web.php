<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::group(['middleware' => 'verify.shopify'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');
    
    Route::view('/products', 'products');
    Route::view('/customers', 'customers');
    Route::view('/settings', 'settings');

    Route::get('/sinfo.json', function () {
        $shop = Auth::user();
        $themes = $shop->api()->rest('GET', '/admin/themes.json');

        return json_encode($themes);
    })->name('test');
    

});
