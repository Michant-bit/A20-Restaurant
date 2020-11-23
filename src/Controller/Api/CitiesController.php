<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 *
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CitiesController extends AppController {

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $cities = $this->Cities->find('all');
        $this->set([
            'cities' => $cities,
            '_serialize' => ['cities']
        ]);
    }

    public function view($id)
    {
        $city = $this->Cities->get($id);
        $this->set([
            'city' => $city,
            '_serialize' => ['city']
        ]);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $city = $this->Cities->newEntity($this->request->getData());
        if ($this->Cities->save($city)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'city' => $city,
            '_serialize' => ['message', 'city']
        ]);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $city = $this->Cities->get($id);
        $city = $this->Cities->patchEntity($city, $this->request->getData());
        if ($this->Cities->save($city)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $city = $this->Cities->get($id);
        $message = 'Deleted';
        if (!$this->Cities->delete($city)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }


}