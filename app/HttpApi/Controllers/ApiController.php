<?php

namespace App\HttpApi\Controllers;

use Illuminate\Http\Request;

class ApiController
{
	// 登录的用户
	public $user = null;

	// 登录的用户 id
	public $user_id = null;

	// 匿名用户
	public $anonymous = null;

	// 请求的 Authorization
	public $authorization = [];

	// 构造函数
	public function __construct(Request $request) {
		// 分析 authorization 信息
		$this->parseAuthorization($request);
	}

	// 分析提交的头信息
	private function parseAuthorization($request) {
		$authorization = $request->header("Authorization");
	}
}
