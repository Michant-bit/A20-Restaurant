<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Restaurant $restaurant
 */
?>
<?php
    $urlToCitiesAutoCompleteJson = $this->Url->build([
        "controller" => "Cities",
        "action" => "findCities",
        "_ext" => "json"
    ]);
    echo $this->Html->scriptBlock('var urlToAutoCompleteAction = "' . $urlToCitiesAutoCompleteJson . 
        '";', ['block' => true]);
    echo $this->Html->script('Restaurants/add_edit/cityAutoComplete', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <hr>
        <li><?= $this->Html->link(__('Return'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="restaurants form large-9 medium-8 columns content">
    <?= $this->Form->create($restaurant) ?>
    <fieldset>
        <legend><?= __('Add Restaurant') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('city_id', ['label' => __('City') . ' (' . __('AutoComplete') . 
                ')', 'type' => 'text', 'id' => 'autocomplete']);
            
            echo $this->Form->control('location');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
