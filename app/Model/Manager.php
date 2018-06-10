<?php

namespace App\Model;

class Manager extends BaseModel
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'manager';

    /**
     * 与模型关联的数据字段
     *
     * @var array
     */
    protected $fillable = [
        'id', 'account', 'username', 'password', 'token', 'token_secret',
        'deleted_at', 'created_at', 'updated_at', 'groupings', 'privileges'
    ];

    protected $hiddens = [
      'password', 'token', 'token_secret','deleted_at', 'created_at', 'updated_at', 'groupings', 'privileges'
    ];
}
