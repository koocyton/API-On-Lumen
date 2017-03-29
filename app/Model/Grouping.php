<?php

namespace App\Model;

class Grouping extends AppModel
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'grouping';

    /**
     * 与模型关联的数据字段
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'deleted_at',
        'privileges',
    ];

    /*
     *
     */
    public static function getNames($in_names = [])
    {
        $groupings = self::get();
        $names = [];
        foreach ($groupings as $grouping) {
            $names[] = $grouping->name;
        }
        return $names;
    }

    /*
     *
     */
    public static function getAllNames($in_names = [])
    {
        $groupings = self::withTrashed()->get();
        $names = [];
        foreach ($groupings as $grouping) {
            $names[] = $grouping->name;
        }
        return $names;
    }
}
