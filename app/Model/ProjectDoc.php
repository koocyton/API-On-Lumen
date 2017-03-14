<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectDoc extends Model
{

    /**
     * 此模型的连接名称。
     *
     * @var string
     */
    protected $connection = 'backend';

    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'project-doc';

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
        'name',
        'introduction',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    //  field format : craeted_at
    public function getCreatedAtAttribute($value)
    {
        return date("Y-m-d H:i:s", $value);
    }
}
