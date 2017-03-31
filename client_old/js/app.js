/**
 * Created by barsa on 3/27/2017.
 */
'use strict'

var app = angular.module('app', [
    'ngResource', //allows us to use $resource to call rest urls
    'ngRoute',      //$routeProvider
    'mgcrea.ngStrap',//bs-navbar, data-match-route directives
    'ui.router',
    'app.services',
    'app.controllers',
]);


app.config(function ($stateProvider) {
    $stateProvider.state('products', { // state for showing all movies
        url: '/products',
        templateUrl: 'partials/products.html',
        controller: 'ProductListController'
    }).state('viewProduct', { //state for showing single movie
        url: '/product/:id/view',
        templateUrl: 'partials/product-view.html',
        controller: 'ProductViewController'
    }).state('newProduct', { //state for adding a new movie
        url: '/products/new',
        templateUrl: 'partials/product-add.html',
        controller: 'MovieCreateController'
    }).state('editProduct', { //state for updating a movie
        url: '/product/:id/edit',
        templateUrl: 'partials/product-edit.html',
        controller: 'ProductEditController'
    });
}).run(function ($state) {
    $state.go('products'); //make a transition to products state when app starts
});




