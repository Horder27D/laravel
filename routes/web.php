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

// Route::get('/', function () {
//     // return view('welcome');
//     return redirect()->route('home');
// });

Route::match(
    ['get', 'post'],
    '/articles',
    "Articles@showArticles"
)->name('articles');

Route::match(['get', 'post'], '/{user_id}/articles/delete', "ArticlesController@destroyArticles")->name('article.destroy');

Route::match(['get', 'post'], '/{user_id}/article/create', "ArticlesController@createArticlesPage")->name('article.create');
Route::match(['get', 'post'], '/{user_id}/article/create/submite', "ArticlesController@createArticles")->name('article.create.submite');
    
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/update', 'HomeController@updateuser')->name('update.user');

Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');
Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');


Route::match(['get', 'post'], '/update/img', 'UserInteractionController@updateuserimg')->name('update.user.img');
Route::match(['get', 'post'], '/update/name', 'UserInteractionController@updateusername')->name('update.user.name');

Route::match(['get', 'post'], '/lk/{id}', 'UserInteractionController@index')->name('user'); //личный кабинет
Route::match(['get', 'post'], '/user/{id}', 'UserInteractionController@viewUser')->name('viewuser'); //просмотр пользователя 
Route::match(['get', 'post'], '/{id}/articles', 'UserInteractionController@viewArticles')->name('user.articles'); //просмотр публикаций 

Route::match(['get', 'post'], '/article/{id}', 'ArticlesController@showOneArticle')->name('article');

Route::match(['get', 'post'], '/home',  'HomeController@homeView')->name('adminka');

Route::match(['get', 'post'], '/home/article',  'HomeController@homeViewArticles')->name('admin.article');
Route::match(['get', 'post'], '/home/user',  'HomeController@homeViewUsers')->name('admin.user');
Route::match(['get', 'post'], '/home/rating',  'HomeController@homeViewRatings')->name('admin.rating');

Route::get('/home/article/update/{id}',  'HomeController@homeArticlesUpdate')->name('admin.article.update');
Route::post('/home/article/update/{id}',  'ArticlesController@updatePost')->name('admin.article.update.submite');
Route::get('/home/article/delete/{id}',  'ArticlesController@deletePost')->name('admin.article.delete');

Route::match(['get', 'post'], '/home/user/update/{id}',  'HomeController@homeUsersUpdate')->name('admin.user.update');
Route::post('/home/user/update/{id}',  'UserInteractionController@updateUser')->name('admin.user.update.submite');
Route::get('/home/user/delete/{id}',  'UserInteractionController@deleteUser')->name('admin.user.delete');

Route::post('/home/rating/update/{id}',  'RatingsController@updateRating')->name('admin.rating.update');
Route::get('/home/rating/delete/{id}',  'RatingsController@deleteRating')->name('admin.rating.delete');

Route::match(['get', 'post'], '/test/test/test/test/test',  'HomeController@test')->name('test');