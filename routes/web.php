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

Route::get('/', ['as' => 'index', 'uses' => 'App\Http\Controllers\SiteController@index']);
Route::post('/upload',['as' => 'upload', 'uses' => 'App\Http\Controllers\SiteController@UploadFile']);