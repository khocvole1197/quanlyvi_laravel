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

use App\DealMoney;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('revenue1', 'DealMoneyController@revenue')->name('revenue1');
    Route::get('expense1', 'DealMoneyController@expenseMoney')->name('espense1');
    Route::get('only_revenue', 'HomeController@onelyRevenue')->name('onlyRevenue');
    Route::get('onlyExpense', 'HomeController@onelyExpense')->name('onlyExpense');

    Route::get('Export', 'ExportController@exportExcel');
    Route::get('ExportRevenue', 'ExportController@exportRevenue');
    Route::get('ExportExpense', 'ExportController@exportExvenue');

    Route::get('createWallet', 'DealMoneyController@createWallet')->name('createWallet');
    Route::get('transfersMoney', 'DealMoneyController@transfersMoney')->name('transfersMoney');
    Route::get('profile', 'ProfileController@profile')->name('profile');

    Route::get('deleteWallet', 'DealMoneyController@deleteWallet')->name('deleteWallet');
    Route::post('/home', 'HomeController@dateFromTo')->name('dateForm');
});

Route::post('/revenue1', 'DealMoneyController@updateMoney')->name('updateMoney1');

Route::post('/expenseMoney1', 'DealMoneyController@updateMoneyExpense')->name('expenseMoney1');

Route::post('transfersMoney', 'DealMoneyController@transfersMoney1')->name('transfersMoney1');
//profile


Route::post('editInfo', 'ProfileController@UpdateInfo')->name('UpdateInfo');

//test

route::post('/revenue2', 'DealMoneyController@getAjaxTest');
route::get('/test', function () {
    dump($_SERVER['SERVER_NAME']);
});




