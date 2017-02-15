<?php
namespace App\Http\Controllers;

use App\Helper\PagingHelper;
use App\Helper\SecurityHelper;
use App\Http\Controllers\Controller as BaseController;
use App\Model\Grouping;
use App\Model\Manager;
use App\Model\OperationRecord;
use Illuminate\Http\Request;

class ManagerController extends BaseController
{
    /*
     * 管理员列表
     */
    public function getList()
    {
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
        // 列出 Grouping
        $groupings = implode(",", Grouping::getNames());
        return $this->display('manager_apply', ['groupings' => $groupings]);
    }

    /*
     * 新增管理员
     */
    public function create(Request $request)
    {
        // 新权限组的数据
        $manager_data = [
            'account' => $request->input("account"),
            'username' => $request->input("username"),
            'password' => md5(sprintf(env("APP_ENCRYPT_SALT"), $request->input("_password"))),
            'groupings' => $request->input("groupings"),
            'created_at' => NOW_TIME,
            'updated_at' => NOW_TIME,
            'deleted_at' => null,
        ];
        Manager::create($manager_data);
        // 刷新页面
        return response('<script>$("#popup-modal").modal("hide");$(window).trigger("popstate");</script>');
    }

    /*
     * 管理员详细信息
     */
    public function detail($id)
    {
        // 管理员列表
        $manager = Manager::withTrashed()->where(['id' => $id])->first();
        // 列出 Grouping
        $groupings = implode(",", Grouping::getNames());
        // 列出 Grouping
        $manager->groupings = implode(",", array_intersect(Grouping::getNames(), explode(",", $manager->groupings)));
        // 返回 view
        return $this->display('manager_detail', ['manager' => $manager, 'groupings' => $groupings]);
    }

    /*
     * 保存管理员详细信息
     */
    public function update(Request $request, $id)
    {
        // 管理员信息
        $manager = Manager::withTrashed()->where(['id' => $id])->first();
        // 用户名
        $manager->username = $request->input("username");
        // 组
        $manager->groupings = $request->input("groupings");
        // 更新密码
        if (!empty($request->input("password"))) {
            $manager->password = md5(sprintf(env("APP_ENCRYPT_SALT"), $request->input("password")));
        }
        // 更新 token
        if (!empty($request->input("re_token")) || !empty($request->input("password"))) {
            $manager->token = SecurityHelper::randomBytes(SecurityHelper::TOKEN_LENGTH);
            $manager->token_secret = SecurityHelper::randomBytes(SecurityHelper::SECURITY_LENGTH);
        }
        // 更新状态
        $manager->deleted_at = empty($request->input("status")) ? null : NOW_TIME;

        // 测试时不调整 test 用户的密码和状态
        if ($request->input("account") == "test@test.com") {
            $manager->password = "test@test.com";
            $manager->deleted_at = null;
        }

        // 保存
        $manager->save();
        // 刷新页面
        return response('<script>$("#popup-modal").modal("hide");$(window).trigger("popstate");</script>');
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
