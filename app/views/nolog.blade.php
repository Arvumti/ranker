<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Unmask reveals the real face of the people">
	<meta name="author" content="">

	<title>{{Lang::get('messages.nologHedLblUnmask')}}</title>
	<link href="{{ URL::asset('css/typeahead.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('estilo.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('app.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('foundation/css/foundation.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('foundation/css/normalize.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet">
	
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="assets/js/html5shiv.js"></script>
	  <script src="assets/js/respond.min.js"></script>
	<![endif]-->

	<link rel="shortcut icon" href="placeholders/ico/" type="image/x-icon">
	<link rel="apple-touch-icon" href="placeholders/ico/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="placeholders/ico/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="placeholders/ico/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="placeholders/ico/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="placeholders/ico/apple-touch-icon-144x144.png">
  
</head>
<body id="fondo_app" >

	<header>
			<!--div class="off-canvas-wrap barra_inicio" data-offcanvas-->
				<!--div class="inner-wrap"-->
					<div class="menu_bar"><!--tab-bar foundation -->
						
						<!--div class="contenedor_menu"-->
							<!--section class="left-small">
							<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
						</section-->
						<!--&nbsp;&nbsp;&nbsp;-->
							<a href="{{ URL::to('/') }}">
								<!--div id="titulo_app">
									<h1 class="title">{{Lang::get('messages.baseHedTitUnmask')}}</h1>
								</div-->
							</a>
							<!--div class="busqueda">
								<input type="text" class="base-busqueda txt-buscar" placeholder="{{Lang::get('messages.basePlhBusca')}}">
								<div class="busqueda-resultado isHidden">
										
								</div>
							</div>
							<div class="buscar">
								<button type="button" class="base-button btn_buscar"><i class="icon-buscar"></i></button>
								<a class="busca_ava" data-reveal-id="busquedaAva"><h6>{{Lang::get('messages.baseBsaTitBusqueda')}}</h6></a>
							</div-->
							<div id="tool_titulo">
								<h6 style="width:100%">toolbar +</h6>
							</div>
							<div class="barra_opciones">
								<ul id="opciones_cuadros">
									<li class="menu_activo"><a id="principales" href="{{ URL::to('principal') }}" style="color:#a7a9ab;">{{Lang::get('messages.baseOptLblMuro')}}</a></li>
									
								</ul>
							</div>
							<div class="logo_espacio">
								logo
							</div>
							
						<!--/div-->

						
					</div>
		</header>

		<section id="tool_bar" style="height:auto;"> 
			<div class="area_superior" style="height:250px;"><!-- contiene la parte superior del tool bar-->
				<div class="registro_user ">
					<div class="registro_titulo"><h4>Registration</h4></div>
					<div class="imagen_registro">
						<img src="{{ URL::asset('img\\gente\\masca.png') }}">
					</div>
				</div>

			</div>	
			<div class="area_inferior">
				<div class="small-12 columns">
					{{ Form::open(array('url' => '/crear_cuenta', 'data-abide', 'class' => 'row')) }}
					<div class="Hidden">	
	
				
							
							<input type="text" name="mail" value="{{Input::old('mail')}}" placeholder="{{Lang::get('messages.nologManLblCorreo')}}"/>
		
					</div>
					<div class="small-12 columns">
				
							<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.nologTltAlias')}}">
								<input type="text" name="alias" value="{{Input::old('alias')}}" placeholder="{{Lang::get('messages.nologManLblAlias')}}" required/>
							</span>
						<small class="error">{{Lang::get('messages.nologManLblCorreoErr')}}</small>
						@if($errors->any())
							@foreach ($errors->get('nombre') as $error)
								<div class="label alert" role="alert">** {{ $error }}</div>
							@endforeach
						@endif
					</div>
					<div class="small-12 columns">
					
							<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.nologTltPass')}}">
								<input type="password" id="password" name="password" placeholder="{{Lang::get('messages.nologManLblContrasenia')}}" required/>
							</span>				
						<small class="error">{{Lang::get('messages.nologManLblContraseniaErr')}}</small>
					</div>
					<div class="small-12 columns">
					
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.nologTltConf')}}">
							<input type="password" data-equalto="password" name="password_rep" placeholder="{{Lang::get('messages.nologManLblConfirmContrasenia')}}" required/>
						</span>
						<small class="error">{{Lang::get('messages.nologManLblComfirmContraseniaErr')}}</small>
						@if($errors->any())
							@foreach ($errors->get('pass') as $error)
								<div class="label alert" role="alert">** {{ $error }}</div>
							@endforeach
						@endif
					</div>
					</div>
					<div class="small-12 columns">
				
							<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.nologTltPais')}}">

							<!--select name="pais">
								  @foreach($data['paises'] as $pais)
									<option value="{{ $pais->idPais }}">{{ $pais->nombre }}</option>
								@endforeach
							</select-->
								<input type="text" name="pais" class="typeahead" placeholder="{{Lang::get('messages.nologManLblPais')}}"value="{{Input::old('pais')}}"/>
							</span>
					</div>
					<div class="small-12 columns">
						
							<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.nologTltCiu')}}">	
							<!--select name="ubicacion">
								@foreach($data['ubicaciones'] as $ubicacion)
									<option value="{{ $ubicacion->idUbicacion }}">{{ $ubicacion->nombre }}</option>
								@endforeach
							</select-->
								<input type="text" name="estado" class="typeahead" placeholder="{{Lang::get('messages.nologManLblCiudad')}}" value="{{Input::old('estado')}}"/>
							</span>
					</div>
			        <div class="large-12 columns">
			          	<div class="large-12">
				          <label for="CaptchaCode"></label><br>
					        {{ $data['captchaHtml'] }}
					    </div>
						<div class="large-12"style="margin-top:3em">
						
							<input id="CaptchaCode" class="form-control" name="CaptchaCode" placeholder="{{Lang::get('messages.nologManLblCapcha')}}"type="text" style="text-transform: uppercase;">
						</div>				
					</div>
					<div class="small-12 columns" style="text-align:center;">
						<label>
							<input type="checkbox" name="politicas" value="acepto" />{{Lang::get('messages.nologManLblTerminos')}} <a href="{{URL::to('unmask')}}" target="_blank">{{Lang::get('messages.nologManLnkTerminos')}}</a>
						</label>
						<button type="submit" class="button rojo_fondo" >{{Lang::get('messages.nologManBtnGuardar')}}</button>
						
					</div>
					<div class="small-12 columns">
						@if($errors->any())
							@foreach ($errors->all() as $error)
								@if($error != 'The Alias already exist.' && $error != 'Check your password')
								<div class="label alert" role="alert">** {{ $error }}</div>
								@endif
							@endforeach
						@endif
					</div>
					{{ Form::close() }}
			  </div>
			</div>
			
		</section>
   	
	
	  
	
		
  
 	<script>
		var url = window.location.origin + '/public/';//lara/
	
	  //document.write('<script src=foundation/js/vendor/' + ('__proto__' in {} ? 'zepto' : 'jquery')  + '.js><\/script>');
		$(document).on('ready', inicio_nl);

		function inicio_nl () {
			$(document).foundation();
			debugger
			var jsonPa = {
				elem: $('input.typeahead[name="pais"]'),
				dKey: 'nombre',
				modulo: 'paises',
			};
			typeahead(jsonPa);

			var jsonEs = {
				elem: $('input.typeahead[name="estado"]'),
				dKey: 'nombre',
				modulo: 'estadoz',
			};
			typeahead(jsonEs);
		}
	</script>
	
<script type="text/javascript" src="{{ URL::asset('foundation/js/vendor/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('foundation/js/vendor/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.offcanvas.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.tooltip.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/typeahead.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bloodhound.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/main_app.js') }}"></script>


	
</body>
<html>