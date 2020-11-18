<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FoodProducts Controller
 *
 * @property \App\Model\Table\FoodProductsTable $FoodProducts
 *
 * @method \App\Model\Entity\FoodProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoodProductsController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByFoodGroup', 'add', 'edit', 'delete']);
    }

    public function getByFoodGroup() {
        $food_group_id = $this->request->query('food_group_id');
        $foodProducts = $this->FoodProducts->find('all', [
            'conditions' => ['FoodProducts.food_group_id' => $food_group_id],
        ]);
        $this->set('foodProducts', $foodProducts);
        $this->set('_serialize', ['foodProducts']);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FoodGroups'],
        ];
        $foodProducts = $this->paginate($this->FoodProducts);

        $this->set(compact('foodProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Food Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $foodProduct = $this->FoodProducts->get($id, [
            'contain' => ['FoodGroups', 'Items'],
        ]);

        $this->set('foodProduct', $foodProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $foodProduct = $this->FoodProducts->newEntity();
        if ($this->request->is('post')) {
            $foodProduct = $this->FoodProducts->patchEntity($foodProduct, $this->request->getData());
            if ($this->FoodProducts->save($foodProduct)) {
                $this->Flash->success(__('The food product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food product could not be saved. Please, try again.'));
        }
        $foodGroups = $this->FoodProducts->FoodGroups->find('list', ['limit' => 200]);
        $this->set(compact('foodProduct', 'foodGroups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Food Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $foodProduct = $this->FoodProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $foodProduct = $this->FoodProducts->patchEntity($foodProduct, $this->request->getData());
            if ($this->FoodProducts->save($foodProduct)) {
                $this->Flash->success(__('The food product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food product could not be saved. Please, try again.'));
        }
        $foodGroups = $this->FoodProducts->FoodGroups->find('list', ['limit' => 200]);
        $this->set(compact('foodProduct', 'foodGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Food Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $foodProduct = $this->FoodProducts->get($id);
        if ($this->FoodProducts->delete($foodProduct)) {
            $this->Flash->success(__('The food product has been deleted.'));
        } else {
            $this->Flash->error(__('The food product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
