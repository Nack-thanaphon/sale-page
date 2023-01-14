<?php

declare(strict_types=1);

namespace App\Controller\Customer;


use App\Controller\Customer\AppController;
use Cake\Mailer\Mailer;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
use Cake\Mailer\TransportFactory;
use Cake\ORM\Locator\TableLocator;

class DashboardController  extends AppController
{

    public function index()
    {
        $OrdersTable = TableRegistry::getTableLocator()->get('Orders');
        $session = $this->request->getSession();
        $cartTokensession =  $session->read('cartToken');

        $result = $this->Authentication->getResult()->getData();
        $Usertoken =  $this->GetUsertoken($result);
        $UserData =  $this->GetUserData($Usertoken);

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
    }

    public function view($token = null)
    {
        $user = $this->Users->find()
            ->where([
                'token =' => $token
            ])
            ->contain(['UsersType', 'UsersRole'])
            ->first();

        // pr($user);
        // die;
        $this->set(compact('user'));
    }

    
    public function paymentUpload()
    {
        $imageTable = TableRegistry::getTableLocator()->get('Image');
        $OrdersTable = TableRegistry::getTableLocator()->get('Orders');
        $session = $this->request->getSession();
        $session->delete('cartToken');

        if ($this->request->is('post')) {
            $paymentImg = $this->request->getData('paymentImg');
            $orders_id = $this->request->getData('orders_id');
            $orders_token = $this->request->getData('orders_token');
            $paymentImgId = $this->request->getData('paymentImgId');
            $hasFileError = $paymentImg->getError();

            $paymentImgId1 = '';
            if (!empty($paymentImgId)) {
                $paymentImgId1 = $paymentImgId;
            } else {
                $paymentImgId1 = '';
            }

            if ($hasFileError > 0) {
                $paymentImgSaveDB = '';
            } else {
                // file uploaded
                $fileName = $paymentImg->getClientFilename();
                $fileType = $paymentImg->getClientMediaType();
                $fileData = $paymentImg->getStream();

                if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                    $newfilename = $orders_token . "." . $fileType;
                    $moveto  = WWW_ROOT . "img/payment" . DS . $fileName;;
                    $paymentImg->moveTo($moveto);
                    $paymentImgSaveDB = "img/payment/" . $fileName;
                    $paymentimageData = $imageTable->newEmptyEntity();
                    $OrderStatusData = $OrdersTable->newEmptyEntity();

                    if (!empty($paymentImgId1)) {
                        $paymentimageData->id = $paymentImgId;
                        $paymentimageData = $imageTable->patchEntity($paymentimageData, array(
                            "order_id" => $orders_id,
                            "name" => $paymentImgSaveDB,
                            "cover" => 1,
                            "status" => 1,
                        ));
                        if ($imageTable->save($paymentimageData)) {
                            $OrderStatusData->id = $orders_id;
                            $OrderStatusData->status = 2;
                            $OrdersTable->save($OrderStatusData);

                            $responseData = ['success' => true];
                            $this->set('responseData', $responseData);
                            $this->set('_serialize', ['responseData']);
                        }
                        die;
                    } else {
                        $paymentimageData = $imageTable->patchEntity($paymentimageData, array(
                            "order_id" => $orders_id,
                            "name" => $paymentImgSaveDB,
                            "cover" => 1,
                            "status" => 1,
                        ));
                        if ($imageTable->save($paymentimageData)) {
                            $OrderStatusData->id = $orders_id;
                            $OrderStatusData->status = 2;
                            $OrdersTable->save($OrderStatusData);
                            $responseData = ['success' => true];
                            $this->set('responseData', $responseData);
                            $this->set('_serialize', ['responseData']);
                        }
                        die;
                    }
                }
            }
        }
    }


    public function payment($token = null)
    {
        $ProductsTable = TableRegistry::getTableLocator()->get('Products');
        $OrdersTable = TableRegistry::getTableLocator()->get('Orders');
        $ImageTable = TableRegistry::getTableLocator()->get('Image');

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
                'paymentimageId' => $PaymentDataImageId,
                'paymentimage' => $PaymentDataImageName,
                'productsimage' => $ProductsDataImage[$key]['name'],
                'price' => $itemPrice[$key],
                'Total_price' => $order[0]['total_price'],
                'status' => $order[0]['orders_code'],
                'total' => $itemCount[$key]
            ]);
        }
        $userId = $order[0]['orders_user_id'];
        $UserData =  $this->GetUserDataById($userId);
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
        // pr($OrdersData);
        // die;
        $this->set(compact('order', 'OrdersData'));
    }

    public function GetUsertoken($result = null)
    {
        if (!empty($result)) {
            $Usertoken = '';
            if (!empty($result['token'])) {
                $Usertoken = $result['token'];
            }
            return $Usertoken;
        }
    }
    public function GetUserData($token)
    {
        if (!empty($token)) {
            $usertable = TableRegistry::getTableLocator()->get('Users');
            $user = $usertable->find()
                ->select([
                    'id' => 'users.id',
                    'token' => 'users.token',
                    'email' => 'users.email',
                    'address' => 'users.address',
                    'phone' => 'users.phone',
                    'name' => 'users.name',
                    'role' => 'ur.ur_name'
                ])
                ->join([
                    'ur' => ([
                        'table' => 'users_role',
                        'type' => 'INNER',
                        'conditions' => 'ur.id = users.user_role_id'
                    ])
                ])
                ->from('users')
                ->where([
                    'users.token' => $token
                ])
                ->toArray();
            return $user;
        }
    }
    public function GetUserDataById($id)
    {
        if (!empty($id)) {
            $usertable = TableRegistry::getTableLocator()->get('Users');
            $user = $usertable->find()
                ->select([
                    'id' => 'users.id',
                    'token' => 'users.token',
                    'email' => 'users.email',
                    'address' => 'users.address',
                    'phone' => 'users.phone',
                    'name' => 'users.name',
                    'role' => 'ur.ur_name'
                ])
                ->join([
                    'ur' => ([
                        'table' => 'users_role',
                        'type' => 'INNER',
                        'conditions' => 'ur.id = users.user_role_id'
                    ])
                ])
                ->from('users')
                ->where([
                    'users.id' => $id
                ])
                ->toArray();
            return $user;
        }
    }
    public function order()
    {

        $OrdersTable = TableRegistry::getTableLocator()->get('Orders');
        $result = $this->Authentication->getResult()->getData();
        $session = $this->request->getSession();
        $cartTokensession =  $session->read('cartToken');
        // if (!empty($cartTokensession)) {
        //     return $this->redirect([
        //         'prefix' => 'Customer',
        //         'controller' => 'dashboard',
        //         'action' => 'payment',
        //         $cartTokensession
        //     ]);
        // } else {
        //     return $this->redirect([
        //         'prefix' => 'Customer',
        //         'controller' => 'dashboard',
        //         'action' => 'index',
        //     ]);
        // }
        $Usertoken =  $this->GetUsertoken($result);
        $UserData =  $this->GetUserData($Usertoken);
        // pr($Usertoken);
        // pr($UserData);
        // die;
        $UserOrders =  $OrdersTable->find()
            ->contain(['Users'])
            ->where([
                'orders_user_id IN' => $UserData[0]['id']
            ])
            ->order([
                'Orders.id' => 'DESC'
            ])
            ->limit(5);

        $this->set(compact('UserOrders', 'UserData'));
    }
  
    public function tracking()
    {
    }
    public function history()
    {
        $OrdersTable = TableRegistry::getTableLocator()->get('Orders');
        $result = $this->Authentication->getResult()->getData();
        $session = $this->request->getSession();
        $cartTokensession =  $session->read('cartToken');
        // if (!empty($cartTokensession)) {
        //     return $this->redirect([
        //         'prefix' => 'Customer',
        //         'controller' => 'dashboard',
        //         'action' => 'payment',
        //         $cartTokensession
        //     ]);
        // } else {
        //     return $this->redirect([
        //         'prefix' => 'Customer',
        //         'controller' => 'dashboard',
        //         'action' => 'index',
        //     ]);
        // }
        $Usertoken =  $this->GetUsertoken($result);
        $UserData =  $this->GetUserData($Usertoken);
        // pr($Usertoken);
        // pr($UserData);
        // die;
        $UserOrders =  $OrdersTable->find()
            ->contain(['Users'])
            ->where([
                'orders_user_id IN' => $UserData[0]['id']
            ])
            ->order([
                'Orders.id' => 'DESC'
            ])
            ->limit(5);

        $this->set(compact('UserOrders', 'UserData'));
    }
    public function address($token)
    {
        $UsersTable = TableRegistry::getTableLocator()->get('Users');
        $user =  $UsersTable->find()
            ->where([
                'token =' => $token
            ])
            ->contain(['UsersType', 'UsersRole'])
            ->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user =  $UsersTable->patchEntity($user, $this->request->getData());
            ///file
            $userimg = $this->request->getData("userimage");
            ///filetext
            $userimgText = $this->request->getData("imgold");
            //userId
            $user->id = $this->request->getData('userId');
            $hasFileError = $userimg->getError();

            if ($hasFileError > 0) {
                $data["image"] = '';
                $user->image = $userimgText;
                $user =  $UsersTable->patchEntity($user, $this->request->getData());

                if ($UsersTable->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            } else {
                // file uploaded
                $fileName = $userimg->getClientFilename();
                $fileType = $userimg->getClientMediaType();

                if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                    $imagePath = WWW_ROOT . "img/user/" . DS . $fileName;
                    $userimg->moveTo($imagePath);
                    $data["image"] = "img/user/" . $fileName;
                }
            }
            $user =  $UsersTable->patchEntity($user, $data);
            if ($UsersTable->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function forgetpassword()
    {

        $this->viewBuilder()->setlayout('frontend');

        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $usertable = TableRegistry::getTableLocator()->get('Users');
            $user = $usertable->find('all')->where(['email' => $email])->first();
            $token = $user->token;
            if ($user != null) {
                $user->password = '';
                if ($usertable->save($user)) {
                    $this->Flash->set('กรุณาเช็คในอีเมลล์ ' . $email . ' เพื่อยืนยันการเปลี่ยนรหัสผ่าน', ['element' => 'success']);

                    $mailer = new Mailer('default');
                    $mailer->setFrom(['e21bvz@gmail.com' => 'PENPEN HOUSE'])
                        ->setTo($email)
                        ->setEmailFormat('html')
                        ->setSubject('เปลี่ยนรหัสผ่านการเข้าใช้งาน PENPEN HOUSE')
                        ->setTransport('gmail')
                        ->setViewVars([
                            'name' => $user->name,
                            'verify' => $token
                        ])
                        ->viewBuilder()
                        ->setTemplate('resetpassword');

                    $mailer->deliver();
                    $htmlStatusCode = 200;
                    $response = [
                        'status' => $htmlStatusCode,
                        'message' => 'OK',
                    ];
                    $this->set(compact('response'));
                    $this->viewBuilder()->setOption('serialize', ['response']);
                    $this->setResponse($this->response->withStatus($htmlStatusCode));
                } else {
                    $this->Flash->set('เปลี่ยนรหัสผ่านไม่สำเร็จ หรือข้อมูลไม่ถูกต้อง', ['element' => 'error']);
                }
            } else {
                $this->Flash->set('ไม่มีข้อมูลในระบบ', ['element' => 'error']);
            }
        } else {
            $this->Flash->set('กรุณากรอกข้อมูลให้ถูกต้อง', ['element' => 'error']);
        }
    }

    public function edit($token = null)
    {
        $user = $this->Users->find()
            ->where([
                'token =' => $token
            ])
            ->contain(['UsersType', 'UsersRole'])
            ->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            // pr($this->request->getData());die;
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $userimg = $this->request->getData("image");
            $hasFileError = $userimg->getError();

            if ($hasFileError > 0) {
                $data["image"] = "";
            } else {
                // file uploaded
                $fileName = $userimg->getClientFilename();
                $fileType = $userimg->getClientMediaType();

                if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                    $imagePath = WWW_ROOT . "img/user/" . DS . $fileName;
                    $userimg->moveTo($imagePath);
                    $data["image"] = "img/user/" . $fileName;
                }
            }
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
}
