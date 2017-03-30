/**
 * Created by barsa on 3/27/2017.
 */
'use strict'

var app = angular.module('app', [
    'ngResource', //allows us to use $resource to call rest urls
    'ngRoute',      //$routeProvider
    'mgcrea.ngStrap'//bs-navbar, data-match-route directives
]);


app.factory('Entry', function($resource) {
    return $resource('../api/entries/:id'); // Note the full endpoint address
});

app.controller('Product', function ($scope, $http) {
    //$http.get('http://rest-service.guides.spring.io/greeting').
    $http.get('../api/v1/products').then(function (response) {
        $scope.products = response.data;
    });
});
