<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Model\Channel;

/*
 * 杂项
 */
class ChannelManagerController extends BaseController
{
    /*
     * list All the Online Channel
     */
    function list() {

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
        return $this->view('channel_manager_list', ['channels' => $channels, 'paging' => $paging]);
    }

    /*
     * 显示频道的 html5 展示
     */
    public function demo()
    {
        // 显示 demo
        return $this->view("channel_manager_demo", ['channel_id' => $request->input("id")]);
    }
}
