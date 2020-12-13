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
    return redirect()->route('kasus.index');
});

Auth::routes();

// disable route '/register'
Route::match(["GET", "POST"], "/register", function () {
    return abort(404);
});

// datatable
Route::group(['prefix' => 'getdata'], function () {
    Route::get('kasus', 'DataTableController@getKasus')->name('getdata.kasus');
    Route::get('fitur', 'DataTableController@getFitur')->name('getdata.fitur');
    Route::get('fitur-cb', 'DataTableController@getFiturCheckbox')->name('getdata.fitur.cb');
});


// app kasus
Route::group(['prefix' => 'kasus'], function () {
    Route::get('/', 'KasusController@index')->name('kasus.index');                  
    Route::get('create', 'KasusController@create')->name('kasus.create');
    Route::post('/', 'KasusController@store')->name('kasus.store');
    Route::get('{kasus}', 'KasusController@show')->name('kasus.show');                  
    Route::get('{kasus}/edit', 'KasusController@edit')->name('kasus.edit');
    Route::put('{kasus}', 'KasusController@update')->name('kasus.update');
    Route::delete('{kasus}', 'KasusController@destroy')->name('kasus.destroy');
});

// app fitur
Route::group(['prefix' => 'fitur'], function () {
    Route::get('/', 'FiturController@index')->name('fitur.index');                  
    Route::get('create', 'FiturController@create')->name('fitur.create');
    Route::post('/', 'FiturController@store')->name('fitur.store');
    Route::get('{fitur}/edit', 'FiturController@edit')->name('fitur.edit');
    Route::put('{fitur}', 'FiturController@update')->name('fitur.update');
    Route::delete('{fitur}', 'FiturController@destroy')->name('fitur.destroy');
});

// app kasus detail
Route::group(['prefix' => 'kasus/detail'], function () {
    Route::get('create/{kasus_detail}', 'KasusDetailController@create')->name('kasus.detail.create');
    Route::post('store/1', 'KasusDetailController@store1')->name('kasus.detail.store1');
    Route::post('store/2', 'KasusDetailController@store2')->name('kasus.detail.store2');
    Route::delete('{kasus_detail}', 'KasusDetailController@destroy')->name('kasus.detail.destroy');
    Route::put('{kasus_detail}', 'KasusDetailController@update')->name('kasus.detail.update');
});

Route::get('perhitungan','PerhitunganController@index')->name('perhitungan.index');
Route::post('perhitungan', 'PerhitunganController@store')->name('perhitungan.store');

