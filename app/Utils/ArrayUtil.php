<?php
/**
 * Created by IntelliJ IDEA.
 * User: henry
 * Date: 2018/4/5
 * Time: 上午9:48
 */

namespace App\Utils;


class ArrayUtil
{
  /**
   * 从一个二维数组里，拿到指定下标对应的值
   *
   * @param $field String 字段
   * @return array 返回值
   */
  public static function getMultiArrayFieldValue($multiArray, $field) {
    $result = [];
    foreach($multiArray as $array) {
      if (!empty($array[$field])) {
        $result[] = $array[$field];
      }
    }
    return $result;
  }


  // 将数组输出 js 的对象
  public static function getJsObject($data) {
    $data = json_decode(json_encode($data));
    $js = "\n";
    foreach($data as $field=>$value) {
      $js .= "                ";
      if (strlen($value)>200) {
        $js .= "\"{$field}\" : \"\",\n";
      }
      else if (is_numeric($value)) {
        $js .= "\"{$field}\" : " . $value .",\n";
      }
      else {
        $js .= "\"{$field}\" : \"" . trim(str_replace(PHP_EOL, '', addslashes($value))) ."\",\n";
      }
    }
    return $js;
  }
}