<?php

namespace App\HttpApi\Controllers;

class ApiController
{
	// 登录的用户
	public $user = null;

	// 登录的用户 id
	public $user_id = null;

	// 匿名用户
	public $anonymous = null;

	public function __construct() {
		
	}
}
