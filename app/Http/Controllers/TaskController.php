<?php
namespace App\Http\Controllers;

use App\Helper\PagingHelper;
use App\Http\Controllers\Controller as BaseController;
use App\Model\Task;
use Illuminate\Http\Request;

class TaskController extends BaseController
{
    /*
     * 任务列表
     */
    function list() {
        // 分页信息
        $paging = new PagingHelper(Task::count());
        // 任务列表
        $tasks = Task::skip($paging->current - 1)->take($paging->limit)->orderBy('id', 'desc')->get();
        // 返回 view
        return $this->display('task_list', ['tasks' => $tasks, 'paging' => $paging]);
    }

    /*
     * 新任务表单
     */
    public function apply()
    {
        // 返回 view
        return $this->display('task_apply');
    }

    /*
     * 保存新任务
     */
    public function create(Request $request)
    {
        print_r($request->input());
        // $task = [];
        // Task::create($task);
    }

    /*
     * 查看编辑任务
     */
    public function view($id)
    {
        $task = Task::where("id", $id)->first();
        // 返回 view
        return $this->display('task_view', ['task' => $task]);
    }

    /*
     * 保存任务修改
     */
    public function update(Request $request)
    {
    }
}
