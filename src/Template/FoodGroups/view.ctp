<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodGroup $foodGroup
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Food Group'), ['action' => 'edit', $foodGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Food Group'), ['action' => 'delete', $foodGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foodGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Food Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Food Products'), ['controller' => 'FoodProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food Product'), ['controller' => 'FoodProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="foodGroups view large-9 medium-8 columns content">
    <h3><?= h($foodGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($foodGroup->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($foodGroup->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Food Products') ?></h4>
        <?php if (!empty($foodGroup->food_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Food Group Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($foodGroup->food_products as $foodProducts): ?>
            <tr>
                <td><?= h($foodProducts->id) ?></td>
                <td><?= h($foodProducts->food_group_id) ?></td>
                <td><?= h($foodProducts->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FoodProducts', 'action' => 'view', $foodProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FoodProducts', 'action' => 'edit', $foodProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FoodProducts', 'action' => 'delete', $foodProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foodProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
