<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FoodProduct Entity
 *
 * @property int $id
 * @property int $food_group_id
 * @property string $name
 *
 * @property \App\Model\Entity\FoodGroup $food_group
 * @property \App\Model\Entity\Item[] $items
 */
class FoodProduct extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'food_group_id' => true,
        'name' => true,
        'food_group' => true,
        'items' => true,
    ];
}
