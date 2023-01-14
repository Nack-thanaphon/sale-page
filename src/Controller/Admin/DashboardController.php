<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
// import the PhpSpreadsheet Class
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DashboardController extends AppController
{

    public function index()
    {
        $countTotal =  $this->Custom->countTotal();
        $countProduct =  $this->Custom->countProduct();
        $countBranch =  $this->Custom->countBranch();
        $orderstable = TableRegistry::getTableLocator()->get('Orders');

        $ordersData = [];
        $ordersToday =  $orderstable->find()
            ->contain(['Users'])
            ->where([
                'orders_user_id is NOT' => NULL
            ])
            ->order([
                'Orders.id' => 'DESC'
            ])
            ->limit(4);
        $thaiyear = (date("Y") + 543);
        $year = (date("Y"));

        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute(
            "select 'มกราคม' as month ,sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-01%' UNION
            select 'กุมภาพันธ์' as month , sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-02%' UNION
            select 'มีนาคม' as month , sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-03%'UNION
            select 'เมษายน' as month ,sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-04%' UNION
            select 'พฤษภาคม' as month , sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-05%' UNION
            select 'มิถุนายน' as month , sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-06%'UNION
            select 'กรกฎาคม' as month ,sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-07%' UNION
            select 'สิงหาคม' as month , sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-18%' UNION
            select 'กันยายน' as month , sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-09%'UNION
            select 'ตุลาคม' as month ,sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-10%' UNION
            select 'พฤศจิกายน' as month , sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-11%' UNION
            select 'ธันวาคม' as month , sum(total_price) as amount from orders where  status = 3 AND updated_at like '%" . $year . "-12%';"
        );
        $rows = $stmt->fetchAll('assoc');
        $Graphdata = [];
        $month = [];
        $amount = [];
        $Graphdata['amount'] = [];
        $Graphdata['month'] = [];

        foreach ($rows as $key => $row) {
            if ($row['amount'] != null) {
                $Graphdata['amount'][$key] = $row['amount'];
            } else {
                $Graphdata['amount'][$key] = 0;
            }
            $Graphdata['month'][$key] = $row['month'];
        }

        $month = json_encode($Graphdata['month']);
        $amount = json_encode($Graphdata['amount']);

        $this->set(compact(
            'countProduct',
            'countBranch',
            'countTotal',
            'ordersToday',
            'thaiyear',
            'Graphdata',
            'month',
            'amount'
        ));
    }

    public function view($id = null)
    {
        $dashboard = $this->Dashboard->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('dashboard'));
    }
}
