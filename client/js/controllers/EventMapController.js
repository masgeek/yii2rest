/**
 * Created by KRONOS on 3/31/2017.
 */

'use strict'

//AIzaSyAiGWtTrb4SELW64VTFuxeesUaTBKOejGA
var cities = [
    {
        city: 'Toronto',
        desc: 'This is the best city in the world!',
        lat: 43.7000,
        long: -79.4000
    },
    {
        city: 'New York',
        desc: 'This city is aiiiiite!',
        lat: 40.6700,
        long: -73.9400
    },
    {
        city: 'Chicago',
        desc: 'This is the second best city in the world!',
        lat: 41.8819,
        long: -87.6278
    },
    {
        city: 'Los Angeles',
        desc: 'This city is live!',
        lat: 34.0500,
        long: -118.2500
    },
    {
        city: 'Las Vegas',
        desc: 'Sin City...\'nuff said!',
        lat: 36.0800,
        long: -115.1522
    }
];

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

            //on click update div with information
            //call the scope for this first
           // alert(marker.event_id);

            $scope.event_details = Event.get({id: marker.event_id});
            console.log($scope.event_details);
            /*
            $scope.eventDetails = function () { //Issues a GET request to /api/products/:id to get a movie to update
                $scope.event = new Event()
                $scope.event_details = $scope.event.get({id: marker.event_id});
                console.log($scope.event_details);
            };*/

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
