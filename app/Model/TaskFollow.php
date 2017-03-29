<?php

namespace App\Model;

class TaskFollow extends AppModel
{
        /**
         * 与模型关联的数据表
         *
         * @var string
         */
        protected $table = 'task-follow';

        /**
         * 与模型关联的数据字段
         *
         * @var array
         */
        protected $fillable = [
                'id',
                'task_id',
                'title',
                'author',
                'description',
                'created_at',
                'updated_at',
                'deleted_at',
        ];
}