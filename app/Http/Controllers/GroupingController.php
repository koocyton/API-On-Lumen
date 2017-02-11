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
     * 新增分组申请
     */
    public function apply()
    {
        return $this->display('grouping_apply');
    }

    /*
     * 保存新分组
     */
    public function create(Request $request)
    {
        $task_data = [
            'name' => $request->input("name"),
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
        // 管理员信息
        $grouping = Grouping::withTrashed()->where(['id' => $id])->first();
        $grouping->title = $request->input("title");
        $grouping->privileges = $request->input("privileges");
        $grouping->deleted_at = empty($request->input("deleted_at")) ? null : NOW_TIME;
        $grouping->save();
        // 刷新页面
        return response('<script>$("#popup-modal").modal("hide");$(window).trigger("popstate");</script>');
    }
}
