<?php

// Controlleur Menus
namespace App\Controller;

class MenusController extends AppController
{
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
}
