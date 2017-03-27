/**
 * Created by barsa on 3/27/2017.
 */

angular.module('demo', [])
    .controller('Hello', function($scope, $http) {
        $http.get('http://rest-service.guides.spring.io/greeting').
        then(function(response) {
            $scope.greeting = response.data;
        });
    });
