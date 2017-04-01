/**
 * Created by KRONOS on 4/1/2017.
 */
'use strict'

app.factory('Register', function ($resource) {
    return $resource('../api/v1/booths/:id', {id: '@id'}, {
        update: {
            method: 'PUT'
        }
    });
});