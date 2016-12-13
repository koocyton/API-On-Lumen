<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ManagerOperation extends Model
{
	/**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'manager-operation';

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
    	'manager_id', 
    	'manager_name',
    	'request_method',
    	'request_uri',
    	'post_data',
    	'created_at'
    ];
}