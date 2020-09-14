<h1>Add Menu</h1>
<?php
    echo $this->Form->create($menu);
    // Hard code the user for now.
    echo $this->Form->control('user_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('name');
    echo $this->Form->control('details');
    echo $this->Form->control('created', ['type' => 'datetime']);
    echo $this->Form->control('modified', ['type' => 'datetime']);
    echo $this->Form->button(__('Save Menu'));
    echo $this->Form->end();
?>