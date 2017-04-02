/**
 * Created by KRONOS on 4/1/2017.
 */
'use strict'

app.factory('User', function ($resource) {
    return $resource('../api/v1/users/:id', {id: '@id'}, {
        update: {
            method: 'PUT'
        }
    });
});


app.factory("Reserve", function ($resource) {
    return $resource(
        "../api/v1/reserves/:id",
        {id: "@id" },
        {
            "update": {method: "PUT"},
            "reviews": {'method': 'GET', 'params': {'reviews_only': "true"}, isArray: true}

        }
    );
});;

app.factory('Summary', function ($resource) {
    return $resource('../api/v1/reserves/summary/:id', {id: '@id'}, {
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