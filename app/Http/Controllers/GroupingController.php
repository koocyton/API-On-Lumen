<?php
namespace App\Http\Controllers;

use App\Helper\PagingHelper;
use App\Http\Controllers\Controller as BaseController;
use App\Model\Grouping;
use Illuminate\Http\Request;

class GroupingController extends BaseController
{
    /*
     * 管理员列表
     */
    function list() {
        // 分页信息
        $paging = new PagingHelper(Grouping::withTrashed()->count());
        // 管理员列表
        $groupings = Grouping::withTrashed()->skip($paging->current - 1)->take($paging->limit)->orderBy('id', 'desc')->get();
        // 返回 view
        return $this->display('grouping_list', ['groupings' => $groupings, 'paging' => $paging]);
    }

    /*
     * 保存新分组
     */
    public function create(Request $request)
    {
        // 新权限组的数据
        $task_data = [
            'name' => '新权限组#' . mt_rand(11111, 99999),
            'privileges' => "",
            'deleted_at' => null,
        ];
        Grouping::create($task_data);
        // 刷新页面
        return response('<script>$("#popup-modal").modal("hide");$(window).trigger("popstate");</script>');
    }

    /*
     * 分组详细信息
     */
    public function detail($id)
    {
        // 管理员列表
        $grouping = Grouping::withTrashed()->where(['id' => $id])->first();
        // 返回 view
        return $this->display('grouping_detail', ['grouping' => $grouping]);
    }

    /*
     * 保存管理员详细信息
     */
    public function update(Request $request, $id)
    {
        // 获取权限
        $privileges = "";
        if (!empty($request->input("privilege")) && count($request->input("privilege")) > 0) {
            $privileges = implode(",", array_filter($request->input("privilege")));
        }
        // 管理员信息
        $grouping = Grouping::withTrashed()->where(['id' => $id])->first();
        $grouping->deleted_at = empty($request->input("status")) ? null : NOW_TIME;
        if (preg_match("/#\d{5}$/", $grouping->name)) {
            $grouping->name = $request->input("name");
            $grouping->deleted_at = NOW_TIME;
        }
        $grouping->privileges = $privileges;
        $grouping->save();
        // 刷新页面
        return response('<script>$("#popup-modal").modal("hide");$(window).trigger("popstate");</script>');
    }
}
