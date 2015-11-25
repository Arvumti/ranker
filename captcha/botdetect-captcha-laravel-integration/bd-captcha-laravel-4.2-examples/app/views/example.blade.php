<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Laravel Basic BotDetect CAPTCHA Example</title>
	{{ HTML::style('css/bootstrap.min.css') }}

	<!-- include the BotDetect layout stylesheet -->
	{{ HTML::style(CaptchaUrls::LayoutStylesheetUrl()) }}

	<style type="text/css">
		body { padding: 70px 0 }
		.container{ width: 980px !important }
	</style>
</head>
<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">BotDetect Captcha</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          		<li>{{ HTML::link('example', 'Basic Example') }}</li>   
              <li>{{ HTML::link('contact', 'Form Example') }}</li>  
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


  	<div class="container">
  	
			<h3>Laravel Basic BotDetect CAPTCHA Example</h3><hr>

			@if (Session::has('status'))
        <div class="alert alert-success">
          {{ Session::get('status') }}
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

	    {{ Form::open(array('url' => 'example')) }}

				<div class="form-group">
						<!-- Captcha image html-->
            {{ $captchaHtml }}
        </div>

				<div class="row">
		        <div class="form-group col-sm-4">
		            {{ Form::label('CaptchaCode', 'Retype the characters from the picture') }}

		            <!-- Captcha code user input textbox -->
		            {{ Form::text('CaptchaCode', null, array(
		                    'id' => 'CaptchaCode',
		                    'class' => 'form-control'
		                ))
		            }}
		        </div>
		    </div>

		    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

			{{ Form::close() }}
	</div>
</body>
</html>