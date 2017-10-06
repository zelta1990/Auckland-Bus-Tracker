var map;
function initMap() {
        var auckland = {lat: -36.8485, lng: 174.7633};
         map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: auckland
        });
        var marker = new google.maps.Marker({
          position: auckland,
          map: map
        });
}


function setMarkers(data){
        var customLabel = {
            bus: {
              label: 'B'
            }
        };
        var infowincontent = document.createElement('div');
        var strong = document.createElement('strong');
        strong.textContent ="Bus id: ".concat(data.vehicle.id);
        infowincontent.appendChild(strong);
        infowincontent.appendChild(document.createElement('br'));
        
        var text = document.createElement('text');
        text.textContent = "start time: ".concat(data.trip.start_time);
        infowincontent.appendChild(text);
        var infoWindow = new google.maps.InfoWindow();
        
        var lat1 = data.position.latitude;
        alert(lat1);
        var lon1 = data.position.longitude;
        var point = new google.maps.LatLng(lat1, lon1);
        var vid = data.vehicle.id;
        var icon = customLabel['bus'] || {};
        var marker = new google.maps.Marker({
           position: point,          
           map:map,
           label: icon.label     
           }); 
        marker.addListener('click', function() {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
        });
      //  alert('set marker');
      //  marker.setMap(map);
    //    alert('hsda');
    
}
