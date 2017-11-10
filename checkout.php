<?php
session_start();
if(!$_SESSION['s_id']){
  header("location:index.php");
}
$user_id=$_SESSION['s_id'];
?>

<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Locating Pharmacy</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map" height="460px" width="100%"></div>
    <div id="form">
      <table>
      <tr><td>Name:</td> <td><input type='text' id='name'/> </td> </tr>
      <tr><td>Address:</td> <td><input type='text' id='address'/> </td> </tr>
      <tr><td>:</td> <td><input type='hidden' id='pharmacyID' value='<?php echo $user_id; ?>'/> </td> </tr>
      
                 <tr><td></td><td><input type='button' value='Save' onclick='saveData()'/></td></tr>
      </table>
    </div>
    <div id="message"></div>
    <script>
      var map;
      var marker;
      var infowindow;
      var messagewindow;

      function initMap() {
        var harare = {lat:-17.823725 , lng: 31.040007 };
        map = new google.maps.Map(document.getElementById('map'), {
          center: harare,
          zoom: 13
        });

        infowindow = new google.maps.InfoWindow({
          content: document.getElementById('form')
        });

        messagewindow = new google.maps.InfoWindow({
          content: document.getElementById('message')
        });

        google.maps.event.addListener(map, 'click', function(event) {
          marker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });


          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });
        });
      }

      function saveData() {
        var name = escape(document.getElementById('name').value);
        var address = escape(document.getElementById('address').value);
        var pharmacyID = document.getElementById('pharmacyID').value;
        var latlng = marker.getPosition();
        var url = 'phpsqlinfo_addrow.php?name=' + name + '&address=' + address +
                  '&pharmacyID=' + pharmacyID + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

        downloadUrl(url, function(data, responseCode) {

          if (responseCode == 200 && data.length <= 1) {
            infowindow.close();
            messagewindow.open(map, marker);
          }
        });
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request.responseText, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing () {
      }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgOetvwYg76lsO27GCdbpXHpJqhPAXV8E&callback=initMap">
    </script>
  </body>
</html>