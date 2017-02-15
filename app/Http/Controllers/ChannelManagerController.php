<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Model\Channel;

/*
 * 杂项
 */
class ChannelManagerController extends BaseController
{
    // 覆盖父类 beforeFielter
    protected function beforeFilter($request)
    {
        // 如果是登录注册操作，继续
        $request_path = $request->path();
        if (preg_match("/^channel-manager\/demo/", $request_path)) {
            return true;
        }
        // 父类的方法
        return parent::beforeFilter($request);
    }

    /*
     * list All the Online Channel
     */
    public function getList()
    {

        $skip = empty($_GET['po']) ? 0 : $_GET['po'] - 1;

        // 获取数据
        $channels = Channel::withTrashed()->skip(0)->take(30)->orderBy('id', 'desc')->get();

        // 分页信息
        $paging = [
            // 当前页的起始数
            'current' => 1,
            // 总数
            'total' => Channel::withTrashed()->count(),
            // 每页显示多少条记录
            'limit' => 30,
        ];

        // 返回 view
        return $this->display('channel_manager_list', ['channels' => $channels, 'paging' => $paging]);
    }

    /*
     * 显示频道的 html5 展示
     */
    public function demo($id)
    {
        // 显示 demo
        return $this->display("channel_manager_demo", ['id' => $id]);
    }
}
