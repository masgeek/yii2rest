/**
 * Created by KRONOS on 4/2/2017.
 */
'use strict'

//var app = angular.module('app.controllers', []);

app.controller('DocumentViewController', function ($scope,$http, $stateParams, $timeout, Upload, Summary, Reserve) {
    $scope.summary = Summary.get({id: $stateParams.id}, function () {
        console.log($scope.summary.reserved_booth_id);
        //noe get the reseved booth update instance
    });


    $scope.$watch('files', function () {
        $scope.upload($scope.files);
    });
    $scope.$watch('file', function () {
        if ($scope.file != null) {
            $scope.files = [$scope.file];
        }
    });
    $scope.log = '';

    $scope.upload = function (files) {
        if (files && files.length) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.$error) {
                    Upload.upload({
                        url: '../api/v1/uploads/document', //save to the uploads endpoint
                        data: {
                            company_id: $stateParams.id, //company id
                            file: file
                        }
                    }).then(function (resp) {
                        $timeout(function () {
                            $scope.log = 'file: ' +
                                resp.config.data.file.name +
                                ', Response: ' + JSON.stringify(resp.data) +
                                '\n' + $scope.log;
                        });
                    }, null, function (evt) {
                        var progressPercentage = parseInt(100.0 *
                            evt.loaded / evt.total);
                        $scope.log = 'progress: ' + progressPercentage +
                            '% ' + evt.config.data.file.name + '\n' +
                            $scope.log;
                    });
                }
            }
        }
    };

    $scope.confirmReservation = function ($reserved_booth_id) {
        /*$scope.reserve = Reserve.get({id: $reserved_booth_id}, function () {
         //console.log($scope.reserve);
         //noe get the reseved booth update instance
         $scope.reserve.reserved = 1;
         $scope.reserve.$update(function ($resp) {
         console.log($resp);
         });
         });*/

        //Let's first get the user and then update it.
        var user = Reserve.get({id: 17}, function () {
            user.reserved = false;
            user.$update(function () {
                console.log('Updating user with id 2');
            });
        });

        //first close the modal dialog that was open
        //ngDialog.close();
        //next redirected to the view we are interested in
        //$state.go('registerUser', {id: $event_booth_id}); // on success go back to home i.e. products state.
        console.log($reserved_booth_id);
    };
});