<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodProduct $foodProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Food Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Food Groups'), ['controller' => 'FoodGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Food Group'), ['controller' => 'FoodGroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="foodProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($foodProduct) ?>
    <fieldset>
        <legend><?= __('Add Food Product') ?></legend>
        <?php
            echo $this->Form->control('food_group_id', ['options' => $foodGroups]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
