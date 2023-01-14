<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;
use Cake\Http\Cookie\CookieCollection;
use Cake\Http\Cookie\Cookie;
use DateTime;

class AppController extends Controller
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Custom');
        $this->loadComponent('Flash');
        $this->loadComponent('Cookies');
        $this->loadComponent('Authentication.Authentication');

        $result = $this->Authentication->getResult()->getData() ?? "";
        if (!empty($result)) {
            $token = $result['token'] ?? "";
            $userData =  $this->Custom->GetUserData($token);
            $this->set('userData', $userData);
        }
        $contactData = $this->Custom->GetContactData();
        
        $this->set('contactData',$contactData);
    }
    // in src/Controller/AppController.php
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions([
            'index',
            'add',
            'view',
            'register',
            'resetpassword',
            'verification',
            'forgetpassword',
            'product',
            'branch',
            'posts',
            'ourcustomer',
            'ourbranch',
            'aboutus',
            'sendLineNotify2'
        ]);
    }


    // public function CartNeedLogin($cart_Id = null,)
    // {

    //     if (!empty($cartId)) {
    //         $cookies = (new Cookie('remember_me'))
    //             ->withValue([
    //                 'cart_id' => $cart_Id,
    //                 'Date' => new DateTime('+1 year'),
    //             ])
    //             ->withExpiry(new DateTime('+1 year'))
    //             ->withPath('/')
    //             ->withDomain('example.com')
    //             ->withSecure(false)
    //             ->withHttpOnly(true);
    //         $cookie = new CookieCollection([$cookies]);
    //         $this->response->withCookieCollection($cookie);

    //         $cookie->has('remember_me');
    //         // Get the number of cookies in the collection

    //         // Get a cookie instance
    //         return  count($cookie['']);;
    //     }
    // }

    public function GetUserDataSesion()
    {
        $session = $this->request->getSession();
        $Userdata =  $session->read('userlogin');
        return $Userdata;
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
}
