<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blocked</title>
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link rel="stylesheet" href="Admin/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <style media="screen">
      h1
      {
        font-family: 'Poiret One', cursive;
        text-align: center;
      }
      .jumbotron {
        position: absolute;
        top: 40%;
        left:50%;
        transform: translate(-50%,-50%);
        background-color: #fff;
        color: red;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>Your Account Is Temporary Blocked. Please Contact Admin</h1>

            <input id="email" type="text" class="form-control" name="email" placeholder="Email">
        <br>
        <div class="form-group">
          <textarea placeholder="Request Message" class="form-control" rows="5" id="comment"></textarea>
        </div>
        <div class="pull-right">
          <a href="logout" class="btn btn-default">&nbsp&nbsp&nbsp&nbsp Log Out &nbsp&nbsp&nbsp&nbsp</a>
          <button type="button" class="btn btn-default">&nbsp&nbsp&nbsp&nbsp Send Message &nbsp&nbsp&nbsp&nbsp</button>
        </div>

      </div>



    </div>
  </body>
</html>
