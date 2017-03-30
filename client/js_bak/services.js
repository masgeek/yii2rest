/**
 * Created by barsa on 3/30/2017.
 */

angular.module('app.services', []).factory('Movie', function($resource) {
    return $resource('../api/v1/products/:id', { id: '@id' }, {
        update: {
            method: 'PUT'
        }
    });
});