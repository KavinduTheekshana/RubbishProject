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
          <!-- <div id="form">
             <table>
             <tr><td>Name:</td> <td><input type='text' id='name'/> </td> </tr>
             <tr><td>Address:</td> <td><input type='text' id='address'/> </td> </tr>
             <tr><td>Type:</td> <td><select id='type'> +
                        <option value='bar' SELECTED>bar</option>
                        <option value='restaurant'>restaurant</option>
                        </select> </td></tr>
                        <tr><td></td><td><input type='button' value='Save' onclick='saveData()'/></td></tr>
             </table>
           </div> -->
           <!-- <div id="message">Location saved</div> -->


           <script>
    var map;

    function initMap() {
        var california = {lat: 37.4419, lng: -122.1419};
        map = new google.maps.Map(document.getElementById('map'), {
          center: california,
          zoom: 13
        });
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
