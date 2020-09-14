<?php

// Controlleur Menus
namespace App\Controller;
use App\Controller\AppController;

class MenusController extends AppController
{
    // Initialiser les composants
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    // Table des menus
    public function index()
    {
        $this->loadComponent('Paginator');
        $menus = $this->Paginator->paginate($this->Menus->find());
        $this->set(compact('menus'));
    }

    // Pour un seul menu
    public function view($slug = null)
    {
        $menu = $this->Menus->findBySlug($slug)->firstOrFail();
        $this->set(compact('menu'));
    }

    // Pour ajouter un menu
    public function add()
    {
        $menu = $this->Menus->newEntity();
        if ($this->request->is('post')) {
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());

            // Hardcoding the user_id is temporary, and will be removed later
            // when we build authentication out.
            $menu->user_id = 1;

            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('Your menu has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your menu.'));
        }
        $this->set('menu', $menu);
    }
}
