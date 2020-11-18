<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FoodGroup[]|\Cake\Collection\CollectionInterface $foodGroups
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Food Group'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Food Products'), ['controller' => 'FoodProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Food Product'), ['controller' => 'FoodProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="foodGroups index large-9 medium-8 columns content">
    <h3><?= __('Food Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($foodGroups as $foodGroup): ?>
            <tr>
                <td><?= $this->Number->format($foodGroup->id) ?></td>
                <td><?= h($foodGroup->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $foodGroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foodGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $foodGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foodGroup->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
