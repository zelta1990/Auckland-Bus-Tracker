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
             //   document.getElementById("map").innerHTML = JSON.parse(this.responseText);
                var target =JSON.parse(this.responseText);
                if(target.response.entity!=null){
                 for (var i=0;i< target.response.entity.length;i++){
               //     alert(target.response.entity[0].vehicle.vehicle.id);
                    setMarkers(target.response.entity[i].vehicle);
                }

                }else{
                   alert('No vehicles running on this route!');
                }
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

