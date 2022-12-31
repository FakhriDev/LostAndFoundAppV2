<?php
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\route;

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
Route::group(['middleware' =>['auth']], function (){
    Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
    Route::get('/myrequest','AdminController@myrequest')->name('myrequest');
    Route::get('/logout','UserController@logout')->name('logout');
    Route::get('/post','AdminController@post')->name('post');
    Route::post('/saveproduct','AdminController@saveproduct');
    Route::get('/details{id}','PagesController@details');
    Route::post('/doclaim','ClaimController@doclaim');
    Route::post('/approve{product_id}','ClaimController@approve');
    Route::post('/cancelled{product_id}','ClaimController@cancelled');
    Route::post('/delete{id}','ClaimController@delete');
    Route::get('/myads','AdminController@myads');
    Route::get('/profile','AdminController@profile');
    Route::post('/updateuser','AdminController@updateuser');
    Route::get('/editads{id}','AdminController@editads');
    Route::get('/delete/{id}','AdminController@deleteproduct');
    Route::post('/saveEditPost','AdminController@saveEditPost');
});
Route::get('/search','PagesController@index');
Route::get('/','PagesController@index');
Route::get('/Category{category}','PagesController@showItemCategory');
Route::get('/index','PagesController@index')->name('index');
Route::get('/login','PagesController@login')->name('login');
Route::get('/login','PagesController@login')->name('login');
Route::get('/register','PagesController@register')->name('register');
Route::post('/register','UserController@register')->name('register');
Route::post('/login','UserController@login')->name('login');


