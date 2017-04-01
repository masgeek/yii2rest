/**
 * Created by KRONOS on 4/1/2017.
 */

'use strict'

app.controller('ReserveViewController', function ($scope, $state, $timeout, $stateParams, User, Reserve, Company, Booth, DocumentUpload, ngDialog, Upload) {

    $scope.user = new User();
    $scope.reserve = new Reserve();  //create new reservation instance. Properties will be set via ng-model on UI
    $scope.company = new Company();
    //$scope.docupload = new DocumentUpload();


    $scope.booth = Booth.get({id: $stateParams.id}, function () {//Get a single booth based on event_booth_id
        //add event booth to reserve model after the call is done
        $scope.reserve.event_booth_id = $scope.booth.event_booth_id;
    });

    $scope.addReservation = function () { //create a new reservation. Issues a POST to /api/
        $scope.user.$save()
            .then(function (resp) {
                $scope.company.user_id = resp.user_id;
                $scope.reserve.user_id = resp.user_id;
                //lets save the company information
                $scope.company.$save()
                    .then(function (res) {
                        //save the reservation
                        $scope.reserve.$save().then(function (resp) {
                            //redirect back to the events map
                           // $state.go('events');
                        });
                    })
                    .catch(function (error) {$scope.save_message = (error.data);})
                console.log(resp)
            })
            .catch(function (error) {$scope.save_message = (error.data);})
    }

    //scope for showing the file upload modal
    //this function opens the modal dialog for booth details
    $scope.uploadDocument = function () { //get details of the single booth and open it in a modal
        ngDialog.open({
            template: 'partials/file-upload.html',
        });
    };

    //company logo upload
    $scope.$watch('files', function () {
        $scope.logoUpload($scope.files);
    });
    $scope.$watch('file', function () {
        if ($scope.file != null) {
            $scope.files = [$scope.file];
        }
    });
    $scope.log = '';

    $scope.logoUpload = function (files) {
        if (files && files.length) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.$error) {
                    Upload.upload({
                        url: '../api/v1/companies/logo', //save to the uploads endpoint
                        data: {
                            logo_folder: 'logos',
                            file: file
                        }
                    }).then(function (resp) {
                        $timeout(function () {
                            /*$scope.log = 'file: ' +
                             resp.config.data.file.name +
                             ', Response: ' + JSON.stringify(resp.data) +
                             '\n' + $scope.log;*/

                            $scope.company.logo_path = resp.data.file_path;
                        });
                    }, null, function (evt) {
                        var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                        $scope.log = 'progress: ' + progressPercentage + '% ' + evt.config.data.file.name;
                    });
                }
            }
        }
    };
});


app.controller('UploadController', function ($scope, $timeout, Upload) {
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
                            company_id: 'mas',
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
});
