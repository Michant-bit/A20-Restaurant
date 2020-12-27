var onloadCallback = function () {
    widgetIdl = grecaptcha.render('exemple1', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};

var app = angular.module('app', []);

var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';

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

        $scope.login = function () {
            if(grecaptcha.getResponse(widgetIdl) == ' ') {
                $scope.captcha_status = 'Please verify captcha.';
                return;
            }
            if ($scope.user != null && $scope.user.username) {
                CityCRUDService.login($scope.user)
                        .then(function success(response) {
                            $scope.message = $scope.user.username + ' en session!';
                            $scope.errorMessage = '';
                            localStorage.setItem('token', response.data.data.token);
                            localStorage.setItem('user_id', response.data.data.id);
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Nom d\'utilisateur ou mot de passe invalide...';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Entrez un nom d\'utilisateur s.v.p.';
                $scope.message = '';
            }

        }

        $scope.logout = function () {
            localStorage.setItem('token', "no token");
            localStorage.setItem('user', "no user");
            $scope.message = '';
            $scope.errorMessage = 'Utilisateur déconnecté!';
        }

        $scope.changePassword = function () {
            CityCRUDService.changePassword($scope.user.password)
                    .then(function success(response) {
                        $scope.message = 'Mot de passe mis à jour!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Mot de passe inchangé!';
                                $scope.message = '';
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

        this.login = function login(user) {
            return $http({
                method: 'POST',
                url: urlToRestApiUsers + '/token',
                data: {username: user.username, password: user.password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }

        this.changePassword = function changePassword(password) {
            return $http({
                method: 'PATCH',
                url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
                data: {password: password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }
    }]);