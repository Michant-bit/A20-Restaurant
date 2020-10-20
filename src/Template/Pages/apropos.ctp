<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <hr>
        <li class="heading"><?= __('All lists') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Restaurants'), ['controller' => 'Restaurants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('À propos') ?></h3>
    <h6>Antoine La Boissière<h6>
    <h6>420-5b7 MO Applications internet<h6>
    <h6>Automne 2018, Collège Montmorency<h6>
    <hr>
    <h4><?= __('Utilisateurs') ?></h4>
    <h6>Grade: Administrateur</h6>
    <h6>Username: admin@gmail.com</h6>
    <h6>Password: admin</h6>
    <br/>
    <h6>Grade: Auteur</h6>
    <h6>Username: antoine.laboissiere@gmail.com</h6>
    <h6>Password: antoine</h6>
    <hr>
    <h4><?= __('Instructions') ?></h4>
    <h6>
        Les visiteurs peuvent accéder à toutes les listes sauf celle des utilisateurs. 
        Ils ont comme droit d'éditer les items des menus pour améliorer le menu proposé. 
        Ils peuvent aussi ajouter leur propre photo de ce menu.
    </h6> 
    <h6>
        Il faut s'enregistrer pour pouvoir créer son propre menu et ajouter son restaurant à la liste. 
        Les utilisateurs enregistrés peuvent seulement supprimer et modifier leur propre menu et/ou restaurant.
    </h6> 
    <h6>
        Seul un administrateur peut avoir accès à la liste des utilisateurs et modifier ou supprimer n'importe quel menu et/ou restaurant.
    </h6>
    <h6>
        Les tables menus et items sont multilingues.
    </h6>
    <h6>
        Il faut cliquer sur le nom de l'utilisateur dans la bar de menu pour modifier son compte.
    </h6>
    <h6>
        ***Il faut être dans la vue d'un menu pour ajouter un item à celui-ci***
    </h6>
    <br/>
    <h6></h6>
    <hr>
    <h3><?= __('Diagrammes') ?><h3>
    <h6>
        <a href="http://www.databaseanswers.org/data_models/restaurants_and_customers/index.htm"><?= __('Lien vers le diagramme original') ?></a>
    </h6>
    <img src="../webroot/img/bd_diagramme.png" alt="Diagramme"></img>
    
</div>