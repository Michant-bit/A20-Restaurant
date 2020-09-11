<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Details</th>
        <th>Created</th>
    </tr>

    <!-- Change title for name -->

    <?php foreach ($menus as $menu): ?>
    <tr>
        <td>
            <?= $this->Html->link($menu->id, ['action' => 'view', $menu->slug]) ?>
        </td>
        <td>
            <?= $this->Html->link($menu->name, ['action' => 'view', $menu->slug]) ?>
        </td>
        <td>
            <?= $this->Html->link($menu->details, ['action' => 'view', $menu->slug]) ?>
        </td>
        <td>
            <?= $menu->created->format(DATE_RFC850) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>