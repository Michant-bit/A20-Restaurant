<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 *
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['add']);
    }

    public function findItems() {
        if($this->request->is('ajax')) {
            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Items->find('all', array(
                'conditions' => array('Items.name LIKE ' => '%' . $name . '%')
            ));
            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        }
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Menus'],
        ];
        $items = $this->paginate($this->Items);

        $this->set(compact('items'));
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Menus'],
        ]);

        $this->set('item', $item);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->request->session()->read('Menu.id') == false){
            $this->Flash->error(__('Item must be added from a menu'));
            return $this->redirect(['controller' => 'menus', 'action' => 'index']);
        } else {
            $item = $this->Items->newEntity();
            if ($this->request->is('post')) {
                $item = $this->Items->patchEntity($item, $this->request->getData());
                $item->menu_id = $this->request->session()->read('Menu.id');
                //debug($item); die();
                $this->request->session()->delete('Menu.id');
                if ($this->Items->save($item)) {
                    $this->Flash->success(__('The item has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
            $menus = $this->Items->Menus->find('list', ['limit' => 200]);
            $foodGroups = $this->Items->FoodGroups->find('list', ['limit' => 200]);
            $foodProducts = $this->Items->FoodProducts->find('list', ['limit' => 200]);
            $this->set(compact('item', 'menus', 'foodGroups', 'foodProducts'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Menus'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $menus = $this->Items->Menus->find('list', ['limit' => 200]);
        $this->set(compact('item', 'menus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        return true;
    }
}
