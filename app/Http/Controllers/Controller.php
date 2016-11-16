<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Lang;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
	protected $locale = "cn";
	
    // 構造函數
    public function __construct(Request $request) {
		// 设置本地语言
		$this->setLocale($request);
	}
    
    // 设置本地语言
    protected function setLocale(Request $request)
    {
        // 从 Cookie 获取本地化设置
        if (!empty($request->cookie('locale'))) {
            $this->locale = $request->cookie('locale');
        }
        // 从 Get 获取本地化设置
        if (!empty($_GET["locale"])) {
            $this->locale = $_GET["locale"];
        }
        // 修正
        $this->locale = in_array($this->locale, ["en", "jp", "kr", "tw" , "cn"]) ? $this->locale : "cn" ;
        // Lang::setLocale($this->locale);
    }
}
