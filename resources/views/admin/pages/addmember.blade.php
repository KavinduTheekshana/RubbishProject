@extends('layouts.admin')

@section('content')
    <section class="content-header">
      <h1>
        ADD MEMBERS
        <small>Add all Types of Members</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Member</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Members And Save Database</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{action('ProfileController@addProfile')}}" method="POST" enctype="multipart/form-data">
              @csrf
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

              <div class="box-body">

                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control"  placeholder="Enter Full Name" name="name">
                </div>
                <div class="form-group">
                  <label >Email address</label>
                  <input type="email" class="form-control"  placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label >Password</label>
                  <input type="password" class="form-control"  placeholder="Password" name="password">
                </div>
                <div class="form-group">
                  <label >Password Confirm</label>
                  <input type="password" class="form-control"  placeholder="Password Confirm" name="password_confirmation">
                </div>

                <div class="form-group">
                  <label >Date of Birth</label>
                  <div class="row">
                  <div class="col-xs-2">
                    <input type="text" class="form-control" placeholder="DD" name="date">
                  </div>
                  <div class="col-xs-2">
                    <input type="text" class="form-control" placeholder="MM" name="month">
                  </div>
                  <div class="col-xs-3">
                    <input type="text" class="form-control" placeholder="YYYY" name="year">
                  </div>
                </div>
                </div>

                <div class="form-group">
                  <label>Gender</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" value="Male" checked>
                        Male
                    </label>
                  </div>

                  <div class="radio">
                    <label>
                      <input type="radio" name="gender"  value="Female">
                      Female
                    </label>
                  </div>
                  </div>

                <div class="form-group">
                  <label >City</label>
                  <input type="text" class="form-control" placeholder="Enter Your City" name="city">
                </div>

                <div class="form-group">
                  <label>Suburb</label>
                  <input type="text" class="form-control" placeholder="Enter Your Suburb" name="suburb">
                </div>

                <div class="form-group">
                  <label>Job Type</label>
                  

                  <div class="radio">
                    <label>
                      <input type="radio" name="job"  value="Staff">
                      Staff
                    </label>
                  </div>

                  <div class="radio">
                    <label>
                      <input type="radio" name="job"  value="Captain">
                      Captain
                    </label>
                  </div>

                  <div class="radio">
                    <label>
                      <input type="radio" name="job" value="Volunteer">
                      Volunteer
                    </label>
                  </div>
                  </div>


                <div class="form-group">
                  <label for="exampleInputFile">Input Profile Picture</label>
                  <input type="file" id="profile_pic" name="profile_pic">
                  <div id="profile_pic"></div>
                </div>

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add Member</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div id="uploadimageModal" class="modal" role="dialog">
      	<div class="modal-dialog">
      		<div class="modal-content">
            		<div class="modal-header">
              		<button type="button" class="close" data-dismiss="modal">&times;</button>
              		<h4 class="modal-title">Upload & Crop Image</h4>
            		</div>
            		<div class="modal-body">
              		<div class="row">
        					<div class="col-md-8 text-center">
      						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
        					</div>
        					<div class="col-md-4" style="padding-top:30px;">
        						<br />
        						<br />
        						<br/>
      						  <button class="btn btn-success crop_image">Crop & Upload Image</button>
      					</div>
      				</div>
            		</div>
            		<div class="modal-footer">
              		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            		</div>
          	</div>
          </div>
      </div>





      <div class="col-md-6">
        <!-- USERS LIST -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Latest Members</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <ul class="users-list clearfix">
              @foreach($members as $row)
              <li>
                <img src="{{$row->profile_pic}}" alt="User Image" style="border-radius: 50%;width: 80px;height: 80px;
                overflow: hidden;position: relative;display: inline-block;">
                <a class="users-list-name" href="viewprofile/{{$row->id}}">{{$row->name}}</a>
                <span class="users-list-date">{{$row->job}}</span>
              </li>
              @endforeach
            </ul>
            <!-- /.users-list -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-center">
              <ul class="pagination pagination-sm no-margin ">
                {!! $members->links(); !!}
              </ul>
          </div>
          <!-- /.box-footer -->
        </div>
        <!--/.box -->
      </div>

  </section>

  @endsection
