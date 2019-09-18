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


Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
});

Route::get('/login-user', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login-user', 'Auth\LoginController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'SpaController@index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/register-user', function () {
        return view('register');
    });

    Route::post('/register-user', 'Auth\RegisterController@register')->name('register');
    Route::post('/register-user', 'RegisterNewController@store')->name('newRegister');


    Route::post('/addWork', 'WorkController@store');

    Route::get('/getWork_new', 'WorkController@getWork_new');
    Route::get('/getProvinces_new', 'WorkController@getProvinces');
    Route::get('/getRegion_new', 'WorkController@getRegion');
    Route::get('/getPosition_new', 'WorkController@getPosition');

    Route::post('/editWork', 'WorkController@editWork');
    Route::post('/delete', 'WorkController@delete');

    Route::get('/allwork', 'WorkController@allwork');
    Route::get('/getProvinces_all', 'WorkController@getProvincesAll');
    Route::get('/getRegion_all', 'WorkController@getRegionAll');
    Route::get('/getPosition_all', 'WorkController@getPositionAll');

    Route::post('/getWrokByDate', 'WorkController@getWrokByDate');
    Route::post('/getProvincesByDate', 'WorkController@getProvincesByDate');
    Route::post('/getRegionsByDate', 'WorkController@getRegionsByDate');
    Route::post('/getPositionsByDate', 'WorkController@getPositionsByDate');

    Route::post('/getWrokByTopic', 'WorkController@getWrokByTopic');
    Route::post('/getProvincesByTopic', 'WorkController@getProvincesByTopic');
    Route::post('/getRegionsByTopic', 'WorkController@getRegionsByTopic');
    Route::post('/getPositionsByTopic', 'WorkController@getPositionsByTopic');

    Route::post('/addWorkLink', 'WorkLinkController@store');
    Route::post('/getWorkLink', 'WorkLinkController@getWorkLink');
    Route::post('/edit_work_link', 'WorkLinkController@edit_work_link');
    Route::post('/delete_link', 'WorkLinkController@delete_link');
});
