<?php

$router->get('/', function () use ($router) {
  return redirect("/login");
});


$router->get('/login', ['uses' => 'LoginController@index']);
$router->post('/login', ['uses' => 'LoginController@login']);
$router->get('/logout', ['uses' => 'LoginController@logout']);

// $router->get('/logout', ['middleware' => 'auth', 'uses' => 'LoginController@index']);


/*
|--------------------------------------------------
| 管理员的接口
|--------------------------------------------------
*/
$router->group(['prefix' => '/manager', 'middleware' => 'auth', 'namespace' => '\App\Backend\Controllers'], function () use ($router) {
  // 管理设置
  $router->get('', 'ManagerController@index');
  // 列表
  $router->get('list', 'ManagerController@list');
  // 新增申请
  $router->get('apply', 'ManagerController@apply');
  // 新增
  $router->post('create', 'ManagerController@create');
  // 详细
  $router->get('{id}', 'ManagerController@detail');
  // 更新
  $router->post('{id}/update', 'ManagerController@update');
});
