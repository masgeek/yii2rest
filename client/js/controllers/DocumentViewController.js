/**
 * Created by KRONOS on 4/2/2017.
 */
'use strict'

//var app = angular.module('app.controllers', []);

app.controller('DocumentViewController', function ($scope, $state, $stateParams, $timeout, Upload, Summary, Reserve) {
    $scope.summary = Summary.get({id: $stateParams.id}, function () {
        console.log($scope.summary);
        console.log($stateParams);
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

    $scope.confirmReservation = function ($event_id, $booth_id, $reserved_booth_id) {
        var reservation = Reserve.get({id: $reserved_booth_id}, function () {
            reservation.reserved = true;
            Reserve.update({id: $reserved_booth_id}, reservation);
            console.log(reservation);
        });

        //first close the modal dialog that was open
        //ngDialog.close();
        //next redirected to the view we are interested in


        $state.go('boothSummary', {event_id: $event_id, booth_id: $booth_id}); // on success go back to home i.e. products state.
    };
});