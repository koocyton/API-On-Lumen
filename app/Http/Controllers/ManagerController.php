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
        $paging = [ 'current'=>empty($_GET['po']) ? 1 : $_GET['po'], 'total'=>3000, 'limit'=>30 ];
        // 返回 view
        return $this->view('manager_list', ['managers' => $managers, 'paging' => $paging]);
    }
}
