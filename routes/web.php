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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contacts', 'ContactController@view')->name('contact.view');
Route::resource('/contact', 'ContactController');

Route::get('/category/view/{category}', 'CategoryController@view')->name('category.view');
Route::resource('/category', 'CategoryController');

Route::get('/article/view/{category}', 'ArticleController@view')->name('article.view');
Route::resource('/article', 'ArticleController');

Route::resource('/profile', 'ProfileController')->except('view');
Route::resource('/address', 'AddressController')->except('show');
Route::resource('/country', 'CountryController')->except('show');
Route::resource('/city', 'CityController')->except('show');
Route::resource('/order', 'OrderController');

Route::put('/parcel/{parcel}/order-add-parcel-id', 'ParcelController@orderAddParcelID')->name('parcel.order-add-parcel-id');
Route::put('/parcel/{order}/order-delete-parcel-id', 'ParcelController@orderDeleteParcelID')->name('parcel.order-delete-parcel-id');
Route::resource('/parcel', 'ParcelController');

Route::group([
    'prefix' => 'manager',
    'as' => 'manager.'
], function() {
    Route::get('/', 'ManagerController@index')->name('index');
    Route::get('/order-new', 'ManagerController@orderNew')->name('order-new');
    Route::get('/order-my', 'ManagerController@orderMy')->name('order-my');
    Route::put('/order-accept/{order}', 'ManagerController@orderAccept')->name('order-accept');
    Route::get('/order-show/{order}', 'ManagerController@orderShow')->name('order-show');
    Route::put('/order-status/{order}', 'ManagerController@orderStatus')->name('order-status');
    Route::put('/order-transfer/{order}', 'ManagerController@orderTransfer')->name('order-transfer');
    Route::get('/parcel-new', 'ManagerController@parcelNew')->name('parcel-new');
    Route::get('/parcel-my', 'ManagerController@parcelMy')->name('parcel-my');
    Route::put('/parcel-accept/{order}', 'ManagerController@parcelAccept')->name('parcel-accept');
    Route::get('/parcel-show/{order}', 'ManagerController@parcelShow')->name('parcel-show');
    Route::put('/parcel-status/{order}', 'ManagerController@parcelStatus')->name('parcel-status');
    Route::put('/parcel-transfer/{order}', 'ManagerController@parcelTransfer')->name('parcel-transfer');
});

Route::group([
    'prefix' => 'client',
    'as' => 'client.'
], function() {
    Route::get('/', 'ClientController@index')->name('index');
    Route::put('/parcel-send-to-packaging/{parcel}', 'ClientController@parcelSendToPackaging')->name('parcel-send-to-packaging');
});