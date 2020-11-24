<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Restaurant';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?php
        echo $this->Html->script([
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js'
        ], ['block' => 'scriptLibraries']
        );
    ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?=__('Menus Creation')?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li>
                    <?= $this->Html->link('À propos', ['controller' => 'Pages', 'action' => 'apropos']);?>
                </li>
                <li>
                    <?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]);?>
                </li>
                <li>
                    <?= $this->Html->link('English', ['action' => 'changeLang', 'en_CA'], ['escape' => false]);?>
                </li>
                <li>
                    <?= $this->Html->link('Español', ['action' => 'changeLang', 'es_ES'], ['escape' => false]);?>
                </li>
                <li>
                    <?= $this->Html->link(__('Autocomplete'), ['controller' => 'Restaurants', 'action' => 'add']) ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Linked Lists'), ['controller' => 'Items', 'action' => 'add']) ?>
                </li>
                <li>
                    <?= $this->Html->link(__('Monopage'), ['controller' => 'Cities', 'action' => 'index']) ?>
                </li>
                <li>
                    <?php
                        $loguser = $this->request->getSession()->read('Auth.User');
                        $user = $loguser['username'];
                        $id = $loguser['id'];
                        if($loguser){
                            echo $this->Html->link(__($user), ['controller' => 'Users', 'action' => 'view', $id]);
                        }
                    ?>
                </li>
                <li>
                    <?php
                        if($loguser){
                            echo $this->Html->link(__('[Logout]'), ['controller' => 'Users', 'action' => 'logout']);
                        } else {
                            echo $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']);
                        }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->fetch('scriptLibraries') ?>
    <?= $this->fetch('script') ?>
    <?= $this->fetch('scriptBottom') ?>
</body>
</html>
