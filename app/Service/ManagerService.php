<?php
namespace App\Service;

use App\Model\Manager;

class ManagerService
{
  /**
   * @return mixed Array()
   */
  public function getManagers() {
    return Manager::withTrashed()->get();
  }
}
