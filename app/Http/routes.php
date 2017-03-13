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
$app->get('/', function () {
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
$app->group(['prefix' => '/login', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    // 用户登录
    $app->post('signin', 'LoginController@signIn');
    // 用户登出
    $app->get('signout', 'LoginController@signOut');
});

/*
|--------------------------------------------------
|管理员的页面和接口 Route 设置
|--------------------------------------------------
 */
// 操作日志
$app->get('/operation/list', 'ManagerController@operationList');

// 管理员的接口
$app->group(['prefix' => '/manager', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    // 管理设置
    $app->get('setup', 'ManagerController@setup');
    // 管理员列表
    $app->get('list', 'ManagerController@getList');
    // 新增管理员申请
    $app->get('apply', 'ManagerController@apply');
    // 新增管理员
    $app->post('create', 'ManagerController@create');
    // 管理员
    $app->get('{id}', 'ManagerController@detail');
    // 管理员
    $app->post('{id}/update', 'ManagerController@update');
});

// 管理员的接口
$app->group(['prefix' => '/test', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    // video-js
    $app->get('video-js', 'TestController@videojs');
    // vue-js
    $app->get('vue', 'TestController@vue');
    // pixi html5
    $app->get('pixi', 'TestController@pixi');
});


/*
|--------------------------------------------------
|分组管理
|--------------------------------------------------
 */
$app->group(['prefix' => '/grouping', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    // 分组列表
    $app->get('list', 'GroupingController@getList');
    // 新增分组表单
    $app->get('apply', 'GroupingController@apply');
    // 新增分组信息
    $app->post('create', 'GroupingController@create');
    // 编辑分组
    $app->get('{id}', 'GroupingController@detail');
    // 更新分组信息
    $app->post('{id}/update', 'GroupingController@update');
});

/*
|--------------------------------------------------
| 任务 和 Debug
|--------------------------------------------------
 */
// 任务的接口
$app->group(['prefix' => '/task', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    // 任务列表
    $app->get('list', 'TaskController@getList');
    // 新增任务申请
    $app->get('apply', 'TaskController@apply');
    // 新增任务
    $app->post('create', 'TaskController@create');
    // 编辑任务
    $app->get('{id}', 'TaskController@detail');
    // 更新任务信息
    $app->post('{id}/update', 'TaskController@update');
});

/*
|--------------------------------------------------
| 项目操作
|--------------------------------------------------
 */
// 管理员的接口
$app->group(['prefix' => '/project', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    // 数据管理
    $app->get('api-manage', 'ProjectController@apiManage');
    // 数据管理
    $app->get('data-manage', 'ProjectController@dataManage');
    // 数据管理
    $app->get('doc-manage', 'ProjectController@docManage');

    // 接口
    $app->get('api-debug/{key}', 'ProjectController@apiDebug');
    // 数据
    $app->get('data/{key}', 'ProjectController@data');
    // 软删除一条记录
    $app->get('data/{key}/{id}/switch', 'ProjectController@dataSwitch');
    // 编辑一条记录
    $app->get('data/{key}/{id}', 'ProjectController@dataEditor');
    // 更新一条记录
    $app->post('data/{key}/{id}', 'ProjectController@dataUpdate');
});

/*
|--------------------------------------------------
| 频道管理
|--------------------------------------------------
 */
// 频道管理
$app->group(['prefix' => '/channel-manager', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    // 接口
    $app->get('list', 'ChannelManagerController@getList');
    // 频道模版
    $app->get('demo/{id}', 'ChannelManagerController@demo');
});

/*
|--------------------------------------------------
| 杂项
|--------------------------------------------------
 */
$app->group(['prefix' => '/sundry', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
    // 接口
    $app->get('icons', 'SundryController@icons');
});
