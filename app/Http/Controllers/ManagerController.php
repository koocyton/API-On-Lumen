<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\Http\Controllers\Controller as BaseController;

class ManagerController extends BaseController
{
    /*
     * 管理员列表
     */
    public function list(Response $response) {
        // 管理员列表
        $managers = app('db')->table('manager')->skip(1)->take(30)->get();
        // 返回 view
        return $response->setContent(view('manager_index', ['managers', $managers]));
    }
}
