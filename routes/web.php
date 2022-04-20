<?php

use App\Http\Controllers\SettingController;
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

    // new added controlller
    /**
     * We are useing laravel ^8. routeing style hasbeen changed after laravel 7
     * @see: https://laravel.com/docs/9.x/controllers
     */
    Route::post('configure-theme', [SettingController::class, 'configureTheme']);
    Route::resource('settings', SettingController::class);


});
