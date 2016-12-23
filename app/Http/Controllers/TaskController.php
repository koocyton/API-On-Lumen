<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Model\Task;

class TaskController extends BaseController
{
    /*
     * 管理员列表
     */
    function list() {
        // 管理员列表
        $tasks = Task::skip(0)->take(30)->orderBy('id', 'desc')->get();
        // 分页信息
        $paging = [
            // 当前页的起始数
            'current' => empty($_GET['po']) ? 1 : $_GET['po'],
            // 总数
            'total' => Task::count(),
            // 每页显示多少条记录
            'limit' => 30,
        ];
        // 返回 view
        return $this->view('task_list', ['tasks' => $tasks, 'paging' => $paging]);
    }
}
