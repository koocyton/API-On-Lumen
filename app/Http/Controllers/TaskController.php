<?php
namespace App\Http\Controllers;

use App\Helper\PagingHelper;
use App\Http\Controllers\Controller as BaseController;
use App\Model\Task;
use App\Model\TaskFollow;
use App\Model\Manager;
use Illuminate\Http\Request;

class TaskController extends BaseController
{
    /*
     * 任务列表
     */
    public function getList()
    {
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
        // 获取列表 id:name,id1:name1,id2:name2...
        $manager_tags_data = Manager::status()->getTagsData();
        // 返回 view
        return $this->display('task_apply', ["manager_tags_data"=>$manager_tags_data]);
    }

    /*
     * 保存新任务
     */
    public function create(Request $request)
    {
        $task_data = [
            'title' => $request->input("title"),
            'category' => $request->input("category"),
            'author' => $this->login_user_id,
            'owner' => $request->input("owner"),
            'description' => $request->input("description"),
            'status' => 'process',
            'tags' => $request->input("tags"),
            'created_at' => NOW_TIME,
            'updated_at' => NOW_TIME,
            'deleted_at' => null,
        ];
        Task::create($task_data);
        // 刷新页面
        return $this->flushPage();
    }

    /*
     * 查看编辑任务
     */
    public function detail($id)
    {
        // 任务详细
        $task = Task::find($id);
        // 任务列表
        $task_follows = TaskFollow::where(["task_id"=>$id])->orderBy('id', 'asc')->get();
        // 管理员列表
        $managers = Manager::getIdNames();
        // 获取列表 id:name,id1:name1,id2:name2...
        $manager_tags_data = Manager::status()->getTagsData();
        // 返回 view
        return $this->display('task_detail', ['task' => $task, 'task_follows' => $task_follows, 'managers' => $managers, 'manager_tags_data' => $manager_tags_data]);
    }

    /*
     * 保存任务修改
     */
    public function update(Request $request, $id)
    {
        // 更新任务状态
        $task = Task::find($id);
        $task->status = $request->input("status");
        $task->owner = $request->input("owner");
        $task->updated_at = NOW_TIME;
        $task->save();

        // 插入 follow
        $follow_data = [
            'task_id' => $id,
            'title' => $request->input("title"),
            'author' => $this->login_user_id,
            'description' => $request->input("description"),
            'created_at' => NOW_TIME,
            'updated_at' => NOW_TIME,
            'deleted_at' => null,
        ];
        TaskFollow::create($follow_data);

        // 刷新页面
        return $this->flushPage();
    }
}
