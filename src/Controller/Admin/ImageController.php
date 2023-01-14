<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Image Controller
 *
 * @property \App\Model\Table\ImageTable $Image
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImageController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Posts', 'Products'],
        ];
        $image = $this->paginate($this->Image);

        $this->set(compact('image'));
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $image = $this->Image->get($id, [
            'contain' => ['Posts', 'Products'],
        ]);

        $this->set(compact('image'));
    }


    public function add()
    {
        $image = $this->Image->newEmptyEntity();
        if ($this->request->is('post')) {
            $image = $this->Image->patchEntity($image, $this->request->getData());
            if ($this->Image->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $posts = $this->Image->Posts->find('list', ['limit' => 200])->all();
        $products = $this->Image->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('image', 'posts', 'products'));
    }

    public function productsCoverAdd()
    {

        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            $product_id = $this->request->getData('product_id');
            $files = $this->request->getData('files');

            $fileName = $files->getClientFilename();
            $fileType = $files->getClientMediaType();
            if ($fileType == "image/webp" || $fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                $imagePath = WWW_ROOT . "img/products/" . DS . $fileName;
                $files->moveTo($imagePath);
                $Name = "img/products/" . $fileName;
                $imageData = $this->Image->newEmptyEntity();
                $imageData->id = $id;
                $imageData->product_id = $product_id;
                $imageData = $this->Image->patchEntity($imageData, array(
                    "name" => $Name,
                    "cover" => 1,
                    "status" => 1,
                ));
                if ($this->Image->save($imageData)) {
                    $this->Flash->success(__('The image has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $posts = $this->Image->Posts->find('list', ['limit' => 200])->all();
        $products = $this->Image->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('products'));
    }

    public function productsImageAdd()
    {

        if ($this->request->is('post')) {
            $product_id = $this->request->getData('product_id');
            $files = $this->request->getData('files');
            if (count($files)) {
                foreach ($files as $key => $imageFile) {
                    $fileName = $files[$key]->getClientFilename();
                    $fileType = $files[$key]->getClientMediaType();
                    if ($fileType == "image/webp" || $fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/products/" . DS . $fileName;
                        $files[$key]->moveTo($imagePath);
                        $data["name"] = "img/products/" . $fileName;
                        $imageData = $this->Image->newEmptyEntity();
                        $imageData = $this->Image->patchEntity($imageData, array(
                            "product_id" => $product_id,
                            "name" => $data["name"],
                            "cover" => 0,
                            "status" => 1,
                        ));
                        $this->Image->save($imageData);
                    }
                }
            }
        }
        $this->set(compact('image', 'posts', 'products'));
    }

    public function postsCoverAdd()
    {

        if ($this->request->is('post')) {
            $id = $this->request->getData('id');
            $post_id = $this->request->getData('post_id');
            $files = $this->request->getData('files');

            $fileName = $files->getClientFilename();
            $fileType = $files->getClientMediaType();
            if ($fileType == "image/webp" || $fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                $imagePath = WWW_ROOT . "img/posts/" . DS . $fileName;
                $files->moveTo($imagePath);
                $Name = "img/posts/" . $fileName;
                $imageData = $this->Image->newEmptyEntity();
                $imageData->id = $id;
                $imageData->post_id = $post_id;
                $imageData = $this->Image->patchEntity($imageData, array(
                    "name" => $Name,
                    "cover" => 1,
                    "status" => 1,
                ));
                if ($this->Image->save($imageData)) {
                    $this->Flash->success(__('The image has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $this->set(compact('products'));
    }

    public function postsImageAdd()
    {

        if ($this->request->is('post')) {
            $post_id = $this->request->getData('post_id');
            $files = $this->request->getData('files');
            if (count($files)) {
                foreach ($files as $key => $imageFile) {
                    $fileName = $files[$key]->getClientFilename();
                    $fileType = $files[$key]->getClientMediaType();
                    if ($fileType == "image/webp" || $fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/posts/" . DS . $fileName;
                        $files[$key]->moveTo($imagePath);
                        $data["name"] = "img/posts/" . $fileName;
                        $imageData = $this->Image->newEmptyEntity();
                        $imageData = $this->Image->patchEntity($imageData, array(
                            "product_id" => $post_id,
                            "name" => $data["name"],
                            "cover" => 0,
                            "status" => 1,
                        ));
                        $this->Image->save($imageData);
                    }
                }
            }
        }
        $this->set(compact('image', 'posts', 'products'));
    }
    public function edit($id = null)
    {
        $image = $this->Image->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Image->patchEntity($image, $this->request->getData());
            if ($this->Image->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $posts = $this->Image->Posts->find('list', ['limit' => 200])->all();
        $products = $this->Image->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('image', 'posts', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->getData('id');
        $Image = $this->Image->get($id);

        if ($this->Image->delete($Image)) {
            $responseData = ['success' => true];
            $this->set('responseData', $responseData);
            $this->set('_serialize', ['responseData']);
            die;
        } else {
            $responseData = ['error' => false];
            $this->set('responseData', $responseData);
            $this->set('_serialize', ['responseData']);
            die;
        }

        return $this->redirect(['action' => 'index']);
    }
}
