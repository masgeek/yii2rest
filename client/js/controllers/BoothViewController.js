/**
 * Created by KRONOS on 3/31/2017.
 */
'use strict'

//var app = angular.module('app.controllers', []);

app.controller('BoothViewController', function ($scope, $state, $stateParams, Booth, EventBooth, ngDialog) {
    $scope.event_view = EventBooth.get({id: $stateParams.id}); //Get a single product. Issues a GET to /api/products/:id
    //console.log($scope.event_view);

    //this function opens the modal dialog for booth details
    $scope.openDefault = function ($event_booth_id) { //get details of the single booth and open it in a modal
        $scope.booth_detail = Booth.get({id: $event_booth_id}, function () {
            var newScope = $scope.$new(); //define new scope so that we can pass the booth details there
            ngDialog.open({
                template: 'partials/booth-view.html',
                //className: 'ngdialog-theme-default',
                showClose: false,
                scope: newScope
            });
        });
    };

    //this will open the next view for reservation
    $scope.reserveBooth = function ($event_booth_id) {
        //first close the modal dialog that was open
        ngDialog.close();
        //next redirected to the view we are interested in
        $state.go('registerUser', {id: $event_booth_id}); // on success go back to home i.e. products state.
    };
});