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
	protected $table = 'channel';

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
		'region',
		'banner'
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
		'created_at' => '创建时间',
		'updated_at' => '最新更新',
		'deleted_at' => '禁用时间'
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