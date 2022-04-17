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

    Route::get('/sinfo', function () {


        $shop = Auth::user();
        $themes = $shop->api()->rest('GET', '/admin/api/2022-04/themes.json');
        $shopThemes = $themes['body']['themes'];
        $searchedThemeRole = "main";
        //search for the right theme id with the main role
        $activeTheme = array_filter(
            $shopThemes->toArray(),
            function ($e) use (&$searchedThemeRole) {
                return $e['role'] == $searchedThemeRole;
            }
        );
        $activeThemeId = $activeTheme[0]['id'];
        $snippet = "{% section 'product-template' %}";
        //Snippet to pass to rest api request
        $data = array(
            'asset'=> [
                'key' => 'templates/product.lskit_theme_edit.liquid', 
                'value' => $snippet
            ]
        );
        $shop->api()->rest('PUT', '/admin/api/2022-04/themes/'.$activeThemeId.'/assets.json', $data);
        // get shop active currency
        $shop_data = $shop->api()->rest('GET', '/admin/api/2022-04/shop.json');
        $shop_active_currency = $shop_data['body']->shop->currency;
        // Save activated shop
        return "Scuccessful installed";


    })->name('test');
    

});
