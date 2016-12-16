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

    /**
	 * 与模型关联的数据字段和注释
	 *
	 * @var array
	 */
	protected $field_info = [
		'id' => 'ID',
		'name' => '名称',
		'region' => '类型',
		'banner' => '广告条',
	];

	/**
	 * 获取字段信息
	 *
	 * @var array
	 */
    public function getFields() {
    	return $this->field_info;
    }
}