<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\StringTemplateTrait;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use PharIo\Version\PreReleaseSuffix;

class customHelper extends Helper
{

    public function getOrderStatus($orderId)
    {

        $Orderstable = TableRegistry::getTableLocator()->get('Orders');
        $OdersData = $Orderstable->find()
            ->where([
                'id' => $orderId
            ])->first();

        $status = '';

        if ($OdersData->status == 0) {
            $status = '<span class="text-muted"><i class="fa-solid fa-circle-xmark text-danger"></i> ยกเลิก</span>';
        }
        if ($OdersData->status == 1) {
            $status = '<span class="text-muted"><i class="fas fa-check-circle"></i> รอการชำระเงิน</span>';
        }
        if ($OdersData->status == 2) {
            $status = '<span class="text-muted"><i class="fas fa-check-circle"></i> รอการตรวจสอบ</span>';
        }
        if ($OdersData->status == 3) {
            $status = '<span class="text-muted"><i class="fas fa-check-circle text-success"></i> ชำระเงินแล้ว</span>';
        }
        if ($OdersData->status == 4) {
            $status = '<span class="text-muted"> กำลังดำเนินการ</span>';
        }
        if ($OdersData->status == 5) {
            $status = '<span class="text-success"><i class="fas fa-check-circle"></i> จัดส่งแล้ว</span>';
        }

        echo $status;
    }
    public function countBalance()
    {
        $table = TableRegistry::getTableLocator()->get('Orders');
        $countBalance = $table->find('all', [
            "contain" => ['Users']
        ])->toArray();
        return $countBalance;
    }

    public function countSuccessOrder()
    {
        $table = TableRegistry::getTableLocator()->get('Orders');
        $countBalance = $table->find()
            ->where([
                'status IN' => [3,5]
            ])
            ->count();
        return $countBalance;
    }

    public function countTotal()
    {
        $table = TableRegistry::getTableLocator()->get('Orders');
        $countBalance = $table->find()
            ->where([
                'status IN' => [3,5]
            ])
            ->first();
        return $countBalance;
    }

    public function GetContactData()
    {
        $table = TableRegistry::getTableLocator()->get('Contact');
        $GetContactData = $table->find('all')->first();
        return $GetContactData;
    }
    
    public function countInCart()
    {
        $table = TableRegistry::getTableLocator()->get('Orders');
        $countBalance = $table->find()
            ->where([
                'status' => 1
            ])
            ->count();
        return $countBalance;
    }
    public function countOrderCancle()
    {
        $table = TableRegistry::getTableLocator()->get('Orders');
        $countBalance = $table->find()
            ->where([
                'status' => 0
            ])
            ->count();
        return $countBalance;
    }



    public function getProductsType()
    {
        $ProductsType = TableRegistry::getTableLocator()->get('ProductsType');
        $getProductsType = $ProductsType->find('all')->toArray();
        return $getProductsType;
    }
    public function countOrders()
    {
        $table = TableRegistry::getTableLocator()->get('Orders');
        $countOrders = $table->find()->limit(3)->toArray();
        return $countOrders;
    }
    public function countPost()
    {
        $table = TableRegistry::getTableLocator()->get('Posts');
        $countPost = $table->find()
            ->select([
                'title' => 'Posts.p_title',
                'posttype' => 'PostType.pt_name',
                'user' => 'Users.name',
                'userrole' => 'Role.ur_name',
                'date' => 'Posts.p_created_at',
            ])
            ->join([
                'Users' => [
                    'table' => 'users',
                    'type' => 'INNER',
                    'conditions' => 'Users.id = Posts.p_user_id',
                ],
                'PostType' => [
                    'table' => 'posts_type',
                    'type' => 'INNER',
                    'conditions' => 'PostType.pt_id = Posts.p_type_id',
                ],
                'Role' => [
                    'table' => 'users_role',
                    'type' => 'INNER',
                    'conditions' => 'Role.id = Users.user_role_id',
                ],
            ])
            ->order([
                'Posts.id' => 'DESC'
            ])->limit(3)->toArray();

        return $countPost;
    }

    public function CountBranch()
    {
        $ProductsType = TableRegistry::getTableLocator()->get('Branch');
        $getProductsType = $ProductsType->find('all')->count();
        return $getProductsType;
    }

    public function CountProducts()
    {
        $ProductsType = TableRegistry::getTableLocator()->get('Products');
        $getProductsType = $ProductsType->find('all')->count();
        return $getProductsType;
    }

    public function countProduct()
    {
        $table = TableRegistry::getTableLocator()->get('Products');
        $countProduct = $table->find()->count();
        return $countProduct;
    }

    public function countProductType()
    {
        $table = TableRegistry::getTableLocator()->get('ProductsType');
        $countProductType = $table->find()->count();
        return $countProductType;
    }

    public function countPromotion()
    {
        $table = TableRegistry::getTableLocator()->get('Promotions');
        $countPromotion = $table->find()->count();
        return $countPromotion;
    }
}
