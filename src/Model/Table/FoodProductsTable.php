<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FoodProducts Model
 *
 * @property \App\Model\Table\FoodGroupsTable&\Cake\ORM\Association\BelongsTo $FoodGroups
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\HasMany $Items
 *
 * @method \App\Model\Entity\FoodProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\FoodProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FoodProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FoodProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FoodProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FoodProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FoodProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FoodProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class FoodProductsTable extends Table
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

        $this->setTable('food_products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('FoodGroups', [
            'foreignKey' => 'food_group_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'food_product_id',
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['food_group_id'], 'FoodGroups'));

        return $rules;
    }
}
