<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Restaurants Controller
 *
 * @property \App\Model\Table\RestaurantsTable $Restaurants
 *
 * @method \App\Model\Entity\Restaurant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RestaurantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $restaurants = $this->paginate($this->Restaurants);

        $this->set(compact('restaurants'));
    }

    /**
     * View method
     *
     * @param string|null $id Restaurant id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $restaurant = $this->Restaurants->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set('restaurant', $restaurant);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $restaurant = $this->Restaurants->newEntity();
        if ($this->request->is('post')) {
            $restaurant = $this->Restaurants->patchEntity($restaurant, $this->request->getData());
            $restaurant->user_id = $this->Auth->user('id');
            if ($this->Restaurants->save($restaurant)) {
                $this->Flash->success(__('The restaurant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The restaurant could not be saved. Please, try again.'));
        }
        $users = $this->Restaurants->Users->find('list', ['limit' => 200]);
        $cities = $this->Restaurants->Cities->find('list', ['limit' => 200]); // Attention
        $this->set(compact('restaurant', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Restaurant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $restaurant = $this->Restaurants->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->Restaurants->patchEntity($restaurant, $this->request->getData(), [
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Restaurants->save($restaurant)) {
                $this->Flash->success(__('The restaurant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The restaurant could not be saved. Please, try again.'));
        }
        $this->set('restaurant', $restaurant);
    }

    /**
     * Delete method
     *
     * @param string|null $id Restaurant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $restaurant = $this->Restaurants->get($id);
        if ($this->Restaurants->delete($restaurant)) {
            $this->Flash->success(__('The restaurant has been deleted.'));
        } else {
            $this->Flash->error(__('The restaurant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'tags'])) {
            return true;
        }

        // All other actions require a id.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the menu belongs to the current user.
        $restaurant = $this->Restaurants->findById($id)->first();

        $validator = false;
        
        if($restaurant->user_id === $user['id']){
            $validator = true;
        } else if($user['grade'] === "administrator") {
            $validator = true;
        }
        return $validator;
    }
}
