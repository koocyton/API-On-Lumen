<?php
namespace App\HttpApi\Controllers;

use Illuminate\Http\Request;
use App\Helper\SecurityHelper;
use App\HttpApi\Controllers\ApiController;

use App\Model\Channel;
use App\Model\User;

class ChannelController extends ApiController
{
    /*
     * 获取 channel menu
     */
    public function menu() {
    	$channels_id = explode(",", $this->user->channels_id);
    	$channels = Channel::whereIn('id', $channels_id)->get();
    	return response()->json(["channel_menu"=>$channels]);
    }

    /*
     * 获取 channel 列表信息
     */
    public function detail($channel_id) {
    	$channel = Channel::where('id', $channel_id)->first();
    	return response()->json(["channel_detail"=>$channel]);
    }
}