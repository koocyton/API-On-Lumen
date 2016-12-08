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

    public $auth = null;
	
    // 構造函數
    public function __construct(Request $request) {
		// 设置本地语言
		$this->setLocale($request);
	}
    
    // 设置本地语言
    protected function setLocale($request)
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

        // 设置多语言
        $this->trans = app('translator');
        $this->trans->setLocale($this->locale);
    }
}
