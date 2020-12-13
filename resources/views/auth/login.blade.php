<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/login_util.css') }}">
	<link rel="stylesheet" href="{{ asset('css/login_main.css') }}">
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30 shadow">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf
					<span class="login100-form-title p-b-55">
						Login
					</span>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Valid username is required: myname">
						<input class="input100" type="text" name="identity" placeholder="Username"
							value="{{ old('identity') }}" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="lnr lnr-user"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					@error('identity')
					<span>
						<strong style="text-align: center; color: crimson">{{ $message }}</strong>
					</span>
					@enderror
					<div class="container-login100-form-btn p-t-25">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('js/login_main.js') }}"></script>
</body>

</html>