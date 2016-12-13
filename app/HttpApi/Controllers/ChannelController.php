<?php
namespace App\HttpApi\Controllers;

use Illuminate\Http\Request;
use App\HttpApi\Controllers\ApiController;
use App\Helper\SecurityHelper;

class ChannelController extends ApiController
{
    /*
     * 获取 channel menu
     */
    public function channelMenu(Request $request) {
    	$user = User::where(['id'=>$user->id])->first();
    }
}