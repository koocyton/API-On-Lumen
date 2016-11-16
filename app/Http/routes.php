<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// 更路径
$app->get('/', function () use ($app) {
	return redirect()->route('login');
});

/*
|-----------------------------------------------------
| 登录接口处理
|-----------------------------------------------------
*/
// 页面 - 显示登录的界面
$app->get('/login', ['as' => 'login', 'uses' => 'LoginController@index']);

// 登录校验的接口
$app->group(['prefix' => 'login'], function () use ($app) {
	// 用户登录
	$app->post('signin', ['uses' => 'App\Http\Controllers\LoginController@signIn']);
	// 用户登出
	$app->get('signout', 'LoginController@signOut');
});



/*
|--------------------------------------------------
|管理员的页面和接口 Route 设置
|--------------------------------------------------
*/
// 页面 - 管理员列表
$app->get('/managers', [ 'uses' => '/manager/list' ]);
// 页面 - 某个管理员信息
$app->get('/manager/{id}', [ 'uses' => '/manager/detail' ]);

// 管理员的接口
$app->group(['prefix'=>'manager'], function() use ($app) {
	// 创建管理员
	$app->post('/{id}', 'ManagerController@create');
	// 更新管理员信息
	$app->put('/{id}', 'ManagerController@update');
	// 删除管理员
	$app->delete('/{id}', 'ManagerController@delete');
});

