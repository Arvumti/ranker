<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Laravel Authentication</title>
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
            <!-- Determining if a user is authenticated --> 
            @if (Auth::check())
        		  <li>{{ HTML::link('users/logout', 'Logout') }}</li>   
            @else
            	<li>{{ HTML::link('users/register', 'Register') }}</li>   
            	<li>{{ HTML::link('users/login', 'Login') }}</li>  
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

  	<div class="container">
         @yield('content')
    </div>
</body>
</html>