/**
 * Created by KRONOS on 3/31/2017.
 */


app.factory('Booth', function ($resource) {
    return $resource('../api/v1/booths/:id', {id: '@id'}, {
        update: {
            method: 'PUT'
        }
    });
});

app.factory('EventBooth', function ($resource) {
    return $resource('../api/v1/booths/all/:id',
        {id: '@id'},
        {
            'get': {
                method: 'GET',
                isArray: true,
                /*transformResponse: function (data) {
                 return angular.fromJson(data);
                 },*/
            }
        });
});