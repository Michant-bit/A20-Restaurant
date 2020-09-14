<h1>Edit Menu</h1>
<?php
    echo $this->Form->create($menu);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('name');
    echo $this->Form->control('details');
    echo $this->Form->button(__('Save Menu'));
    echo $this->Form->end();
?>