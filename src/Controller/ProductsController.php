<?php

declare(strict_types=1);

namespace App\Controller;

class ProductsController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['ProductsType'],
        ];
        $Products = $this->paginate($this->Products);
        $ProductsType = $this->Custom->getProductsType();
        $this->set(compact('Products', 'ProductsType'));
    }

    public function view($id = null, $slug = null)
    {
        // pr($id);die;
        $product = $this->Products->find()
            ->contain(['ProductsType'])
            ->where([
                'Products.p_id' => $id
            ])->first();

        $productData  = $this->Products->find()
            ->select([
                'id' => 'products.p_id',
                'imgId' => 'd.id',
                'name' => 'd.name',
                'cover' => 'd.cover',
            ])
            ->from([
                'products'
            ])
            ->join([
                'd' => [
                    'table' => 'image',
                    'type' => 'INNER',
                    'conditions' => 'd.product_id = products.p_id',
                ]
            ])
            ->where([
                'd.product_id' => $id
            ])
            ->toArray();

        $imgID = [];
        $img = [];
        $coverImg = [];
        $productEdit = [];
        foreach ($productData as  $data) {
            $imgID = $data['id'];
            if ($data['cover'] == 1) {
                $coverImg[] =  [
                    'id' => $data['imgId'],
                    'name' => $data['name']
                ];
                $img[] = [
                    'id' => $data['imgId'],
                    'name' => $data['name']
                ];
            }
            if ($data['cover'] == 0) {
                $img[] = [
                    'id' => $data['imgId'],
                    'name' => $data['name']
                ];
            }
        }
        $productEdit[] = [
            'id' => $imgID,
            'img' => $img,
            'cover' =>  $coverImg,
        ];
        // echo json_encode($productEdit);
        $this->set(compact('product', 'productEdit'));
    }
}
