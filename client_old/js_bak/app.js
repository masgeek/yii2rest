/**
 * Created by barsa on 3/27/2017.
 */
'use strict'

var app = angular.module('app', [
    'ngResource', //allows us to use $resource to call rest urls
    'ngRoute',      //$routeProvider
    'mgcrea.ngStrap'//bs-navbar, data-match-route directives
]);


app.factory('Product', function ($resource) {
    return $resource('../api/v1/products'); // Note the full endpoint address
});

/*
 app.controller('Product', function ($scope, $http) {
 //$http.get('http://rest-service.guides.spring.io/greeting').
 $http.get('../api/v1/products').then(function (response) {
 $scope.products = response.data;
 });
 });*/

/*
app.controller('oneProduct', function ($scope, Product) {
    var entry = Product.get({ id: $scope.id }, function() {
        console.log(entry);
    });
});*/

app.controller('allProducts', function ($scope, Product) {
    var entries = Product.query(function () {//get all products
        $scope.products = entries;
    });
});
