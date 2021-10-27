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

Route::get('/', "ArticleController@index");
Route::post('/article_create', 'ArticleController@store')->name('articles.store');
Route::get('/comment/{id}', 'ArticleController@show')->name('articles.show');
Route::post('/comment_post', 'CommentController@store')->name('comments.store');
Route::post('/comment_destroy', 'CommentController@destroy')->name('comments.destroy');