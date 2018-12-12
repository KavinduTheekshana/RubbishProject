@extends('layouts.admin')

@section('content')
    <section class="content-header">
      <h1>
        Drop Locations
        <small>All Location That You have Put Rubbish</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Drop Locations</li>
        <li class="active">Add Drop Location</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Locations</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>

          </div>
        </div>
        <div class="box-body">

          <div id="map" height="460px" width="100%"></div>
          <div id="form">
            <table>
            <tr><td>Name:</td> <td><input type='text' id='name'/> </td> </tr>
            <tr><td>Address:</td> <td><input type='text' id='address'/> </td> </tr>
            <tr><td>Type:</td> <td><select id='type'> +
                       <option value='bar' SELECTED>bar</option>
                       <option value='restaurant'>restaurant</option>
                       </select> </td></tr>
                       <tr><td></td><td><input type='button' value='Save' onclick='saveData()'/></td></tr>
            </table>
          </div>
          <div id="message">Location saved</div>
          <script>
            var map;
            var marker;
            var infowindow;
            var messagewindow;

            function initMap() {
              var california = {lat: 37.4419, lng: -122.1419};
              map = new google.maps.Map(document.getElementById('map'), {
                center: california,
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
              var type = document.getElementById('type').value;
              var latlng = marker.getPosition();
              var url = 'phpsqlinfo_addrow.php?name=' + name + '&address=' + address +
                        '&type=' + type + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

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
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdZSzpsXN3MTDRHVU4FgILd176ZO80rec&callback=initMap">
          </script>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    @endsection
