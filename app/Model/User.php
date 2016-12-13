<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    // 使用软删除
    use SoftDeletes;

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
		'deleted_at'
    ];
}