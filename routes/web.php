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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/profile/{user}', "ProfilesController@index")->name('profile.show');
Route::get("/profile/{user}/edit","ProfilesController@edit")->name('profile.edit');
Route::patch('/profile/{user}', "ProfilesController@update")->name('profile.update');

 
Route::get('/p/create', "PostsController@create")->name('profile.show');
Route::post('/p', "PostsController@store");
