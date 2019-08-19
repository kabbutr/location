 <?php
    include('index_details.php');
   $title = (isset($_GET['title']) ? $_GET['title'] : '');




    $query="SELECT * FROM location(title,content, lat)WHERE title='$title'";
    $data = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($data);
    ?>
    
    
<!DOCTYPE html>
<html>
<head>
    <title>Google location</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />

    <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>


    <style>
        body {
        padding: 0;
        margin: 0;
        }
        html, body, #map {
        height: 80%;
        width:100%;
    }
    </style>
</head>
<body>
<div id="map"></div>
<p id="demo"></p>
<button onclick="getLocation()">click here</button>

<script>
   
    var map = L.map('map');
    var x = document.getElementById("demo");

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibmlzaGFqYWluIiwiYSI6ImNqemUzdXE1ZTAwcnozbG95cHM1OXBxbzUifQ.SWgGaZ6j_23hpqg0zF971Q', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="http://mapbox.com">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(map);

    function onLocationFound(e) {
        var radius = e.latlng ;
          

        L.marker(e.latlng).addTo(map)
            .bindPopup("You are at " + radius + " now").openPopup();

        L.circle(e.latlng, radius).addTo(map);
        <?php $abc = "<script>document.write(radius)</script>"?> 
    }
function onLocationError(e) {
        alert(e.message);
    }

    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);

    map.locate({setView: true, maxZoom: 18});

    function addMarker(e){
// Add marker to map at click location; add popup window
var newMarker = new L.marker(e.latlng).addTo(map);
}

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "and longitude " + position.coords.longitude;
}
    </script>










<form method="post" action="index_details.php">
    <div class="lat">
     latitude <input type="text" name="lat" value="<?php echo $title;?>">  

    </div>
    <div class="lan">
       langitude <input type="text" name="lan">  
    </div>
    <div class="title">
       title <input type="text" name="title">  
    </div>
    <div class="content">
        content<input type="text" name="content">  
    </div>
<input type="submit" name="submit" value="submit"> 





    
       
</body>
</html>