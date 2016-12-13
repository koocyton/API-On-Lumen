<?php

// 获取 access token
$app->post('/access-token', 'UserController@accessToken');

// 获取频道菜单
$app->post('/channel-menu', 'ChannelController@menu');