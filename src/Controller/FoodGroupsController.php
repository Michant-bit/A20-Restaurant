<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FoodGroups Controller
 *
 * @property \App\Model\Table\FoodGroupsTable $FoodGroups
 *
 * @method \App\Model\Entity\FoodGroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoodGroupsController extends AppController
{
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByFoodGroup']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $foodGroups = $this->paginate($this->FoodGroups);

        $this->set(compact('foodGroups'));
    }

    /**
     * View method
     *
     * @param string|null $id Food Group id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $foodGroup = $this->FoodGroups->get($id, [
            'contain' => ['FoodProducts'],
        ]);

        $this->set('foodGroup', $foodGroup);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $foodGroup = $this->FoodGroups->newEntity();
        if ($this->request->is('post')) {
            $foodGroup = $this->FoodGroups->patchEntity($foodGroup, $this->request->getData());
            if ($this->FoodGroups->save($foodGroup)) {
                $this->Flash->success(__('The food group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food group could not be saved. Please, try again.'));
        }
        $this->set(compact('foodGroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Food Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $foodGroup = $this->FoodGroups->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $foodGroup = $this->FoodGroups->patchEntity($foodGroup, $this->request->getData());
            if ($this->FoodGroups->save($foodGroup)) {
                $this->Flash->success(__('The food group has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The food group could not be saved. Please, try again.'));
        }
        $this->set(compact('foodGroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Food Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $foodGroup = $this->FoodGroups->get($id);
        if ($this->FoodGroups->delete($foodGroup)) {
            $this->Flash->success(__('The food group has been deleted.'));
        } else {
            $this->Flash->error(__('The food group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
