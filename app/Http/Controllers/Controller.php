<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Laravel\Lumen\Application;
use Illuminate\Http\Request;

use App\Facades\Lang;

class Controller extends BaseController
{
    protected $locale = "cn";

    public $trans = null;
	
    // 構造函數
    public function __construct(Request $request, Application $app) {
		// 设置本地语言
		$this->setLocale($request);
        // 初始化语言
        Lang::init($app->make('translator'), $this->locale);
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
    }
}
