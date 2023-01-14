<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\Model\Entity\Branch;
use Cake\ORM\TableRegistry;

class OrdersController extends AppController
{

    public function index()
    {
        $ordersData = [];
        $ordersToday =  $this->Orders->find()
            ->contain(['Users'])
            ->where([
                'orders_user_id is NOT' => NULL
            ])
            ->order([
                'Orders.id' => 'DESC'
            ])
            ->limit(5);

        $ordersAll =  $this->Orders->find()
            ->contain(['Users'])
            ->where([
                'orders_user_id is NOT' => NULL
            ])
            ->order([
                'Orders.id' => 'DESC'
            ])->toArray();
        $this->set(compact('ordersToday', 'ordersAll'));
    }

    public function view($id = null)
    {
        $ProductsTable = TableRegistry::getTableLocator()->get('Products');
        $OrdersTable = TableRegistry::getTableLocator()->get('Orders');
        $ImageTable = TableRegistry::getTableLocator()->get('Image');

        $order = $OrdersTable->find()
            ->where([
                "Orders.id =" => $id
            ])->toArray();

        $itemDetail = json_decode($order[0]['orders_detail'], true);
        $itemId = [];
        $itemPrice = [];
        $itemCount = [];

        foreach ($itemDetail as $key => $rowData) {
            $itemId[$key] = $rowData['id'];
            $itemPrice[$key] = $rowData['price'];
            $itemCount[$key] = $rowData['count'];
        }

        $ProductsData = $ProductsTable->find('all')
            ->where([
                'Products.p_id IN' => $itemId
            ]);

        $ProductsDataImage = $ImageTable->find()
            ->where([
                'product_id IN' => $itemId,
                'cover' => 1,
                'status' => 1
            ])->order([
                'product_id' => 'ASC'
            ])
            ->toArray();

        $PaymentDataImage = $ImageTable->find()
            ->where([
                'order_id' => $order[0]['id'],
                'status' => 1
            ])->first();

        $PaymentDataImageId = 0;
        $PaymentDataImageName = '';

        if (!empty($PaymentDataImage['id'])) {
            $PaymentDataImageId = $PaymentDataImage['id'];
            $PaymentDataImageName = $PaymentDataImage['name'];
        }

        $OrdersData = [];
        foreach ($ProductsData as $key => $rowData) {
            $OrdersData[] = ([
                'id' => $order[0]['id'],
                'orders_id' => $order[0]['orders_code'],
                'orders_token' => $order[0]['orders_token'],
                'title' => $rowData['p_title'],
                'date' => $order[0]['updated_at'],
                'paymentimage' => $PaymentDataImageName,
                'productsimage' => $ProductsDataImage[$key]['name'],
                'price' => $itemPrice[$key],
                'Total_price' => $order[0]['total_price'],
                'status' => $order[0]['orders_code'],
                'total' => $itemCount[$key]
            ]);
        }
        // pr($OrdersData);
        // die;
        $userId = $order[0]['orders_user_id'];
        $UserData =  $this->Custom->GetUserDataById($userId);
        // pr($UserData);
        // die;
        if (!empty($UserData)) {
            $UserOrders =  $OrdersTable->find()
                ->contain(['Users'])
                ->where([
                    'orders_user_id IN' => $UserData[0]['id']
                ])
                ->order([
                    'Orders.id' => 'DESC'
                ])
                ->limit(5);
        } else {
            return $this->redirect([
                'prefix' => false,
                'controller' => 'users',
                'action' => 'login',
            ]);
        }

        $this->set(compact('UserOrders', 'UserData'));
        $this->set(compact('order', 'OrdersData'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('order', 'users'));
    }


    public function edit($id = null)
    {
        $ProductsTable = TableRegistry::getTableLocator()->get('Products');
        $OrdersTable = TableRegistry::getTableLocator()->get('Orders');
        $imageTable = TableRegistry::getTableLocator()->get('Image');
        $ContactTable = TableRegistry::getTableLocator()->get('Contact');




        $PaymentImg = $ContactTable->find()
            ->select([
                'img' => 'Contact.paymentimg'
            ])->first();

        $order = $this->Orders->get($id, [
            'contain' => ['Users'],
        ]);

        $itemDetail = json_decode($order['orders_detail'], true);
        $itemId = [];
        $itemPrice = [];
        $itemCount = [];

        foreach ($itemDetail as $key => $rowData) {
            $itemId[$key] = $rowData['id'];
            $itemPrice[$key] = $rowData['price'];
            $itemCount[$key] = $rowData['count'];
        }

        $ProductsData = $ProductsTable->find('all')
            ->where([
                'Products.p_id IN' => $itemId
            ]);



        $imageData = $imageTable->find()
            ->where([
                'product_id IN' => $itemId,
                'cover' => 1,
                'status' => 1
            ])->order([
                'product_id' => 'ASC'
            ])
            ->toArray();

        $PaymentDataImage = $imageTable->find()
            ->where([
                'order_id' => $order['id'],
                'status' => 1
            ])->first();

        $PaymentDataImageId = 0;
        $PaymentDataImageName = '';

        if (!empty($PaymentDataImage['id'])) {
            $PaymentDataImageId = $PaymentDataImage['id'];
            $PaymentDataImageName = $PaymentDataImage['name'];
        }
        $OrdersData = [];
        foreach ($ProductsData as $key => $rowData) {

            $OrdersData[] = ([
                'id' => $order['id'],
                'orders_code' => $order['orders_code'],
                'orders_token' => $order['orders_token'],
                'title' => $rowData['p_title'],
                'delivery_service' => $order['delivery_service'],
                'delivery_code' => $order['delivery_code'],
                'p_id' => $rowData['p_id'],
                'product_id' => $imageData[$key]['product_id'],
                'date' => $order['updated_at'],
                'status' => $order['status'],
                'paymentimage' => $PaymentDataImageName,
                'image' => $imageData[$key]['name'],
                'price' => $itemPrice[$key],
                'Total_price' => $order['total_price'],
                'total' => $itemCount[$key]
            ]);
        }
        $userId = $order['orders_user_id'];
        $UserData =  $this->Custom->GetUserDataById($userId);

        if (!empty($UserData)) {
            $UserOrders =  $OrdersTable->find()
                ->contain(['Users'])
                ->where([
                    'orders_user_id ' => $UserData[0]['id']
                ])
                ->order([
                    'Orders.id' => 'DESC'
                ])
                ->limit(5);
        } else {
            return $this->redirect([
                'prefix' => false,
                'controller' => 'users',
                'action' => 'login',
            ]);
        }

        $this->set(compact('UserOrders', 'UserData','PaymentImg'));

        // pr($OrdersData);die;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $users = $this->Orders->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('order', 'users', 'OrdersData'));
    }

    public function updateStatus()
    {
        if ($this->request->is('post')) {
            $orders_id = $this->request->getData('orders_id');
            $orders_token = $this->request->getData('orders_token');
            $status = $this->request->getData('status');
            $delivery_service = $this->request->getData('delivery_service');
            $delivery_code = $this->request->getData('delivery_code');

            if (!empty($orders_id)) {
                $OrdeStatusUpdate = $this->Orders->newEmptyEntity();
                $OrdeStatusUpdate->id = $orders_id;
                $OrdeStatusUpdate = $this->Orders->patchEntity($OrdeStatusUpdate, array(
                    'status' => $status,
                    'orders_token' => $orders_token,
                    'delivery_service' => $delivery_service,
                    'delivery_code' => $delivery_code
                ));

                // pr($OrdeStatusUpdate);die;
                $this->Orders->save($OrdeStatusUpdate);

                $responseData = ['success' => true];
                $this->set('responseData', $responseData);
                $this->set('_serialize', ['responseData']);
                die;
            }
        }
    }
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
