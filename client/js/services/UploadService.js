/**
 * Created by KRONOS on 4/1/2017.
 */
'use strict'


app.factory('Upload', function ($resource) {
    return $resource('../api/v1/uploads/:id', {id: '@id'}, {
        update: {
            method: 'PUT'
        }
    });
});