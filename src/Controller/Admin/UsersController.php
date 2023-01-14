<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Mailer;


class UsersController extends AppController
{

    public function index()
    {
        $users = $this->Users->find('all', [
            'contain' => ['UsersType', 'UsersRole'],
        ])->order([
            'Users.id' => 'DESC'
        ])->toArray();

        $usersUnVerifiled = $this->Users->find('all', [
            'contain' => ['UsersType', 'UsersRole'],
        ])->where([
            'verified =' => 0
        ])->order([
            'Users.id' => 'DESC'
        ])->limit(5)->toArray();



        $this->set(compact('usersUnVerifiled', 'users'));
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


    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        $this->set(compact('user'));
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
            $user = $this->Users->patchEntity($user, $this->request->getData());
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
                $user = $this->Users->patchEntity($user, $this->request->getData());

                if ($this->Users->save($user)) {
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
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
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

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
