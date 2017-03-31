/**
 * Created by KRONOS on 3/31/2017.
 */
'use strict'

var app = angular.module('app.controllers', []);

app.controller('BoothViewController', function ($scope, $stateParams, Event) {
    $scope.event_view = Event.get({id: $stateParams.id}); //Get a single product. Issues a GET to /api/products/:id
    console.log($scope.event_view);
});