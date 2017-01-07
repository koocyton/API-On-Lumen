<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Model\Icons;

/*
 * 杂项
 */
class SundryController extends BaseController
{
    /*
     * github iconvs
     */
    public function icons()
    {
        // 获取 Icons
        $icons = Icons::get();
        // 返回 view
        return $this->display('sundry_icons', ["icons" => $icons]);
    }
}
