/**
 * Created by KRONOS on 3/31/2017.
 */

'use strict'

//AIzaSyAiGWtTrb4SELW64VTFuxeesUaTBKOejGA this is our google maps API key

var app = angular.module('app.controllers', []);

app.controller('EventsMapController', function ($scope, $state, popupService, $window, Event) {

    //set up the maps data
    $scope.markers = []; //array to hold out markers

    var mapOptions = {
        zoom: 4, //zoom 2 wntire glob, 4 closser to coordinate
        center: new google.maps.LatLng(1, 36), //starting coordinates
        mapTypeId: google.maps.MapTypeId.TERRAIN
    }
    $scope.map = new google.maps.Map(document.getElementById('map'), mapOptions);


    var infoWindow = new google.maps.InfoWindow();

    var createMarker = function (info) {


        var marker = new google.maps.Marker({
            map: $scope.map,
            position: new google.maps.LatLng(info.event_lat, info.event_long),
            title: info.event_name
        });
        marker['event_id'] = info.event_id; //add extra data to teh marker, this will help in fetching record details
        marker.content = '<div class="infoWindowContent">' + info.event_location + '</div>';

        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.setContent('<h2>' + marker.title + '</h2>' + marker.content);
            infoWindow.open($scope.map, marker);
            $scope.event_details = Event.get({id: marker.event_id});
        });

        $scope.markers.push(marker);

    }

    //fetch teh data from the backend
    $scope.events = Event.query(function () {//fetch all events. Issues a GET to /api/events
        //create markers in here
        for (var i = 0; i < $scope.events.length; i++) {
            //console.log($scope.events[i]);
            createMarker($scope.events[i]);
        }

    });
    $scope.openInfoWindow = function (e, selectedMarker) {
        e.preventDefault();
        google.maps.event.trigger(selectedMarker, 'click');
    }


});
