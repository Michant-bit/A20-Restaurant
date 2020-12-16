<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js'
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Cities'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Cities/index', ['block' => 'scriptBottom']);
?>

<div  ng-app="app" ng-controller="CityCRUDCtrl">
<input type="hidden" id="id" ng-model="city.id" /> 
    <table>
        <tr>
            <td width="150">Name:</td>
            <td><input type="text" id="name" ng-model="city.name" /></td>
        </tr>
    </table>
    <button ng-click="updateCity(city)">Update City</button>
    <button ng-click="addCity(city.name)">Add City</button>

    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <table class="hoverable bordered">
        <thread>
            <tr>
                <th class="text-align-center" ng-init="getAllCities()">ID</th>
                <th class="width-30-pct">Name</th>
                <th class="width-30-pct">Actions</th>
            </tr>
        </thread>

        <tbody ng-init="getAllCities()">
            <tr ng-repeat="city in cities">
                <td class="text-align-center">{{city.id}}</td>
                <td>{{city.name}}</td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="getCity(city.id)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteCity(city.id)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>