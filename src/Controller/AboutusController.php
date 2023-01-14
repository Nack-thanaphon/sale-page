<?php


declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;

class AboutusController extends AppController
{
  public function index()
  {
  }
  public function ourcustomer()
  {
  }

  public function ourbranch()
  {

    $Branchtable = TableRegistry::getTableLocator()->get('Branch');
    $BranchData = $Branchtable->find('all')
      ->order(['id' => 'DESC']);
    $Branch1 = [];
    $Branch2 = [];
    foreach ($BranchData as $data) {
      $Branch1[] = array(
        "id" => $data->id,
        "name" => $data->b_name,
        "link" => $data->b_link,
        "map" => $data->b_map,
        "phone" => $data->b_phone,
        "province" => $data->b_province,
      );
    }
    $this->viewBuilder()->setOption('serialize', true);

    $this->set(compact('Branch1'));
  }


  public function aboutus()
  {
  }
}
