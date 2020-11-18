<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodProduct $foodProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Food Product'), ['action' => 'edit', $foodProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Food Product'), ['action' => 'delete', $foodProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foodProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Food Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Food Groups'), ['controller' => 'FoodGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food Group'), ['controller' => 'FoodGroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="foodProducts view large-9 medium-8 columns content">
    <h3><?= h($foodProduct->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Food Group') ?></th>
            <td><?= $foodProduct->has('food_group') ? $this->Html->link($foodProduct->food_group->name, ['controller' => 'FoodGroups', 'action' => 'view', $foodProduct->food_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($foodProduct->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($foodProduct->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <?php if (!empty($foodProduct->items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Menu Id') ?></th>
                <th scope="col"><?= __('Food Group Id') ?></th>
                <th scope="col"><?= __('Food Product Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($foodProduct->items as $items): ?>
            <tr>
                <td><?= h($items->id) ?></td>
                <td><?= h($items->menu_id) ?></td>
                <td><?= h($items->food_group_id) ?></td>
                <td><?= h($items->food_product_id) ?></td>
                <td><?= h($items->name) ?></td>
                <td><?= h($items->price) ?></td>
                <td><?= h($items->details) ?></td>
                <td><?= h($items->created) ?></td>
                <td><?= h($items->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
