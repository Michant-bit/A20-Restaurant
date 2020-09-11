<?php

// Entity Menu
namespace App\Model\Entity;
use Cake\ORM\Entity;

class Menu extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}