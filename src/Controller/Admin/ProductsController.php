<?php
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

class ProductsController extends AppController
{
    public function index()
    {
        $products = $this->paginate(
            $this->Products->find()
                ->select([
                    'id' => 'products.p_id',
                    'title' => 'products.p_title',
                    'type' => 'p.pt_name',
                    'price' => 'products.p_price',
                    'status' => 'products.status',
                    'user' => 's.name',
                    'date' => 'products.p_created_at',
                    'image' => 'd.name'
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
                    'd.cover' => 1,
                    'd.status' => 1
                ])
                ->order(['products.p_id' => 'DESC'])
                ->group('id,title')
        );
        $this->set(compact('products'));
    }

    public function view($id = null)
    {
        $Products = $this->Products->find()
            ->select([
                'id' => 'products.p_id',
                'title' => 'products.p_title',
                'detail' => 'products.p_detail',
                'type' => 'p.pt_name',
                'price' => 'products.p_price',
                'promotions' => 't.pr_name',
                'status' => 'products.status',
                'total' => 'products.p_total',
                'user' => 's.name',
                'date' => 'products.p_created_at',
                'image' => 'd.name'
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
                't' => [
                    'table' => 'promotions',
                    'type' => 'INNER',
                    'conditions' => 't.pr_id = products.p_promotion',
                ],
                's' => [
                    'table' => 'users',
                    'type' => 'INNER',
                    'conditions' => 's.id = products.p_user_id',
                ],
            ])
            ->where([
                'products.p_id' => $id,
                'd.cover' => 1,
                'd.status' => 1
            ])
           
            ->group('id,title')->first();
        $this->set(compact('Products'));
    }

    public function add()
    {
        $ImageTable = TableRegistry::getTableLocator()->get('Image');
        $ProductsTable = TableRegistry::getTableLocator()->get('Products');
        $session = $this->request->getSession();
        $Userid =  $session->read('userlogin.id');

        $this->set('promotion', $promotion =  $this->Custom->getPromotion());
        $this->set('ProductsType',  $ProductsType =  $this->Custom->getProductType());

        $ProductsData = $this->Products->newEmptyEntity();

        if ($this->request->is("post")) {
            $data = $this->request->getData();
            $ProductsData = $ProductsTable->patchEntity($ProductsData, array(
                "p_promotion" => $this->request->getData('p_promotion'),
                "p_title" => $this->request->getData('p_title'),
                "p_detail" => $this->request->getData('p_detail'),
                "p_type_id" => $this->request->getData('p_type_id'),
                "p_total" => $this->request->getData('p_total'),
                "p_user_id" => $Userid,
                "status" => $this->request->getData('p_status'),
                "p_price" => $this->request->getData('p_price'),
            ));

            // pr($ProductsData);die;
            if ($ProductsTable->save($ProductsData)) {
                $Productsid = $ProductsData->p_id;
                $ProductsImage = $this->request->getData("images");
                if (!empty($ProductsImage)) {
                    if (count($ProductsImage)) {
                        foreach ($ProductsImage as $key => $imageFile) {
                            $fileName = $ProductsImage[$key]->getClientFilename();
                            $fileType = $ProductsImage[$key]->getClientMediaType();
                            if ($fileType == "image/webp" || $fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                                $imagePath = WWW_ROOT . "img/products/" . DS . $fileName;
                                $ProductsImage[$key]->moveTo($imagePath);
                                $data["name"] = "img/products/" . $fileName;
                                $imageData = $ImageTable->newEmptyEntity();
                                $imageData = $ImageTable->patchEntity($imageData, array(
                                    "product_id" => $Productsid,
                                    "name" => $data["name"],
                                    "cover" => 0,
                                    "status" => 1,
                                ));
                                $ImageTable->save($imageData);
                            }
                        }
                    }
                }
            }
            if (!empty($this->request->getData("imagecover"))) {
                $this->CoverImage($Productsid, $this->request->getData("imagecover"));
            } else {
                $this->Flash->error(__('ไม่สามารถบันทึกได้'));
            };
        }

        $this->set(compact("ProductsData"));
    }

    public function CoverImage($id = null, $filename = null)
    {
        $ImageTable = TableRegistry::getTableLocator()->get('Image');
        $imageData = $ImageTable->newEmptyEntity();
        $imagecover = $filename;
        $fileName = $imagecover->getClientFilename();
        $fileType = $imagecover->getClientMediaType();
        if ($fileType == "image/webp" || $fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
            $imagePath = WWW_ROOT . "img/products/" . DS . $fileName;
            $imagecover->moveTo($imagePath);
            $coverimage = "img/products/" . $fileName;
            $imageData = $ImageTable->newEmptyEntity();
            $imageData = $ImageTable->patchEntity($imageData, array(
                "product_id" => $id,
                "name" => $coverimage,
                "cover" => 1,
                "status" => 1,
            ));
            $ImageTable->save($imageData);
        }

        $this->Flash->success(__('บันทึกเรียบร้อย'));
        return $this->redirect(['controller' => 'Products', 'action' => 'index']);
    }


    public function edit($id = null)
    {
        $this->set('promotion', $promotion =  $this->Custom->getPromotion());
        $this->set('ProductsType',  $ProductsType =  $this->Custom->getProductType());

        $Products = $this->Products->get($id, array([
            'contain' => []
        ]));

        $coverimage = [];
        $images = [];
        $productData  = $this->Products->find()
            ->select([
                'id' => 'd.id',
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
        $productEdit = [
            'id' => $imgID,
            'img' => $img,
            'cover' =>  $coverImg,
        ];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $Products = $this->Products->patchEntity($Products, $this->request->getData());


            if ($this->Products->save($Products)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }


        $this->set(compact('Products', 'productEdit', 'coverimage', 'images'));
    }



    public function getProductsImg()
    {

        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->getData('id');

        $productData  = $this->Products->find()
            ->select([
                'id' => 'd.id',
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
        $productEdit = [
            'id' => $imgID,
            'img' => $img,
            'cover' =>  $coverImg,
        ];
        echo json_encode($productEdit);
        die;
    }

    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->getData('id');
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
