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
        <div class="box-body" style="height: 100%;">

          @if (count($errors) > 0)
            <div style="padding:.75rem 1.25rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem;
              color:#721c24;background-color:#f8d7da;border-color:#f5c6cb;">
            <strong>Whoops!</strong> There were some problems with your input.<br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif



          <div style="height: 520px; width:100% " id="map" height="460px" width="100%"></div>

          <div  id="form"  >
            <table style="margin:10px;">
            <tr><td>Location Name:</td> <td><input  type='text' id='name'/> </td> </tr>
            <tr><td>Address:</td> <td><input  type='text' id='address'/> </td> </tr>
            <tr><td>City:</td> <td><input  type='text' id='city'/> </td> </tr>

             <tr><td></td><td><input class="btn btn-success" type='button' value='Save' onclick='saveData()'/></td></tr>
            </table>
          </div>
          <!-- <div id="message">Location saved</div> -->

          <script>
            var map;
            var marker;
            var infowindow;
            var messagewindow;

            function initMap() {
              var Colombo = {lat: 6.9271, lng: 79.8612};
              map = new google.maps.Map(document.getElementById('map'), {
                center: Colombo,
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
              var city = document.getElementById('city').value;
              var latlng = marker.getPosition();
              var url = '/save?name=' + name + '&address=' + address +
                        '&city=' + city + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

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
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMjwyKg-mHUw2I6fNvJm3NrlxF_hBYS_M&callback=initMap">
          </script>




        </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    @endsection
