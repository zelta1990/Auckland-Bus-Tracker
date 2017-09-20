<?php
$active = "home";

require_once 'include/header.php';
require_once 'include/config.php';
require_once 'requests.php';

    $url = "https://api.at.govt.nz/v2/gtfs/routes";
$params = array();
$results = apiCall($APIKey, $url, $params);
// Tell the browser we are sending back json
header('Content-Type: application/json');
print $results[0];
?>


<div id="map"></div>

<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyWgwz17ZqlktEYZ9P8SvdxGDFghGDx8k&callback=initMap">
  </script>
<script src="scripts/map.js"></script>


<script>
    $(document).ready(function () {\
</script>
<?php
require_once 'include/footer.php';
?>

