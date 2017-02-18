<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    // 使用软删除
    use SoftDeletes;
    
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 与模型关联的数据字段
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'account',
        'password',
        'token',
        'token_secret',
        'is_action',
        'created_at',
        'updated_at',
        'channels_id',
        'deleted_at',
    ];

    /**
     * 获取字段信息
     *
     * @var array
     */
    public function getFields()
    {
        return [
            'id' => 'ID',
            'account' => '账号',
            'token' => 'token',
            'created_at' => '创建时间',
            'updated_at' => '最新更新',
            'deleted_at' => '禁用时间',
        ];
    }

    public function getCreatedAtAttribute($value)
    {
        return date("Y-m-d H:i:s", $value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return date("Y-m-d H:i:s", $value);
    }
}
