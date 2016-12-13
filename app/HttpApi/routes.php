<?php

// 获取 access token
$app->post('/access-token', 'UserController@accessToken');

// 获取频道菜单
$app->get('/channel-menu', 'ChannelController@menu');

// 获取某频道信息
$app->get('/channel-detail/{channel_id}', 'ChannelController@detail');

// 创建新闻
$app->post('/news', 'NewsController@create');

// 获取新闻
$app->get('/news/{news_id}', 'NewsController@detail');