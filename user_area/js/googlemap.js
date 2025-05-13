var map;
var geocoder;

function loadMap() {
    var myLocation = {lat: 32.6105, lng: 35.2879};
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: myLocation
    });

//      var image ="img/myloc.png";
//    var marker = new google.maps.Marker({
//      position: myLocation,
//      map: map,
//      icon: image,
//      title: "My Location"
//    });


    var cdata = JSON.parse(document.getElementById('data').innerHTML);
    geocoder = new google.maps.Geocoder();
    codeAddress(cdata);

    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    showAllColleges(allData)

    var userdet = JSON.parse(document.getElementById('userdet').innerHTML);
    showMyLocation(userdet)
}

function showAllColleges(allData) {
    var infoWind = new google.maps.InfoWindow;
    Array.prototype.forEach.call(allData, function(data) {
        var content = document.createElement('div');
        var strong = document.createElement('strong');

        strong.textContent = data.name;
        content.appendChild(strong);

//        var img = document.createElement('img');
//        img.src = 'img/mark.png';
//        img.style.width = '100px';
//        content.appendChild(img);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.lat, data.lng),
            map: map
            
        });

        marker.addListener('mouseover', function() {
            infoWind.setContent(content);
            infoWind.open(map, marker);
        })
    })
}

function showMyLocation(allData) {
    var infoWind = new google.maps.InfoWindow;
    Array.prototype.forEach.call(allData, function(data) {
        var content = document.createElement('div');
        var strong = document.createElement('strong');

        strong.textContent = data.name;
        content.appendChild(strong);

//        var img = document.createElement('img');
//        img.src = 'img/mark.png';
//        img.style.width = '100px';
//        content.appendChild(img);

        var image = "img/myloc.png";

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.lat, data.lon),
            map: map,
            icon: image,
            title: "My Location"
        });

//        marker.addListener('mouseover', function() {
//            infoWind.setContent(content);
//            infoWind.open(map, marker);
//        })
    })
}
function codeAddress(cdata) {
    Array.prototype.forEach.call(cdata, function(data) {
        var address = data.name + ' ' + data.address;
        geocoder.geocode({'address': address}, function(results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                var points = {};
                points.id = data.id;
                points.lat = map.getCenter().lat();
                points.lng = map.getCenter().lng();
                updateCollegeWithLatLng(points);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    });
}

function updateCollegeWithLatLng(points) {
    $.ajax({
        url: "action.php",
        method: "post",
        data: points,
        success: function(res) {
            console.log(res)
        }
    })

}