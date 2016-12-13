<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
	/**
     * 此模型的连接名称。
     *
     * @var string
     */
    protected $connection = 'api';

	/**
	 * 与模型关联的数据表
	 *
	 * @var string
	 */
	protected $table = 'info-channel';

	/**
	 * 该模型是否被自动维护时间戳
	 *
	 * @var bool
	 */
	// public $timestamps = false;

	/**
	 * 与模型关联的数据字段
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'name',
		'region'
    ];
}