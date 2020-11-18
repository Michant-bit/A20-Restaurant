<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodGroup $foodGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Food Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Food Products'), ['controller' => 'FoodProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Food Product'), ['controller' => 'FoodProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="foodGroups form large-9 medium-8 columns content">
    <?= $this->Form->create($foodGroup) ?>
    <fieldset>
        <legend><?= __('Add Food Group') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
