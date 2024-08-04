function initializeMap(userLat, userLon) {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: userLat, lng: userLon },
        zoom: 14
    });

    var userMarker = new google.maps.Marker({
        position: { lat: userLat, lng: userLon },
        map: map,
        title: 'Your Location'
    });

    fetchNearbyHospitals(userLat, userLon, map);
}

function fetchNearbyHospitals(lat, lon, map) {
    fetch(`/api/hospitals?latitude=${lat}&longitude=${lon}`)
        .then(response => response.json())
        .then(data => {
            data.hospitals.forEach(hospital => {
                new google.maps.Marker({
                    position: { lat: hospital.latitude, lng: hospital.longitude },
                    map: map,
                    title: hospital.name
                });
            });
        })
        .catch(error => console.error('Error fetching hospitals:', error));
}

function getUserLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var userLat = position.coords.latitude;
            var userLon = position.coords.longitude;
            initializeMap(userLat, userLon);
        }, function(error) {
            console.error('Error getting user location:', error);
            // Handle the error or provide default location
        });
    } else {
        console.error('Geolocation is not supported by this browser.');
        // Handle the case where geolocation is not supported
    }
}

document.addEventListener('DOMContentLoaded', getUserLocation);
