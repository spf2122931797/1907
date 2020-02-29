<?php

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

//分类添加视图
Route::get('/create',('CateController@create'));
//分类添加数据
Route::post('/store',('CateController@store'));
//分类列表
Route::get('/index',('CateController@index'));
//分类删除
Route::get('/destroy_del/{c_id}',('CateController@destroy_del'));
//分类修改页面
Route::get('/cate_edit/{c_id}',('CateController@cate_edit'));
//分类修改数据
Route::post('/cate_update/{c_id}',('CateController@cate_update'));
//分类添加js验证
Route::post('/jscate',('CateController@jscate'));



//商品登录视图
// Route::view('/login',('login'));
//商品登录数据
Route::post('/logindo',('LoginController@logindo'));
//商品添加视图
Route::get('/goods_create',('GoodsController@goods_create'))->middleware("login");
//商品添加视图
Route::post('/goods_store',('GoodsController@goods_store'))->middleware("login");
//商品展示
Route::get('/goods_index',('GoodsController@goods_index'))->middleware("login");
//商品删除
Route::get('/goods_destroy/{g_id}',('GoodsController@goods_destroy'))->middleware("login");


//管理员
Route::get('/admin/create','AdminController@create');
Route::post('/admin/store','AdminController@store');
Route::get('/admin/index','AdminController@index');
Route::get('/admin/destroy/{uid}','AdminController@destroy');
Route::get('/admin/update/{uid}','AdminController@update');
Route::post('/admin/update_do/{uid}','AdminController@update_do');


//项目前台
Route::get('/index/index','Index\IndexController@index');
Route::view('/index/login','index.login');
Route::get('/index/reg','Index\IndexController@reg');

Route::get('index/setcookie','Index\IndexController@setcookie');
Route::get('/index/prolist','Index\IndexController@prolist');
Route::get('/index/proinfo/{id}','Index\IndexController@proinfo');


//管理员登录
Route::get('/index/user','UserController@user');
Route::post('/user/user_do','UserController@user_do');
Route::get('/user/list','UserController@list');
Route::get('/user/admin/{uid}','UserController@admin');
Route::get('/user/destroy/{uid}','UserController@destroy');


//测试
Route::get('/good/good','GoodController@good');