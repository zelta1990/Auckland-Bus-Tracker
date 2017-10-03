<?php
$active = "home";
require_once 'include/header.php';
require_once 'include/config.php';
require_once 'requests.php';

$conn = new mysqli($hostname, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM routes";
$result = $conn->query($sql);
echo '<select id="DROP DOWN ROUTE", onchange = "showVehicles(this.value)">'; //opens drop down box
//echo '<select id="DROP DOWN ROUTE", onchange = "getRouteName(this.value)">'; //opens drop down box

$query = "SELECT distinct route_short_name FROM `akl_transport`.`routes`";
if ($result=$conn->query($query)) {
    echo '<option value="Select a route">Select a route</option>';
    while($row = $result->fetch_assoc()) {
    echo '<option value="'.$row['route_short_name'].'">'.$row['route_short_name'].'</option>';
}         
} else {
    echo "0 results";
}	
	echo '</select>'; //closes the drop doqn box
$conn->close();
?>

<div id="map"></div>

<script src="scripts/map.js"></script>

<script>
/*var customLable = {
    vehicle:{
       label: 'V'
    }
};
function initMap() {
        var auckland = {lat: -36.8485, lng: 174.7633};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: auckland
        });
        setMarker(auckland);
}
function setMarker(newlat,newlon){
    var location = {lat:newlat, lon:newlon};
    var marker = new google.maps.Marker({
        position: location,
        map: map
       });
}

function getRouteName(str){
    return str;
}
var routename = getRouteName(str);


function updateMap() {
        var auckland = {lat: -36.8485, lng: 174.7633};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: auckland
        });
        setMarker(auckland);
 
        var infoWindow = new google.maps.InfoWindow;


        downloadUrl(routename, function(data){
           var xml = data.responseXML;
           var markers = xml.documentElement.getElementsByTagName('vehicle');
           Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var route_id = markerElem.getAttribute('route_id');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('latitude')),
                  parseFloat(markerElem.getAttribute('longitude')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = id;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = route_id;
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }


}


function downloadUrl(routename, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET',"getTrip.php?q="+routename, true);
        request.send(null);
      }

function doNothing() {}*/
function showVehicles(str) {
    alert("You selected Route "+str);
    if (str == "") {
        document.getElementById("map").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("map").innerHTML = JSON.parse(this.responseText);
            }
        };
        xmlhttp.open("GET","getTrip.php?q="+str,true);

        xmlhttp.send();
    }
}
</script>

<div id="map"></div>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyWgwz17ZqlktEYZ9P8SvdxGDFghGDx8k&callback=initMap">
</script>




<?php
require_once 'include/footer.php';
?>


