<?php
/**
 * Created by IntelliJ IDEA.
 * User: koocyton
 * Date: 2018/6/12
 * Time: 20:02
 */

namespace App\Backend\Controllers;

use App\Service\ManagerService;

class ManagerController extends Controller
{
  /**
   * @var ManagerService $managerService
   **/
  private $managerService;

  public function __construct()
  {
    $this->managerService = app(ManagerService::class);
  }

  public function index() {
    return $this->list();
  }

  public function list() {
    $managers = $this->managerService->getManagers();
    return $this->render("list", ["managers"=>$managers]);
  }
}