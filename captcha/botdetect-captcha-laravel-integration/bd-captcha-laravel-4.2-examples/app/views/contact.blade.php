<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Laravel Form Validation BotDetect CAPTCHA Example</title>
    {{ HTML::style('css/bootstrap.min.css') }}

    <!-- include the BotDetect layout stylesheet -->
    {{ HTML::style(CaptchaUrls::LayoutStylesheetUrl()) }}

    <style type="text/css">
        body { padding: 70px 0 }
        .container{ width: 980px !important }
        .error { color: red }
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
	    <h2>Laravel Form Validation BotDetect CAPTCHA Example</h2><hr>

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

    	{{ Form::open(array('url' => 'contact')) }}
    		<div class="form-group">
        		{{ Form::label('name', 'Name') }}
        		{{ Form::text('name', Input::old('name'), array(
                    'class' => 'form-control'
                ))
             }}
        	</div>

        	<div class="form-group">
        		{{ Form::label('email', 'Email') }}
        		{{ Form::text('email', Input::old('email'), array(
                        'class' => 'form-control'
                    ))
                }}
        	</div>

        	<div class="form-group">
        		{{ Form::label('subject', 'Subject') }}
        		{{ Form::text('subject', Input::old('subject'), array(
                        'class' => 'form-control'
                    )) 
                }}
        	</div>

        	<div class="form-group">
        		{{ Form::label('message', 'Message') }}
        		{{ Form::textarea('message', Input::old('message'), array(
                        'class' => 'form-control'
                    )) 
                }}
        	</div>

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

    		{{ Form::submit('Send', array('class' => 'btn btn-primary')) }}    	

    	{{ Form::close() }}
    </div>
</body>
</html>