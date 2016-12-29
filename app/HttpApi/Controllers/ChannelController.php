<?php
namespace App\HttpApi\Controllers;

use App\HttpApi\Controllers\ApiController;
use App\Model\Channel;
use App\Model\User;

class ChannelController extends ApiController
{
    /*
     * 获取 channel menu
     */
    public function menu()
    {
        $channels_id = explode(",", $this->user->channels_id);
        $channels = Channel::whereIn('id', $channels_id)->get();
        return response()->json(["channel_menu" => $channels]);
    }

    /*
     * 获取 channel 列表信息
     */
    public function detail($channel_id)
    {
        // 获取频道信息
        $channel = Channel::where('id', $channel_id)->first();
        // 返回数据
        return response()->json([
            'meta' => [
                'id' => $channel->id,
                'name' => $channel->name,
            ],
            'content' => [
                [
                    'type' => 'slide',
                    'data' => [
                        ['image' => '', 'link' => ''],
                        ['image' => '', 'link' => ''],
                        ['image' => '', 'link' => ''],
                        ['image' => '', 'link' => ''],
                    ],
                ],
                [
                    'type' => 'tile',
                    'data' => [
                        ['image' => '', 'title' => '', 'summary' => '', 'link' => 'news://1'],
                        ['image' => '', 'title' => '', 'summary' => ''],
                        ['image' => '', 'title' => '', 'summary' => ''],
                        ['image' => '', 'title' => '', 'summary' => ''],
                    ],
                ],
            ],
        ]);
    }
}
