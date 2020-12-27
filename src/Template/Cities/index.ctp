<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js',
    'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit',
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Cities'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Cities/index', ['block' => 'scriptBottom']);
?>

<div  ng-app="app" ng-controller="CityCRUDCtrl">
    <div id="example1"></div>
    <p style="color:red;">{{captcha_status}}</p>
    <table>
        <tr>
            <td width="200">Utilisateur (username):</td>
            <td><input type="text" id="username" ng-model="user.username" /></td>
        </tr>
        <tr>
            <td width="200">Mot de passe (password):</td>
            <td><input type="text" id="password" ng-model="user.password" /></td>
        </tr>
        <tr>
        <a ng-click="login(user)">[Connexion] </a>
        <a ng-click="logout()">[Déconnexion] </a>
        <a ng-click="changePassword(user.password)">[Changer le mot de passe]</a>              
        </tr>
    </table>
    <table>
        <tr>
            <td width="100">ID:</td>
            <td><input type="text" id="id" ng-model="city.id" /></td>
        </tr>
        <tr>
            <td width="100">Name:</td>
            <td><input type="text" id="name" ng-model="city.name" /></td>
        </tr>
    </table>
    <br /> <br /> 
    <a ng-click="getCity(city.id)">Get City</a> 
    <a ng-click="updateCity(city.id, city.name)">Update City</a> 
    <a ng-click="addCity(city.name)">Add City</a> 
    <a ng-click="deleteCity(city.id)">Delete City</a>

    <br /> <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <br />
    <br /> 
    <a ng-click="getAllCities()">Get all Cities</a><br /> 
    <br /> <br />
    <div ng-repeat="city in cities">
        {{city.id}} {{city.name}}
    </div>
    <!-- pre ng-show='cities'>{{cities | json }}</pre-->
</div>