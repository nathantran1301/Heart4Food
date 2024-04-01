<?php

?>
<!DOCTYPE html>
<html lang="en">
<style>
    /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            position: relative; /* Make body a positioning context */
        }

        header {
            background-color: #ffdab9;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        
          header a img {
            width: 30px; /* Adjust size as needed */
            height: auto; /* Maintain aspect ratio */
        }
        
        nav {
            background-color: #ffdab9;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex; /* Use flexbox */
            justify-content: space-evenly; /* Evenly distribute items */
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #f8f9fa; /* Change color on hover */
        }
        
        .container {
            display: flex;
            flex-wrap: wrap; /* Enable wrapping */
            justify-content: space-around; /* Distribute items evenly */
            align-items: flex-start; /* Align items to the top */
            margin-bottom: 20px; /* Add space between container and footer */
        }
        
        .map-container {
            flex: 1;
            position: relative;
        }
        
        .map {
            height: 100%;
            width: 100%;
        }

        .sidebar {
            flex: 0 0 300px;
            background-color: #f2f2f2;
            padding: 20px;
            overflow-y: auto;
        }

        .restaurantList {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .restaurantList li {
            margin-bottom: 10px;
        }
        
          footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            width: 100%;
        }
        
    
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nearby Restaurants</title>
    <header>
        <div style="display: flex; justify-content: flex-end;">
        <a href="landing_page.php"><img src="images/home-removebg-preview.png" alt="Home"></a>
    </header>
    <!-- Navigation bar -->
    <nav>
        <ul>
            <li><a href="connect.php">What's Near Me</a></li>
            <li><a href="marketplace.php">Marketplace</a></li>
            <li><a href="recipes.php">Recipes</a></li>
            <!-- Dropdown menu on each tabs? -->
        </ul>
    </nav>
<main>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCagQ98rHcFaGjTsJWA2_TadRibK1Pzzxo&libraries=places"></script>
    <script>
        var map;
        var placesService;
    
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 40.7128, lng: -74.0060 },
                zoom: 12
            });
            placesService = new google.maps.places.PlacesService(map);
            
            // Request user's location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    // Center the map on the user's location
                    map.setCenter(pos);
                    
                    // Add a marker for the user's location
                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: 'Your Location'
                    });
                }, function() {
                    handleLocationError(true, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, pos) {
            var infoWindow = new google.maps.InfoWindow({ map: map });
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                                  'Error: The Geolocation service failed.' :
                                  'Error: Your browser doesn\'t support geolocation.');
        }

        function findNearbyRestaurants() {
            var request = { // default settings
                    location: map.getCenter(),
                    radius: '2000', // Search within 2000 meters
                    type: ['restaurant'] // Only search for restaurants        
                    }
                placesService.nearbySearch(request, function(results, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                    var list = document.getElementById('restaurantList');
                    list.innerHTML = ''; // Clear previous results

                    for (var i = 0; i < results.length; i++) {
                        var place = results[i];
                        var listItem = document.createElement('li');
                        listItem.textContent = place.name;
                        list.appendChild(listItem);
                    }
                    
                } else {
                    alert('No nearby restaurants found.');
                }
            });
        }
        
    function updateRestaurantTypes() {
        // Code for filtering checked resturants
        request.type = ['restaurant'];

        var asianCheckbox = document.getElementById('asianCheckbox');
        var soulFoodCheckbox = document.getElementById('soulFoodCheckbox');
        var mexicanCheckbox = document.getElementById('mexicanCheckbox');
        var greekCheckbox = document.getElementById('greekCheckbox');
        
        
        if (asianCheckbox.checked) {
        // Add the selected type to the request
            request.type.push('asian');
        }
        if (soulFoodCheckbox.checked) {
            request.type.push('soul');
        }
        if (mexicanCheckbox.checked) {
            request.type.push('mexican');
        }
        if (greekCheckbox.checked) {
            request.type.push('greek');
        }
        findNearbyRestaurants(); // Perform new search based on updated request
    }
    </script>
</main>
<body onload="initMap()">
    <h1>Find Nearby Restaurants</h1>
    <div id="sidebar">
        <!--
        <label><input type="checkbox" onchange="updateRestaurantTypes('asian', this.checked)">Asian</label>
        <label><input type="checkbox" onchange="updateRestaurantTypes('soul_food', this.checked)">Soul Food</label>
        <label><input type="checkbox" onchange="updateRestaurantTypes('mexican', this.checked)">Mexican</label>
        <label><input type="checkbox" onchange="updateRestaurantTypes('greek', this.checked)">Greek</label>
        -->
    <button onclick="findNearbyRestaurants()">Find Nearby Restaurants</button>
    <div id="map" style="height: 400px; margin-top: 20px;"></div>
    
    <h2>Nearby Restaurants:</h2>
    <ul id="restaurantList"></ul>
</body>
</html>
