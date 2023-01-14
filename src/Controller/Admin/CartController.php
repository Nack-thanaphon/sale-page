<?php
declare(strict_types=1);
namespace App\Controller\Admin;
use App\Controller\Admin\AppController;
use Cake\ORM\TableRegistry;
/**
 * Cart Controller
 *
 * @property \App\Model\Table\CartTable $Cart
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CartController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cart = $this->paginate($this->Cart);
        $this->set(compact('cart'));
        $dataTest  = array(12,13);
        $datatable = TableRegistry::getTableLocator()->get('cart');
        $query = $datatable->find('all') ->where(['c_id IN' => $dataTest]);
        $this->set('data',$query);
    }
    /**
     * View method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cart = $this->Cart->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('cart'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cart = $this->Cart->newEmptyEntity();
        if ($this->request->is('post')) {
            $cart = $this->Cart->patchEntity($cart, $this->request->getData());
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $this->set(compact('cart'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cart = $this->Cart->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cart = $this->Cart->patchEntity($cart, $this->request->getData());
            if ($this->Cart->save($cart)) {
                $this->Flash->success(__('The cart has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cart could not be saved. Please, try again.'));
        }
        $this->set(compact('cart'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Cart id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cart = $this->Cart->get($id);
        if ($this->Cart->delete($cart)) {
            $this->Flash->success(__('The cart has been deleted.'));
        } else {
            $this->Flash->error(__('The cart could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
