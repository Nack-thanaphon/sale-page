<?php

namespace App\Controller\Admin;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use DateTime;
use Cake\ORM\TableRegistry;

class AppController extends Controller
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Custom');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
    }
    // in src/Controller/AppController.php
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions([]);
        $this->viewBuilder()->setLayout('dashboard');


        $result = $this->Authentication->getResult()->getData();
        if (!empty($result)) {
            if ($result['user_type_id'] == 1 || $result['user_type_id'] == 2 || $result['user_type_id'] == 3) {
                $token = $result['token'];
                $userData =  $this->Custom->GetUserData($token);
                $this->set('userData', $userData);
            } else {
                return $this->redirect([
                    'prefix' => false,
                    'controller' => 'users',
                    'action' => 'login',
                ]);
            }
        }
    }

    public function getUsersId()
    {
        $session = $this->request->getSession();
        $userloginsession =  $session->read('userlogin');
        return $userloginsession['id'];
    }
    public function sendLineNotify($message = "แจ้งเตือนรายการสั่งซื้อ")
    {
        $token =  $this->Custom->GetContactData()->linetoken;  // ใส่ Token ที่สร้างไว้

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "message=" . $message);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $token . '',);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);

        // if (curl_error($ch)) {
        //     echo 'error:' . curl_error($ch);
        // } else {
        //     $res = json_decode($result, true);
        //     echo "status : " . $res['status'];
        //     echo "message : " . $res['message'];
        // }
        // curl_close($ch);
    }
    public function getDateEndInt($getDateEnd)
    {
        $today = strtotime(date("Y-m-d h:i:sa"));
        $str_end = strtotime($getDateEnd); // ทำวันที่ให้อยู่ในรูปแบบ timestamp

        $nseconds = $str_end - $today; // วันที่ระหว่างเริ่มและสิ้นสุดมาลบกัน
        $ndays = round($nseconds / 86400); // หนึ่งวันมี 86400 วินาที
        // $ndays = round($ndays / 3);
        return $ndays;
    }

    public function getDateEndStr($getDateEnd)
    {
        $today = strtotime(date("Y-m-d h:i:sa"));
        $str_end = strtotime($getDateEnd); // ทำวันที่ให้อยู่ในรูปแบบ timestamp
        $nseconds = $str_end - $today; // วันที่ระหว่างเริ่มและสิ้นสุดมาลบกัน
        $ndays = round($nseconds / 86400); // หนึ่งวันมี 86400 วินาที

        $Exprired = '';
        if ($ndays <= 0) {
            $Exprired = 'หมดอายุการใช้งาน';
        } else {
            $Exprired = 'กำลังใช้งาน';
        }
        return $Exprired;
    }

    // format Y/m/d H:i:s
    public function DateFormat($date)
    {
        $dateData = strtr($date, '/', '-');
        $newDate = date("Y-m-d", strtotime($dateData));

        return  $newDate;
    }



    public function getDataImg($Imgcolumn = NULL, $id = NULL)
    {
        $table = TableRegistry::getTableLocator()->get('Image');

        $ImgData  = $table->find()
            ->select([
                'id' => 'Image.id',
                'name' => 'Image.name',
                'cover' => 'Image.cover',
            ])
            ->where([
                'Image.' . $Imgcolumn . '' => $id
            ])
            ->toArray();


        $img = [];
        $coverImg = [];
        $ImgAll = [];
        $ImgDataResponse = [];

        foreach ($ImgData as  $data) {

            $ImgAll[] =  [
                'id' => $data['id'],
                'name' => $data['name']
            ];

            if ($data['cover'] == 1) {
                $coverImg[] =  [
                    'id' => $data['id'],
                    'name' => $data['name']
                ];
            }
            if ($data['cover'] == 0) {
                $img[] = [
                    'id' => $data['id'],
                    'name' => $data['name']
                ];
            }
        }

        $ImgDataResponse[] = [
            'img' => $img,
            'cover' =>  $coverImg,
            'all' => $ImgAll,
        ];


        return $ImgDataResponse;
    }
}
