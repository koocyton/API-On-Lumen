<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;

class TestController extends BaseController
{

    /*
     * video-js
     */
    public function videojs()
    {
        // 返回 view
        return $this->display('test_videojs');
    }

    /*
     * vue
     */
    public function vue()
    {
        // 返回 view
        return $this->display('test_vue');
    }

    /*
     * pixi html5
     */
    public function pixi()
    {
        // 返回 view
        return $this->display('test_pixi');
    }
}
