<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\Http\Controllers\Controller as BaseController;

class ProjectController extends BaseController
{
    /*
     * 接口调试界面
     */
    public function apiDebug($key) {
        // 返回 view
        return $this->view('project_api_debug', ["key"=>$key]);
    }

    /*
     * 接口文档
     */
    public function apiDoc() {
    }
}