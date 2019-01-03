@extends('layouts.Volunteer')

@section('content')
<section class="content-header">
  <h1>
    Submit Loactions
  </h1>


</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">

        <div class="form-group">
          <div id="map" style="height: 550px; width: 100%;"></div>
        </div>

      </div>
      <!-- /.box -->

    </div>
    <!--/.col (left) -->

    <!--/.col (right) -->
  </div>
  <!-- /.row -->
</section>




<script>

      var map;
      function initAutocomplete(){
          console.log(document.getElementById('map'));
          map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 6.9271, lng: 79.8612},
              zoom: 13
          });

          @foreach($location as $row)

          var con{{$row->id}}='{{$row->title}}'

          var infowindow{{$row->id}} = new google.maps.InfoWindow({
            content: con{{$row->id}}
          });

          var marker{{$row->id}} = new google.maps.Marker({
              position: {
                  lat: {{$row->lat}},
                  lng: {{$row->lng}}
              },
              map: map,
              draggable: false,
          });



          marker{{$row->id}}.addListener('click', function() {
          infowindow{{$row->id}}.open(map, marker{{$row->id}});
        });

  @endforeach

          var input = document.getElementById('pac-input');
          var searchBox = new google.maps.places.SearchBox(input);
          google.maps.event.addListener(searchBox, 'places_changed',function(){
              var places = searchBox.getPlaces();
              var bounds = new google.maps.LatLngBounds();
              var i, place;
              for (i=0; place=places[i]; i++) {
                  bounds.extend(place.geometry.location);
                  marker.setPosition(place.geometry.location);
              }
              map.fitBounds(bounds);
              map.setZoom(15);
          });
      }

  </script>


</script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMjwyKg-mHUw2I6fNvJm3NrlxF_hBYS_M&libraries=places&callback=initAutocomplete"
          async defer></script>
@endsection
