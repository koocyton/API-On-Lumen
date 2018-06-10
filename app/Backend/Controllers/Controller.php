<?php

namespace App\Backend\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function render($templateName, $assign=[]) {
      $pos = strrpos(static::class, "\\");
      $controllerName = strtolower(substr(static::class, $pos+1, -10));
      return response(view("backend/{$controllerName}/".$templateName, $assign));
    }
}
