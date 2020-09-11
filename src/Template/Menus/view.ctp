<h1><?= h($menu->name) ?></h1>
<p><?= h($menu->details) ?></p>
<p><small>Created: <?= $menu->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $menu->slug]) ?></p>