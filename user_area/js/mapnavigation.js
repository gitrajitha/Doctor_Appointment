var map;
var geocoder;

function loadMap() {
//    var myLocation = {lat: 32.6105, lng: 35.2879};
//    map = new google.maps.Map(document.getElementById('map'), {
//        zoom: 7,
//        center: myLocation
//    });

//      var image ="img/myloc.png";
//    var marker = new google.maps.Marker({
//      position: myLocation,
//      map: map,
//      icon: image,
//      title: "My Location"
//    });

    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: 32.6105, lng: 35.2879}
    });
    directionsDisplay.setMap(map);


    calculateAndDisplayRoute(directionsService, directionsDisplay);
    
}






function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    var lat1 = (JSON.parse(document.getElementById('userdet').innerHTML))[0].lat;
    var lan1 = (JSON.parse(document.getElementById('userdet').innerHTML))[0].lon;
    var lat2 = (JSON.parse(document.getElementById('allData').innerHTML))[0].lat;
    var lan2 = (JSON.parse(document.getElementById('allData').innerHTML))[0].lng;

    var orgin = lat1 + ', ' + lan1;
    //var orgin = "32.815165, 34.996957";
    var destination = lat2 + ', ' + lan2;
    console.log(destination);
    directionsService.route({
        origin: orgin,
        destination: destination,
        travelMode: 'DRIVING'
    }, function(response, status) {
        if (status === 'OK') {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}