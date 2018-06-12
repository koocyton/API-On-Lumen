<?php
namespace App\Define;

class ErrorCode
{
  // 操作成功
  const SUCCESS = 0;

  // 获取不到指定的 对象 ，页面，ID ，缓存信息 等等
  const NOT_FOUND= 404;

  // 系统的错误
  const SYSTEM_CRASH = 500;

  // 执行错误 <前端可显示>
  const EXECUTE_ERROR = 501;
}