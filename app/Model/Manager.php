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

    public function encryptPassword($password) {
      return md5(sprintf(env("APP_ENCRYPT_SALT"), $password, $this->account));
    }
}
