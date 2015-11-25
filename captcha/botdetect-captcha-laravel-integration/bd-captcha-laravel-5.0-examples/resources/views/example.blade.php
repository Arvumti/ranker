<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel Basic BotDetect CAPTCHA Example</title>
	<link href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
	
	<!-- include the BotDetect layout stylesheet -->
	<link href="{{ CaptchaUrls::LayoutStylesheetUrl() }}" type="text/css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">BotDetect Captcha</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="{{ URL::to('example') }}">Basic Example</a></li>
					<li><a href="{{ URL::to('contact') }}">Form Example</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Basic Example</div>
				<div class="panel-body">

					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					<form class="form-horizontal" role="form" method="POST" action="{{ URL::to('example') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<!-- Captcha image html-->
								{!! $captchaHtml !!}
							</div>
							<div class="col-md-6 col-md-offset-4">
								<!-- Captcha code user input textbox -->
					            <input type="text" class="form-control" id="CaptchaCode" name="CaptchaCode" style="width: 276px; margin-top: 5px">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
