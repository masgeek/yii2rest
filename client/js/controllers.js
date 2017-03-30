/**
 * Created by barsa on 3/30/2017.
 */
'use strict'

angular.module('app.controllers', []).controller('ProductListController', function ($scope, $state, popupService, $window, Product) {
    $scope.products = Product.query(); //fetch all products. Issues a GET to /api/products

    $scope.deleteMovie = function (product) { // Delete a movie. Issues a DELETE to /api/products/:id
        if (popupService.showPopup('Really delete this?')) {
            product.$delete(function () {
                $window.location.href = ''; //redirect to home
            });
        }
    };
}).controller('ProductViewController', function ($scope, $stateParams, Product) {
    $scope.product = Product.get({id: $stateParams.id}); //Get a single product. Issues a GET to /api/products/:id
}).controller('ProductCreateController', function ($scope, $state, $stateParams, Product) {
    $scope.product = new Product();  //create new product instance. Properties will be set via ng-model on UI

    $scope.addProduct = function () { //create a new movie. Issues a POST to /api/products
        $scope.product.$save(function () {
            $state.go('products'); // on success go back to home i.e. products state.
        });
    };
}).controller('ProductEditController', function ($scope, $state, $stateParams, Product) {
    $scope.updateProduct = function () { //Update the edited movie. Issues a PUT to /api/products/:id
        $scope.movie.$update(function () {
            $state.go('products'); // on success go back to home i.e. products state.
        });
    };

    $scope.loadProduct = function () { //Issues a GET request to /api/products/:id to get a movie to update
        $scope.product = Product.get({id: $stateParams.id});
    };

    $scope.loadProduct(); // Load a movie which can be edited on UI
});