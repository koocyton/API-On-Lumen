<?php

namespace App\Model;

class Task extends AppModel
{
	/**
	 * 与模型关联的数据表
	 *
	 * @var string
	 */
	protected $table = 'task';

	/**
	 * 与模型关联的数据字段
	 *
	 * @var array
	 */
	protected $fillable = [
		'id',
		'title',
		'category',
		'author',
		'owner',
		'subscribers',
		'description',
		'status',
		'tags',
		'created_at',
		'updated_at',
		'deleted_at',
	];
}
