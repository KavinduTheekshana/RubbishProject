@extends('layouts.admin')

@section('content')
    <section class="content-header">
      <h1>
        Member Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('members')}}"> Members</a></li>
        <li class="active">Member Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile ">
              <img class="profile-user-img img-responsive img-circle " src="{{$user->profile_pic}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$user->name}}</h3>

              <p class="text-muted text-center">{{$user->job}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Gender</b> <a class="pull-right">{{$user->gender}}</a>
                </li>
                <li class="list-group-item">
                  <b>City</b> <a class="pull-right">{{$user->city_name}}</a>
                </li>
                <li class="list-group-item">
                  <b>Suburb</b> <a class="pull-right">{{$user->suburb}}</a>
                </li>
                <li class="list-group-item">
                  <b>Birthday</b> <a class="pull-right">{{$user->birthday}}</a>
                </li>
              </ul>

              <a href="" class="btn btn-success btn-block"><b>Send Email</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
  @endsection
