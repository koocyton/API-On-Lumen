<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Model\Manager;
use App\Model\ManagerOperation;

class ManagerController extends BaseController
{
    /*
     * 管理员列表
     */
    public function list() {
        // 管理员列表
        $managers = Manager::withTrashed()->skip(0)->take(30)->orderBy('id', 'desc')->get();
        // 分页信息
        $paging = [
            // 当前页的起始数
            'current' => empty($_GET['po']) ? 1 : $_GET['po'],
            // 总数 
            'total' => Manager::withTrashed()->count(), 
            // 每页显示多少条记录
            'limit' => 30
        ];
        // 返回 view
        return $this->view('manager_list', ['managers' => $managers, 'paging' => $paging]);
    }

    /*
     * 打开或关闭管理员
     */
    public function switch($id) {
        // 管理员列表
        $manager = Manager::withTrashed()->where([ 'id'=>$id ])->first();
        // 打开或关闭
        $deleted_at = empty($manager->deleted_at) ? time() : NULL;
        // 更新
        Manager::withTrashed()->where([ 'id'=>$id ])->update([ 'deleted_at'=>$deleted_at ]);
        // 刷新页面
        return response('<script>$(window).trigger("popstate");</script>');
    }

    /*
     * 管理员操作日志
     */
    public function operationList() {
        // 管理员操作的日志列表
        $operations = ManagerOperation::skip(0)->take(30)->orderBy('id', 'desc')->get();
        // 分页信息
        $paging = [
            // 当前页的起始数
            'current' => empty($_GET['po']) ? 1 : $_GET['po'],
            // 总数 
            'total' => ManagerOperation::count(), 
            // 每页显示多少条记录
            'limit' => 30
        ];
        // 返回 view
        return $this->view('operation_list', ['operations' => $operations, 'paging' => $paging]);
    }
}
