<?php

use Illuminate\Http\Request;

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
Route::post('/login', ['as'=>'/login','uses'=>'Auth\LoginController@login']);
Route::post('/register',['as'=>'/register','uses'=>'Auth\RegisterController@register']);

Route::prefix('/password')->group(function (){
Route::post('/email',['as'=>'/reset_link','uses'=>'Auth\ForgotPasswordController@getResetToken']);
Route::post('/reset',['as'=>'/reset_password','uses'=>'Auth\ResetPasswordController@reset']);
});
Route::prefix('/profile')->group(function () {
    Route::put('/setting',['as'=>'setting','uses'=>'profileController@setting']);
});
