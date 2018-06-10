<?php

$router->get('/', function () use ($router) {
  return redirect("/login");
});


$router->get('/login', ['uses' => 'LoginController@index']);
$router->post('/login', ['uses' => 'LoginController@login']);
$router->get('/logout', ['uses' => 'LoginController@logout']);


// $router->get('/logout', ['middleware' => 'auth', 'uses' => 'LoginController@index']);
