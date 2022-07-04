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

/*Route::get('/', function () {
    return view('welcome');
});*/




Route::get('/login','App\\Http\\Controllers\\LoginController@login')->name("login");
Route::post('/login','App\\Http\\Controllers\\LoginController@controllalogin');
Route::get('/logout','App\\Http\\Controllers\\LoginController@logout')->name("logout");

Route::get('/registrati','App\\Http\\Controllers\\RegisterController@controllaregistrazione')->name('registrati');
Route::post('/registrati','App\\Http\\Controllers\\RegisterController@creautente');
Route::get('/registrati/checkUtente/{q}','App\\Http\\Controllers\\RegisterController@controllautentepresente');
Route::get('/registrati/checkMail/{email}','App\\Http\\Controllers\\RegisterController@controllamail');

Route::get('/home','App\\Http\\Controllers\\HomeController@checkLogin')->name('home');
Route::get('/home/selpiatto','App\\Http\\Controllers\\HomeController@selpiatto');
Route::get('/home/inspost/{titolo}/{post}/{immagine}','App\\Http\\Controllers\\HomeController@inspost');

Route::get('/posts','App\\Http\\Controllers\\PostController@posts')->name('posts');
Route::get('/posts/postShow','App\\Http\\Controllers\\PostController@postShow');
Route::get('/posts/checkLike','App\\Http\\Controllers\\PostController@checkLike');
Route::get('/posts/userShow/{data}','App\\Http\\Controllers\\PostController@userShow');
Route::get('/posts/likePost/{data}/{data2}','App\\Http\\Controllers\\PostController@likePost');
Route::get('/posts/unlikePost/{data}/{data2}','App\\Http\\Controllers\\PostController@unlikePost');
Route::get('/posts/nLike/{id}','App\\Http\\Controllers\\PostController@nLike');


Route::get('/search_users','App\\Http\\Controllers\\SearchUserController@check')->name('search_users');
Route::get('/search_users/ricerca/{nome}/{cognome}','App\\Http\\Controllers\\SearchUserController@ricerca');
Route::get('/search_users/spotify/{q}','App\\Http\\Controllers\\SearchUserController@SpotifAPI');

