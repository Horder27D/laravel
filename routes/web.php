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

Route::match(
    ['get', 'post'],
    '/articles',
    "Articles@showArticles"
)->name('articles');

Route::match(
    ['get', 'post'],
    '/articles/delete', 
    "Articles@destroyArticles"
)->name('article-destroy');

Route::match(
    ['get', 'post'],
    '/articles/create', 
    "Articles@createArticles"
)->name('article-create');
    
Route::get(
    '/articles/update/{id}', 
    'Articles@showOneArticle'
)->name('article-update-page');

Route::match(
    ['get', 'post'],
    '/articles/update/{id}/success',
    'Articles@updateArticles'
)->name('article-update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/update', 'HomeController@updateuser')->name('update.user');

Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');
Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');


Route::match(['get', 'post'], '/update/img', 'UserInteractionController@updateuserimg')->name('update.user.img');
Route::match(['get', 'post'], '/update/name', 'UserInteractionController@updateusername')->name('update.user.name');

Route::match(['get', 'post'], '/home/{name_user}', 'UserInteractionController@index')->name('user'); //личный кабинет

Route::match(['get', 'post'], '/home/article/{id}', 'ArticlesController@showOneArticle')->name('article');
