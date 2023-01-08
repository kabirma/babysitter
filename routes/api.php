<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {

Route::get('/service','ApiController@get_service');
Route::get('/slider','ApiController@get_slider');
Route::get('/faq','ApiController@get_faq');

Route::post('/contact','ApiController@contact');
Route::post('/quote','ApiController@quote');
Route::post('/track','ApiController@invoice');
});