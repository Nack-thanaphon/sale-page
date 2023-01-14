<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;

/**
 * Contact Controller
 *
 * @property \App\Model\Table\ContactTable $Contact
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contact = $this->paginate($this->Contact);

        $this->set(compact('contact'));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contact->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contact->patchEntity($contact, $this->request->getData());
            // pr($this->Contact->patchEntity($contact, $this->request->getData()));die;
            // pr($this->Contact->save($contact));die;
            if ($this->Contact->save($contact)) {
                $this->Flash->success(__('The contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contact could not be saved. Please, try again.'));
        }
        $this->set(compact('contact'));
    }

    public function paymentUpload()
    {

        if ($this->request->is('post')) {

            $id = $this->request->getData('paymentImgId');
            $img = $this->request->getData('paymentImg');
            $hasFileError = $img->getError();

            if ($hasFileError > 0) {
                $ImgSaveDB = '';
            } else {
                // file uploaded
                $fileName = $img->getClientFilename();
                $fileType = $img->getClientMediaType();

                if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {

                    $moveto  = WWW_ROOT . "img/" . DS . $fileName;;
                    $img->moveTo($moveto);
                    $ImgSaveDB = "img/" . $fileName;
                    $ImgData = $this->Contact->newEmptyEntity();
                    $ImgData->id = $id;
                    $ImgData = $this->Contact->patchEntity($ImgData, array(
                        "paymentimg" => $ImgSaveDB,
                    ));
                    if ($this->Contact->save($ImgData)) {
                        $responseData = ['success' => true];
                        $this->set('responseData', $responseData);
                        $this->set('_serialize', ['responseData']);
                        die;
                    }
                }
            }
        }
    }
}
