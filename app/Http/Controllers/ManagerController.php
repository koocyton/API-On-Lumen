<?php
namespace App\Http\Controllers;

use App\Helper\PagingHelper;
use App\Http\Controllers\Controller as BaseController;
use App\Model\Manager;
use App\Model\OperationRecord;

class ManagerController extends BaseController
{
    /*
     * 管理员列表
     */
    function list() {
        // 分页信息
        $paging = new PagingHelper(Manager::withTrashed()->count());
        // 管理员列表
        $managers = Manager::withTrashed()->skip($paging->current - 1)->take($paging->limit)->orderBy('id', 'desc')->get();
        // 返回 view
        return $this->display('manager_list', ['managers' => $managers, 'paging' => $paging]);
    }

    /*
     * 新增管理员申请
     */
    public function apply()
    {
        return $this->display('manager_apply');
    }

    /*
     * 管理员详细信息
     */
    public function detail($id)
    {
        // 管理员列表
        $manager = Manager::withTrashed()->where(['id' => $id])->first();
        // 返回 view
        return $this->display('manager_detail', ['manager' => $manager]);
    }

    /*
     * 打开或关闭管理员
     */
    function switch ($id) {
            // 管理员列表
            $manager = Manager::withTrashed()->where(['id' => $id])->first();
            // 打开或关闭
            $deleted_at = empty($manager->deleted_at) ? time() : null;
            // 更新
            Manager::withTrashed()->where(['id' => $id])->update(['deleted_at' => $deleted_at]);
            // 刷新页面
            return response('<script>$(window).trigger("popstate");</script>');
    }

    /*
     * 管理员操作日志
     */
    public function operationList()
    {
        // 分页信息
        $paging = new PagingHelper(OperationRecord::count());
        // 管理员操作的日志列表
        $operations = OperationRecord::skip($paging->current - 1)->take($paging->limit)->orderBy('id', 'desc')->get();
        // 返回 view
        return $this->display('operation_list', ['operations' => $operations, 'paging' => $paging]);
    }
}
