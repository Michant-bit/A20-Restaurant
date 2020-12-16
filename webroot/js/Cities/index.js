var app = angular.module('app', []);

app.controller('CityCRUDCtrl', ['$scope', 'CityCRUDService', function ($scope, CityCRUDService) {

        $scope.updateCity = function () {
            CityCRUDService.updateCity($scope.city.id, $scope.city.name)
                    .then(function success(response) {
                        $scope.message = 'City data updated!';
                        $scope.errorMessage = '';
                        $scope.getAllCities();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating city!';
                                $scope.message = '';
                            });
        }

        $scope.getCity = function (id) {
            var id = $scope.city.id;
            CityCRUDService.getCity($scope.city.id)
                    .then(function success(response) {
                        $scope.city = response.data.city;
                        $scope.city.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'City not found!';
                                } else {
                                    $scope.errorMessage = "Error getting city!";
                                }
                            });
        }

        $scope.addCity = function () {
            if ($scope.city != null && $scope.city.name) {
                CityCRUDService.addCity($scope.city.name)
                        .then(function success(response) {
                            $scope.message = 'City added!';
                            $scope.errorMessage = '';
                            $scope.getAllCities();
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding city!';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

        $scope.deleteCity = function () {
            CityCRUDService.deleteCity($scope.city.id)
                    .then(function success(response) {
                        $scope.message = 'City deleted!';
                        $scope.city = null;
                        $scope.errorMessage = '';
                        $scope.getAllCities();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting city!';
                                $scope.message = '';
                            })
        }

        $scope.getAllCities = function () {
            CityCRUDService.getAllCities()
                    .then(function success(response) {
                        $scope.cities = response.data.cities;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting cities!';
                            });
        }

    }]);

app.service('CityCRUDService', ['$http', function ($http) {

        this.getCity = function getCity(cityId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + cityId,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.addCity = function addCity(name) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {name: name},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.deleteCity = function deleteCity(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.updateCity = function updateCity(id, name) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {name: name},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.getAllCities = function getAllCities() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

    }]);