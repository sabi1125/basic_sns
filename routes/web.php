<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/', "PostsController@index")->name("post.index");


Auth::routes();


//profile route


Route::get("/profile/create" , "ProfilesController@create")->name("profile.create"); 
Route::get("/profile/auth","ProfilesController@index");
Route::post("/profile" , "ProfilesController@store")->name("profile.store");
Route::get('/profile/{user}', "ProfilesController@show")->name('profile.show');
Route::get("/profile/{user}/edit","ProfilesController@edit")->name('profile.edit');
Route::patch('/profile/{user}', "ProfilesController@update")->name('profile.update');


//posts routes

Route::get('/p/create', "PostsController@create")->name('posts.create');
Route::post('/p', "PostsController@store");
Route::get("/p/{post}","PostsController@show");








//follow posts

Route::post("/follow/{user}","FollowsController@store");