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

//menampilkan seluruh data dosen
Route::get('dosen', 'DosenController@index');

//menampilkan detail dosen
Route::get('dosen/{id}', 'DosenController@show');

//menyimpan data dosen
Route::post('dosen', 'DosenController@store');

//update data dosen
Route::put('dosen/{id}', 'DosenController@update');

//delete data dosen
Route::delete('dosen/{id}', 'DosenController@destroy');
