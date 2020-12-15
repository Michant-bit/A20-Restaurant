var app = angular.module('linkedlists', []);

app.controller('foodGroupsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.foodGroups = response.data.foodGroup;
    });
});