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
    	$user = User::where('token', '89e838b6723a9c6ece25')->first();
    	$channels_id = explode(",", $user->channels_id);
    	$channels = Channel::whereIn('id', $channels_id)->get();
    	return response()->json(["channel_menu"=>$channels]);
    }

    /*
     * 获取 channel 列表信息
     */
    public function detail($channel_id) {
    	$channel = Channel::where('id', $channel_id)->first();
    	$ret = [
    		'channel' => [
    			'id' => $channel->id,
    			'name' => $channel->name,
    			'region' => $channel->region,
    			'bannel' => $channel->id,
    			'id' => $channel->id,
    		]
    	];
    	return response()->json(["channel_menu"=>$channels]);
    }
}