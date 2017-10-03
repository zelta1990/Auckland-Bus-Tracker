function initMap() {
        var auckland = {lat: -36.8485, lng: 174.7633};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: auckland
        });
        var marker = new google.maps.Marker({
          position: auckland,
          map: map
        });
}/*        var customLable = {
            vehicle:{
              label: 'V'
            }
        };

        var infoWindow = new google.maps.InfoWindow;

        downloadUrl('getTrip.php', function(data){
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

function setMarker(newlat,newlon){
    var location = {lat:newlat, lon:newlon};
    var marker = new google.maps.Marker({
        position: location,
        map: map
       });
}

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

function doNothing() {}*/
