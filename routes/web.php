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
    // return redirect()->route('kasus.index');
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

// disable route '/register'
Route::match(["GET", "POST"], "/register", function () {
    return abort(404);
});

// datatable
Route::group(['prefix' => 'getdata'], function () {
    Route::get('kasus', 'DataTableController@getKasus')->name('getdata.kasus');
    Route::get('fitur', 'DataTableController@getFitur')->name('getdata.fitur');
    Route::get('fitur-cb', 'DataTableController@getFiturCheckbox')->name('getdata.fitur.cb');
    Route::get('histori-kasus', 'DataTableController@getHistoriKasus')->name('getdata.historikasus');
});


Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // users
    Route::resource('users', 'UserController');
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
});


// Route::get('cbruser', function () {
//     return view('layouts.user');
// });

// app histori diagnosa
Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'HistoriDiagnosaController@index')->name('histori-diagnosa.index');
    Route::get('detail/{id}', 'HistoriDiagnosaController@show')->name('histori-diagnosa.show');
    Route::get('tambah-kasus', 'PerhitunganController@index')->name('tambah-kasus');
    Route::post('tambah-kasus', 'PerhitunganController@store')->name('tambah-kasus.store');
    // Route::post('/', 'KasusController@store')->name('kasus.store');
    // Route::get('{kasus}', 'KasusController@show')->name('kasus.show');                  
    // Route::get('{kasus}/edit', 'KasusController@edit')->name('kasus.edit');
    // Route::put('{kasus}', 'KasusController@update')->name('kasus.update');
    // Route::delete('{kasus}', 'KasusController@destroy')->name('kasus.destroy');

    Route::post('/revisi', 'RevisiController@create')->name('user.revisi');
    Route::post('/revisi/store', 'RevisiController@store')->name('user.revisi.store');
    Route::post('/retain', 'RevisiController@retain')->name('user.retain');
    Route::post('/retain/store', 'RevisiController@retain_store')->name('user.retain.store');
});
// Route::get('histori-diagnosa', 'HistoriDiagnosaController@index')->name('histori-diagnosa');
// Route::get('histori-diagnosa/{id}', 'HistoriDiagnosaController@detail')->name('histori-diagnosa.detail');
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tentang', function () {
    return view("bantuan.tentang");
});
Route::get('/penggunaan', function () {
    return view("bantuan.penggunaan");
});
