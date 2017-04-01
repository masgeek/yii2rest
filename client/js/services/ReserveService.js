/**
 * Created by KRONOS on 4/1/2017.
 */
'use strict'

app.factory('Reserve', function ($resource) {
    return $resource('../api/v1/reserves/:id', {id: '@id'}, {
        update: {
            method: 'PUT'
        }
    });
});

app.factory('Company', function ($resource) {
    return $resource('../api/v1/companies/:id', {id: '@id'}, {
        update: {
            method: 'PUT'
        }
    });
});