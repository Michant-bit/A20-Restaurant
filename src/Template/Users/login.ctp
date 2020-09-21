<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Login'), ['action' => 'login']) ?> </li>
        <li><?= $this->Html->link(__('Register'), ['action' => '/add']) ?> </li>
        <hr>
        <li><?= $this->Html->link(__('Menus List'), ['action' => '../menus/index']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3>Login</h3>
    <?= $this->Form->create() ?>
    <?= $this->Form->control('email') ?>
    <?= $this->Form->control('password') ?>
    <?= $this->Form->button('Login') ?>
    <?= $this->Form->end() ?>
</div>
