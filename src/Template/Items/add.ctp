<?php
    echo $this->Html->script([
        'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
            ], ['block' => 'scriptLibraries']
    );
    $urlToLinkedListFilter = $this->Url->build([
        "controller" => "FoodGroups", // Sinon retourner à la normal
        "action" => "getFoodGroups",
        "_ext" => "json"
    ]);
    echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
    echo $this->Html->script('Items/add_edit', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <div>
            <?= __('Food Group') ?>
            <select
                name="food_group_id"
                id="food-group-id"
                ng-model="foodGroup"
                ng-options="foodGroup.name for foodGroup in foodGroups track by foodGroup.id"
            >
            <option value=''>Select</option>
            </select>
        </div>
        <div>
            <?= __('Food Product') ?> 
            <select
                name="food_product_id"
                id="food-product-id" 
                ng-disabled="!foodGroup" 
                ng-model="foodProduct"
                ng-options="foodProduct.name for foodProduct in foodGroup.food_products track by foodProduct.id"
                >
                <option value=''>Select</option>
            </select>
        </div>

        <?php
            //echo $this->Form->control('food_group_id', ['option' => $foodGroups]);
            //echo $this->Form->control('food_product_id', ['option' => [__('Please select a Food Group first')]]);
            echo $this->Form->control('name');
            echo $this->Form->control('price');
            echo $this->Form->control('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
