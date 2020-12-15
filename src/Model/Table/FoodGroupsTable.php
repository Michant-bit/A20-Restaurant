<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FoodGroups Model
 *
 * @property \App\Model\Table\FoodProductsTable&\Cake\ORM\Association\HasMany $FoodProducts
 * @property &\Cake\ORM\Association\HasMany $Items
 *
 * @method \App\Model\Entity\FoodGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\FoodGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FoodGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FoodGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FoodGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FoodGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FoodGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FoodGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class FoodGroupsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('food_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('FoodProducts', [
            'foreignKey' => 'food_group_id',
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'food_group_id',
        ]);
    }

    public function getFoodGroups()
    {
        $foodGroups = $this->FoodGroups->find('all',
            ['contain' => ['FoodProducts']]);
        $this->set([
            'foodGroups' => $foodGroups,
            '_serialize' => ['foodGroups']
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
