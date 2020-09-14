<?= $this->Html->link('Add Menu', ['action' => 'add']) ?>

<table>
    <tr>
        <th>Name</th>
        <th>Details</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Action</th>
    </tr>

    <?php foreach ($menus as $menu): ?>
    <tr>
        <td>
            <?= $this->Html->link($menu->name, ['action' => 'view', $menu->slug]) ?>
        </td>
        <td>
            <?= $this->Html->link($menu->details, ['action' => 'view', $menu->slug]) ?>
        </td>
        <td>
            <?= $menu->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $menu->modified->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Html->link('Edit', ['action' => 'edit', $menu->slug]) ?>
            |
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $menu->slug],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>