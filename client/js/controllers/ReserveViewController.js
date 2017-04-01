/**
 * Created by KRONOS on 4/1/2017.
 */

'use strict'

app.controller('ReserveViewController', function ($scope, $state, $stateParams, Reserve, Company, Booth) {
    $scope.booth = Booth.get({id: $stateParams.id}); //Get a single product. Issues a GET to /api/products/:id

    $scope.reserve = new Reserve();  //create new product instance. Properties will be set via ng-model on UI
    $scope.company = new Company();


    $scope.addProduct = function () { //create a new movie. Issues a POST to /api/products
        $scope.reserve.$save(function () {
            //$state.go('products'); // on success go back to home i.e. products state.
            //next save teh company information
        });
    };
});