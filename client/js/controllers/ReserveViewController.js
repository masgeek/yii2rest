/**
 * Created by KRONOS on 4/1/2017.
 */

'use strict'

app.controller('ReserveViewController', function ($scope, $state, $stateParams, User, Reserve, Company, Booth) {

    $scope.user = new User();
    $scope.reserve = new Reserve();  //create new reservation instance. Properties will be set via ng-model on UI
    $scope.company = new Company();


    $scope.booth = Booth.get({id: $stateParams.id}, function () {//Get a single booth based on event_booth_id
        console.log($scope.booth.event_booth_id);
        //add event booth to reserve model after the call is done
        $scope.reserve.event_booth_id = $scope.booth.event_booth_id;
    });

    $scope.addProduct = function () { //create a new reservation. Issues a POST to /api/
        $scope.user.$save(function (resp, headers) {
                //$state.go('products'); // on success save the subsequebnt infoamtion
                //next save the company information

                $scope.company.user_id = resp.user_id;
                $scope.reserve.user_id = resp.user_id;

                //Save order
                /*
                 Save user data
                 --Get user id
                 ---Save company data
                 ----Get company id
                 -----Save teh booth reservation
                 */
                $scope.company.$save(function (resp, headers) {
                    //next get the company id
                    $scope.company.company_id = resp.company_id;
                    //now finally add it to the reservation tables
                    $scope.reserve.$save(function (resp, headers) {
                        //redirect to wherever
                    }, function (error) {
                        $scope.save_message = (error.data); //alert the user
                    });
                }, function (error) {
                    $scope.save_message = (error.data); //alert the user
                });

            }, function (error) {
                //console.log(resp);
                $scope.save_message = (error.data); //alert the user
            }
        );
    }
    ;
})
;