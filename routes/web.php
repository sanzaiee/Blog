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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/superadmin','HomeController@superAdmin')->middleware('superadmin');
Route::get('/admin','HomeController@admin')->middleware('admin');


Route::resource('/category', 'CategoryController')->middleware('superadmin');
Route::get('/category/{id}/delete','CategoryController@destroy')->middleware('superadmin');



Route::resource('/user', 'UserController')->middleware('superadmin');
Route::get('/user/{id}/delete','UserController@destroy')->middleware('superadmin');

Route::group(['can:admin,superadmin'], function () {
    Route::resource('/blog', 'BlogController');
    Route::get('/blog/{id}/delete','BlogController@destroy');
});



Route::get('/','FrontendController@forData');
Route::get('/about','FrontendController@forAbout');
// Route::get('/blogs','FrontendController@forCategory');
Route::get('/{id}/blog/{catname}','FrontendController@forCategory');
Route::post('/add/client','FrontendController@StoreClient');

// Route::get('/about', function () {
//     return view('frontend.about');
// });
