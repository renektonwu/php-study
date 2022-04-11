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

// http://192.168.50.133/api/greeting #
Route::get("/greeting", function () {
    return 'Hello World';
});

Route::get('/test/select', 'TestTestController@get');
Route::get('/test/add', 'TestTestController@add');
Route::get('/test/delete', 'TestTestController@delete');
Route::get('/test/update', 'TestTestController@update');

Route::post('/test/postupdate', 'TestTestController@postupdate');


// 路径参数
Route::get('/test/uri1/{id}', 'TestTestController@pathuri');

// 查询参数的5种方法
//Route::get('/test/uri2/:id', 'TestTestController@queryuri');
Route::get('/test/uri2', 'TestTestController@queryuri');
Route::get('/test/uri3', 'TestTestController@testbracks');

// reids test
//http://192.168.50.133/api/test/set/www
Route::get('/test/set/{key}', 'TestTestController@redisSet');
//http://192.168.50.133/api/test/get
Route::get('/test/get', 'TestTestController@redisGet');

/**
 * es 增删改查
 */
// 使用原生的es
Route::get('/test/es/create_index', 'TestTestController@createIndex');
Route::get('/test/es/add_doc', 'TestTestController@addDoc');
Route::get('/test/es/search_doc', 'TestTestController@searchDoc');

Route::get('/test/es/getdata_ori', 'TestTestController@getDataOriginal');

Route::get('/test/es/getdata', 'TestTestController@getData');
// 查所有
Route::get('/test/es/all', 'TestTestController@getAllData');
// 查单条记录
Route::get('/test/es/{id}', 'TestTestController@getDataById');
// 增加
Route::post('/test/es/create', 'TestTestController@insertData');
// 改
Route::put('/test/es/update/{id}', 'TestTestController@updateData');
// 删
Route::delete('/test/es/{id}', 'TestTestController@deleteData');






