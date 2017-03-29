<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppModel extends Model
{
    // 使用软删除
    use SoftDeletes;

    /**
     * 此模型的连接名称。
     *
     * @var string
     */
    // protected $connection = 'gmtools';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 与模型关联的数据默认字段
     *
     * @var array
     */
    const global_fillable = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /*
     * 获取状态
     */
    public static function status($status=null)
    {
        $model_name = get_called_class();
        $model = new $model_name;

        if ($status=="all") {
            return $model->withTrashed();
        }
        else if ($status=="prohibit") {
            return $model->onlyTrashed();
        }
        return $model;
    }

    /*
     * 格式化输出的 created 时间
     */
    public function getCreatedAtAttribute($value)
    {
        return empty($value) ? null : date("Y-m-d H:i:s", $value);
    }

    /*
     * 格式化输出的 updated 时间
     */
    public function getUpdatedAtAttribute($value)
    {
        return empty($value) ? null : date("Y-m-d H:i:s", $value);
    }

    /*
     * 格式化输出的 deleted 时间
     */
    public function getDeletedAtAttribute($value)
    {
        return empty($value) ? null : date("Y-m-d H:i:s", $value);
    }
}
