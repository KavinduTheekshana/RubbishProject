<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Auth/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Auth/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Auth/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Auth/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Auth/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Auth/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Auth/css/util.css">
    <link rel="stylesheet" type="text/css" href="../Auth/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('password.email') }}">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


										@if (count($errors) > 0)
											<div class="alert alert-danger">
											<strong>Whoops!</strong> There were some problems with your input.<br>
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif

					<span class="login100-form-title p-b-32">
						Reset Password
					</span>

					<span class="txt1 p-b-11">
						Email
          </span>

					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                        <input id="email" type="email" class="input100" value="{{ old('email') }}" required name="email">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

						<span class="focus-input100"></span>
					</div>





					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Send Password Reset Link
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="../Auth/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Auth/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../Auth/bootstrap/js/popper.js"></script>
	<script src="../Auth/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Auth/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Auth/daterangepicker/moment.min.js"></script>
	<script src="../Auth/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../Auth/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../Auth/js/main.js"></script>

</body>
</html>
