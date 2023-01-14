<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Product;
use Cake\ORM\TableRegistry;
use PHPUnit\Util\Json;

/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApiController extends AppController
{
    public function viewClasses(): array
    {
        return [JsonView::class];
    }

    public function posts()
    {
        $posttable = TableRegistry::getTableLocator()->get('Posts');

        $posts = $posttable->find()
            ->select([
                'id' => 'posts.id',
                'title' => 'posts.p_title',
                'type' => 'p.pt_name',
                'detail' => 'posts.p_detail',
                'status' => 'posts.p_status',
                'user' => 's.name',
                'date' => 'posts.p_date',
                'image' => 'd.name'
            ])
            ->from([
                'posts'
            ])
            ->join([
                'd' => [
                    'table' => 'image',
                    'type' => 'INNER',
                    'conditions' => 'd.post_id = posts.id',
                ],
                'p' => [
                    'table' => 'posts_type',
                    'type' => 'INNER',
                    'conditions' => 'p.pt_id = posts.p_type_id',
                ],
                's' => [
                    'table' => 'users',
                    'type' => 'INNER',
                    'conditions' => 's.id = posts.p_user_id',
                ],
            ])
            ->where([
                'd.cover =' => 1,
                'posts.p_status =' => 1

            ])->order([
                'posts.id' => 'DESC'
            ])->toArray();


        echo json_encode($posts);
        die;
    }
    public function product()
    {
        $productTable = TableRegistry::getTableLocator()->get('Products');
        $Products = $productTable->find()
            ->select([
                'id' => 'products.p_id',
                'title' => 'products.p_title',
                'type' => 'p.pt_name',
                'type_id' => 'p.p_id',
                'price' => 'products.p_price',
                'total' => 'products.p_total',
                'status' => 'products.status',
                'user' => 's.name',
                'date' => 'products.p_created_at',
                'image' => 'd.name',
                'imageId' => 'd.id'
            ])
            ->from([
                'products'
            ])
            ->join([
                'd' => [
                    'table' => 'image',
                    'type' => 'INNER',
                    'conditions' => 'd.product_id = products.p_id',
                ],
                'p' => [
                    'table' => 'products_type',
                    'type' => 'INNER',
                    'conditions' => 'p.p_id = products.p_type_id',
                ],
                's' => [
                    'table' => 'users',
                    'type' => 'INNER',
                    'conditions' => 's.id = products.p_user_id',
                ],
            ])
            ->where([
                'products.status' => 1,
                'd.cover' => 1,
                'd.status' => 1
            ])->toArray();



        echo json_encode($Products);
        die;
    }
    public function branch()
    {
        $BranchTable = TableRegistry::getTableLocator()->get('Branch');

        $BranchData = $BranchTable->find('all')
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

        echo json_encode($Branch1);
        die;
    }
}
