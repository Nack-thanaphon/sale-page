<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cartitem Controller
 *
 * @property \App\Model\Table\CartitemTable $Cartitem
 * @method \App\Model\Entity\Cartitem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartitemController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cartitem = $this->paginate($this->Cartitem);

        $this->set(compact('cartitem'));
    }

    /**
     * View method
     *
     * @param string|null $id Cartitem id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cartitem = $this->Cartitem->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('cartitem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cartitem = $this->Cartitem->newEmptyEntity();
        if ($this->request->is('post')) {
            $cartitem = $this->Cartitem->patchEntity($cartitem, $this->request->getData());
            if ($this->Cartitem->save($cartitem)) {
                $this->Flash->success(__('The cartitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cartitem could not be saved. Please, try again.'));
        }
        $this->set(compact('cartitem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cartitem id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cartitem = $this->Cartitem->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cartitem = $this->Cartitem->patchEntity($cartitem, $this->request->getData());
            if ($this->Cartitem->save($cartitem)) {
                $this->Flash->success(__('The cartitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cartitem could not be saved. Please, try again.'));
        }
        $this->set(compact('cartitem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cartitem id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cartitem = $this->Cartitem->get($id);
        if ($this->Cartitem->delete($cartitem)) {
            $this->Flash->success(__('The cartitem has been deleted.'));
        } else {
            $this->Flash->error(__('The cartitem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
