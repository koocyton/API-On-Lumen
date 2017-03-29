<?php

namespace App\Model;

class Manager extends AppModel
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
        'id',
        'account',
        'username',
        'password',
        'token',
        'token_secret',
        'deleted_at',
        'created_at',
        'updated_at',
        'groupings',
    ];

    public static function getIdNames() {
        $managers = self::withTrashed()->get();
        $id_names = [];
        foreach($managers as $manager) {
            $id_names[$manager->id] = $manager->username;
        }
        return $id_names;
    }


    public function getTagsData() {
        $managers = $this->get();
        $tags_data = "";
        foreach($managers as $manager) {
            $tags_data .= empty($tags_data) ? "" : ",";
            $tags_data .= $manager->id . ":" . $manager->username;
        }
        return $tags_data;
    }
}
