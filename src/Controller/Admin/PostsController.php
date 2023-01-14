<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

class PostsController extends AppController
{
    public function index()
    {
        $post = $this->Posts->find()
            ->select([
                'id' => 'posts.id',
                'title' => 'posts.p_title',
                'type' => 'p.pt_name',
                'status' => 'posts.p_status',
                'detail' => 'posts.p_detail',
                'user' => 's.name',
                'date' => 'posts.p_created_at',
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
                'd.cover' => 1,
                'd.status' => 1
            ])
            ->order(['posts.id' => 'DESC'])
            ->group('id,title');

        $this->set(compact('post'));
    }

    public function view($id = null)
    {
        $posts = $this->Posts->find()
            ->select([
                'id' => 'posts.id',
                'title' => 'posts.p_title',
                'type' => 'p.pt_name',
                'detail' => 'posts.p_detail',
                'status' => 'posts.p_status',
                'user' => 's.name',
                'date' => 'posts.p_created_at',
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
                'posts.id =' => $id

            ])
            ->group('id,title,image')
            ->toArray();

        $this->set(compact('posts'));
    }

    public function add()
    {
        $ImageTable = TableRegistry::getTableLocator()->get('Image');
        $PostsTable = TableRegistry::getTableLocator()->get('Posts');
        $session = $this->request->getSession();
        $Userid =  $session->read('userlogin.id');

        $this->set('PostsType',  $PostsType =  $this->Custom->getPostsType());

        $PostsData = $this->Posts->newEmptyEntity();

        if ($this->request->is("post")) {
            $data = $this->request->getData();
            $PostsData = $PostsTable->patchEntity($PostsData, array(
                "p_title" => $this->request->getData('p_title'),
                "p_detail" => $this->request->getData('p_detail'),
                "p_type_id" => $this->request->getData('p_type_id'),
                "p_date" => $this->request->getData('p_date'),
                "p_user_id" => $Userid,
                "p_views" => 0,
                "p_status" => $this->request->getData('p_status'),
            ));
            if ($PostsTable->save($PostsData)) {
                $Postsid = $PostsData->id;
                $PostsImage = $this->request->getData("images");
                if (!empty($PostsImage)) {
                    if (count($PostsImage)) {
                        foreach ($PostsImage as $key => $imageFile) {
                            $fileName = $PostsImage[$key]->getClientFilename();
                            $fileType = $PostsImage[$key]->getClientMediaType();
                            if ($fileType == "image/webp" || $fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                                $imagePath = WWW_ROOT . "img/posts/" . DS . $fileName;
                                $PostsImage[$key]->moveTo($imagePath);
                                $data["name"] = "img/posts/" . $fileName;
                                $imageData = $ImageTable->newEmptyEntity();
                                $imageData = $ImageTable->patchEntity($imageData, array(
                                    "post_id" => $Postsid,
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
                $this->CoverImage($Postsid, $this->request->getData("imagecover"));
            } else {
                $this->Flash->error(__('ไม่สามารถบันทึกได้'));
            };
        }

        $this->set(compact("PostsData"));
    }

    public function CoverImage($id = null, $filename = null)
    {
        $ImageTable = TableRegistry::getTableLocator()->get('Image');
        $imageData = $ImageTable->newEmptyEntity();
        $imagecover = $filename;
        $fileName = $imagecover->getClientFilename();
        $fileType = $imagecover->getClientMediaType();
        if ($fileType == "image/webp" || $fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
            $imagePath = WWW_ROOT . "img/posts/" . DS . $fileName;
            $imagecover->moveTo($imagePath);
            $coverimage = "img/posts/" . $fileName;
            $imageData = $ImageTable->newEmptyEntity();
            $imageData = $ImageTable->patchEntity($imageData, array(
                "post_id" => $id,
                "name" => $coverimage,
                "cover" => 1,
                "status" => 1,
            ));
            $ImageTable->save($imageData);
        }

        $this->Flash->success(__('บันทึกเรียบร้อย'));
        return $this->redirect(['controller' => 'Posts', 'action' => 'index']);
    }


    public function edit($id = null)
    {

        $this->set('PostsType',  $PostsType =  $this->Custom->getPostsType());

        $Posts = $this->Posts->get($id, array([
            'contain' => []
        ]));

        $coverimage = [];
        $images = [];
        $postsData  = $this->Posts->find()
            ->select([
                'id' => 'd.id',
                'name' => 'd.name',
                'cover' => 'd.cover',
            ])
            ->from([
                'posts'
            ])
            ->join([
                'd' => [
                    'table' => 'image',
                    'type' => 'INNER',
                    'conditions' => 'd.post_id = posts.id',
                ]
            ])
            ->where([
                'd.post_id' => $id
            ])
            ->toArray();

        $imgID = [];
        $img = [];
        $coverImg = [];
        $postsEdit = [];
        foreach ($postsData as  $data) {

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
        $postsEdit = [
            'id' => $imgID,
            'img' => $img,
            'cover' =>  $coverImg,
        ];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $Posts = $this->Posts->patchEntity($Posts, $this->request->getData());


            if ($this->Posts->save($Posts)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }


        $this->set(compact('Posts', 'postsEdit', 'coverimage', 'images'));
    }



    public function getPostsImg()
    {

        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->getData('id');

        $postsData  = $this->Posts->find()
            ->select([
                'id' => 'd.id',
                'name' => 'd.name',
                'cover' => 'd.cover',
            ])
            ->from([
                'posts'
            ])
            ->join([
                'd' => [
                    'table' => 'image',
                    'type' => 'INNER',
                    'conditions' => 'd.post_id = posts.id',
                ]
            ])
            ->where([
                'd.post_id' => $id
            ])
            ->toArray();

        $imgID = [];
        $img = [];
        $coverImg = [];
        $postsEdit = [];
        foreach ($postsData as  $data) {
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
        $postsEdit = [
            'id' => $imgID,
            'img' => $img,
            'cover' =>  $coverImg,
        ];
        echo json_encode($postsEdit);
        die;
    }

    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);
        $id = $this->request->getData('id');
        $posts = $this->Posts->get($id);
        if ($this->Posts->delete($posts)) {
            $this->Flash->success(__('The posts has been deleted.'));
        } else {
            $this->Flash->error(__('The posts could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
