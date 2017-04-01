/**
 * Created by KRONOS on 4/1/2017.
 */

'use strict'

app.controller('BoothViewController', function ($scope, $state, $stateParams, Booth) {
    $scope.event_view = EventBooth.get({id: $stateParams.id}); //Get a single product. Issues a GET to /api/products/:id
//console.log($scope.event_view);
});