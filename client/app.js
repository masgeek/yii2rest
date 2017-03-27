/**
 * Created by barsa on 3/27/2017.
 */
'use strict'

angular.module('demo', [])
    .controller('Hello', function($scope, $http) {
        //$http.get('http://rest-service.guides.spring.io/greeting').
        $http.get('http://localhost/yii2rest/api/v1/products').
        then(function(response) {
            $scope.products = response.data;
        });
    });
