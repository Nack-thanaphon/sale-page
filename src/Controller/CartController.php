<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Mailer\TransportFactory;
use Cake\ORM\Locator\TableLocator;


/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $cart = $this->paginate($this->Cart);

        $this->set(compact('cart'));
    }

    public function view($id = null)
    {
        $cart = $this->Cart->get($id, []);

        $detail = json_decode($cart->c_detail, true);

        $arr = [];
        foreach ($detail as $test) {
            $arr = array(
                'c_id' => $test["id"],
            );
        }
        $id1 = $arr['c_id'];

        $table = TableRegistry::getTableLocator()->get('Products');
        $product = $table->get($id1, []);

        $result = [];
        $result = array($detail, $product);


        $this->set(compact('result'));
    }




    public function add()
    {
        $carttable = TableRegistry::getTableLocator()->get('Cart');
        $ordertable = TableRegistry::getTableLocator()->get('Orders');
        $cart = $carttable->newemptyEntity();
        $orders = $ordertable->newemptyEntity();
        $session = $this->request->getSession();
        $cartTokensession =  $session->read('cartToken');


        if ($this->request->is('post')) {
            // get values here 
            $cdetail = $this->request->getData('c_detail');
            $totalprice = $this->request->getData('totalprice');
            $uniqueId = time();
            $cart->c_detail = $cdetail;
            $carttable->save($cart);
            $result = $this->Authentication->getResult()->getData();
            $Usertoken =  $this->Custom->GetUsertoken($result);
            $UserData =  $this->Custom->GetUserData($Usertoken);
            $mytoken = Security::hash(Security::randomBytes(32));

            // pr($UserData);die;
            if (!empty($UserData)) {
                $orders = $ordertable->patchEntity($orders, array(
                    "orders_code" => $uniqueId,
                    "orders_token" => $mytoken,
                    "orders_user_id" => $UserData[0]['id'],
                    "orders_detail" => $cdetail,
                    "total_price" => $totalprice,
                    "status" => 1,
                ));
                $ordertable->save($orders);
                $session->write('cartToken',$mytoken);
                $this->sendLineNotify();
                echo json_encode(array(
                    'orders_token' => $mytoken,
                    'status' => 'goto_payment',
                    'result' => 200
                ));
                die;
            } else {
                $orders = $ordertable->patchEntity($orders, array(
                    "orders_code" => $uniqueId,
                    "orders_token" => $mytoken,
                    "orders_user_id" => NULL,
                    "orders_detail" => $cdetail,
                    "total_price" => $totalprice,
                    "status" => 1,
                ));
                
                $ordertable->save($orders);
                $session->write('cartToken',$mytoken);
                $this->sendLineNotify();
                echo json_encode(array(
                    'orders_token' => $mytoken,
                    'status' => 'need_login',
                    'result' => 304
                ));
                die;
            }
        }
    }


    public function edit($id = null)
    {
        $cart = $this->Cart->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Cart->patchEntity($cart, $this->request->getData());
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $this->set(compact('cart'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Cart->get($id);
        if ($this->Cart->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function payment($token = null)
    {
        $ProductsTable = TableRegistry::getTableLocator()->get('Products');
        $OrdersTable = TableRegistry::getTableLocator()->get('Orders');

        $order = $OrdersTable->find()
            ->where([
                "Orders.orders_token =" => $token
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


        $OrdersData = [];
        foreach ($ProductsData as $key => $rowData) {
            $OrdersData[] = ([
                'id' => $order[0]['orders_code'],
                'title' => $rowData['p_title'],
                'date' => $order[0]['updated_at'],
                'image' => $rowData['p_image_id'],
                'price' => $itemPrice[$key],
                'Total_price' => array_sum($itemPrice),
                'status' => $itemPrice[$key],
                'total' => $itemCount[$key]
            ]);
        }
        $this->sendLineNotify();

        $this->set(compact('order', 'OrdersData'));
    }
}
