<?php

namespace App\HttpApi\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

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
		// 获取用户信息
		$this->setUser();
	}

	// 分析提交的 Authorization 头信息
	private function parseAuthorization($request) {
		$auth_header = urldecode($request->header("Authorization"));
		if (preg_match('/^OAuth\s+(.*?)$/', $auth_header, $matches)) {
			if (preg_match_all('/([^,]+)="([^,]+)"/', $matches[1], $matches)) {
				foreach($matches[1] as $idx=>$key) {
					$this->authorization[$key] = $matches[2][$idx];
				}
			}
		}
	}

	// 获取用户
	private function setUser() {
		if (!empty($this->authorization) && !empty($this->authorization['oauth_token'])) {
			$oauth_token = $this->authorization['oauth_token'];
			$this->user = User::where('token', $oauth_token)->first();
		}
	}
}
