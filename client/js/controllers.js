/**
 * Created by barsa on 3/30/2017.
 */
'use strict'

var app = angular.module('app.controllers', []);

app.controller('EventsMapController', function ($scope, $state, popupService, $window, Event) {
    $scope.events = Event.query(); //fetch all products. Issues a GET to /api/products
});

app.controller('ProductViewController', function ($scope, $stateParams, Event) {
    $scope.events = Event.get({id: $stateParams.id}); //Get a single product. Issues a GET to /api/products/:id
});
app.controller('ProductCreateController', function ($scope, $state, $stateParams, Event) {
    $scope.events = new Event();  //create new product instance. Properties will be set via ng-model on UI

    $scope.addProduct = function () { //create a new movie. Issues a POST to /api/products
        $scope.events.$save(function () {
            $state.go('products'); // on success go back to home i.e. products state.
        });
    };
});

app.controller('ProductEditController', function ($scope, $state, $stateParams, Event) {
    $scope.updateProduct = function () { //Update the edited movie. Issues a PUT to /api/products/:id
        $scope.events.$update(function () {
            $state.go('products'); // on success go back to home i.e. products state.
        });
    };

    $scope.loadProduct = function () { //Issues a GET request to /api/products/:id to get a movie to update
        $scope.events = Event.get({id: $stateParams.id});
    };

    var $t = Event.get({id: $stateParams.id});
    $scope.loadProduct(); // Load a movie which can be edited on UI

    console.log($t);
});