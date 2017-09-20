function initMap() {
        var auckland = {lat: -36.8485, lng: 174.7633};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: auckland
        });
        var marker = new google.maps.Marker({
          position: auckland,
          map: map
        });
      }
