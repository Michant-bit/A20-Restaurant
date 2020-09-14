<?php

// Table Menus
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Event\EventInterface;

class MenusTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedName = Text::slug($entity->name);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedName, 0, 191);
        }
    }
}