<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="google-site-verification" content="UXJfym6CJzFMkysMf1SfByT8JHnas40nTYKAlxlOq3U" />
	<meta name="msvalidate.01" content="5E1424100EBB49232B7E66E157FADB30" />


	<title>Ranker Beta</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="estilo.css" rel="stylesheet">
	<link href="app.css" rel="stylesheet">
	
	<link href="css/estilos.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet"  href="css/lightslider.css"/>

	<link rel='stylesheet'  href='css/flexslider.css' type='text/css' > 
	<link rel="stylesheet" href="css/theme-options.css" media="all">
	<link rel="stylesheet" href="css/colors/default.css" type="text/css" id="colors" />
	
	
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

	<link type="text/css" rel="stylesheet" href="{{ CaptchaUrls::LayoutStylesheetUrl() 
}}">
 <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63044115-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body>

<div class="marco_principal"> 
  <header>
	 <div class="nav-container stickmenu clearfix">
			 <div class="inner">
				
			   <ul class="main-menu">
			   		<li>
						
				  
					</li>

					<li class="multi-level-menu borde_derecho_menu borde_izquierdo_menu" >
						<a href="#inicio"><h5 >Inicio</h5></a>
				  
					</li>

				   <li class="multi-level-menu borde_derecho_menu"><a href="{{ URL::to('') }}"><h5>Qué es RanKer?</h5></a></li>
				   
				   <li class="multi-level-menu borde_derecho_menu">
					<a ><h5 >Promociones</h5></a>
				 
				   </li>
				   <li class="multi-level-menu borde_derecho_menu">
					<a ><h5 >Tu negocio</h5></a>
				 
				   </li>
				  
				   
				  
				</ul>
						  
			   <div id="mobile-menu" class="dl-menuwrapper">
					<button class="dl-trigger"><i class="fa fa-bars"></i></button>
				  
						
					   <ul class="dl-menu">
							<li><a href="#inicio">{{Lang::get('messages.indxNavBtnInicio')}}</a></li>

						   <li><a href="{{ URL::to('unmask') }}">{{Lang::get('messages.indxNavUnmask')}}</a></li>
						   
						   <li>
							<a >{{Lang::get('messages.indxNavLblPoliticasAvisos')}}</a>
						 
						   </li>
						
						   
						</ul>     
						
							   
				</div>
				<div class="loguearte">
					<a class="scroll mouse" href="#caja_login" data-toggle="modal" style="">Login</a>
				</div>
			   
			</div>
		   
	</div>
	</header>  
	<section id="hero">
	 

		
		 <div id="cuadro_inicio">
			 <div class="h1-main ">
					 
				  <img src="img/logo1.png"/>
			</div>
			
		</div>
	  
		<div id="slides"><a name="inicio"></a>
		  <video class="video" muted  autoplay="autoplay"  width="100%" height="80%" preload='none' loop="loop" src="video/video.mp4" >

								

		  </video>

		</div>

		
 
	</section>

	
			   
			   <div class="modal fade bb-link bb-login" id="caja_login">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div style="padding:0;margin-top:2em;" class="modal-header">
					  
							<!--button type="button" style="color:black" class="close" data-dismiss="modal" aria-hidden="true">X</button-->
						<div class="cien" style="background-color:#18232b;">

							<a ><div id="barra_login" class="cinc paralelo login_activo"><h6>{{Lang::get('messages.indxModTitInicioSecion')}}</h6></div></a>
							<a ><div id="barra_cuenta" class="cinc paralelo login_inactivo"><h6>Create account</h6></div></a>
						</div>
					  </div>	
					 
					  
					 {{ Form::open(array('url' => 'users/login')) }}
					 <div class="modal-body row" style="height:430px">
						<div id="sign_in"  >	
							<div class="cien" style="padding:4em 5em 0em 5em;text-align:center;">
								
								<div class="col-lg-12" >
									<input id="username" placeholder="{{Lang::get('messages.indxModLblUsuario')}}" type="text" aria-required="true" size="30" value="" name="username">
								</div>	 
									<!--<p> <a href="{{ URL::to('principal') }}"> » Entrar sin iniciar sesión</a> </p>-->   
							</div>						
							<div class="cien" style="padding:0em 5em 0em 5em;text-align:center;">	
								<div class="col-lg-12">
						
										
										<input id="password" type="password" placeholder="{{Lang::get('messages.indxModlblContrsenia')}}"  aria-required="true" size="30" value="" name="password">
								
								</div>	
							</div>
							<div class="cien" style="padding:0em 5em 0em 5em;text-align:center;">							

								<div class="col-lg-12"style="text-align:center;padding-left:4em;">
							        <!-- Captcha image html-->
							        {{ $captchaHtml }}
							    </div>
								<div class="col-lg-12"style="text-align:center;">
									<label for="CaptchaCode"></label>

									<!-- Captcha code user input textbox -->
									<input id="CaptchaCode" class="form-control" placeholder="{{Lang::get('messages.indxModLblCapcha')}}"name="CaptchaCode" type="text" style="text-transform: uppercase;">
								</div>	
							</div>	

							<!--div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<p style="font-size:18px; text-transform:uppercase;"> <a href="{{ URL::to('crear_cuenta') }}"></a>	</p> 
								   
							</div-->
							<div class="cien" style="padding:0em 5em 0em 5em;text-align:center;">							

								<div class="col-lg-12">
									<button type="button" id="btnLogin" class="btn btn-primary rojo_fondo">{{Lang::get('messages.indxModBtnSesion')}}</button>    
								</div>
							</div>
							
							
							<div class="col-sm-12 isHidden error-message">
								<div class="label alert" role="alert"></div>
							</div>
						</div>
						{{ Form::close() }}
						<div id="sign_up" class="isHidden">
							{{ Form::open(array('url' => '/crear_cuenta', 'data-abide', 'class' => 'row')) }}
							<div class="cien" style="background-color:white;text-align:center;">
								<div class="cinc paralelo">
									<div class="small-12 columns" style="margin-bottom:10px; text-align:left">
										<img width="220px"src="img/gente/masca.png"/>
									</div>	
									<div class="small-12 columns">
								
											<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.nologTltPais')}}">
												<input type="text" name="pais" class="typeahead" placeholder="{{Lang::get('messages.nologManLblPais')}}"value="{{Input::old('pais')}}"/>
											</span>
									</div>
									<div class="small-12 columns">
										
											<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.nologTltCiu')}}">	
											
												<input type="text" name="estado" class="typeahead" placeholder="{{Lang::get('messages.nologManLblCiudad')}}" value="{{Input::old('estado')}}"/>
											</span>
									</div>
								</div>
								<div class="cinc paralelo">
									<div class="small-12 columns">
				
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
									
							        <div class="large-12 columns">
							          	<div class="small-12">
								            {{ $captchaHtml }}
									    </div>
										<div class="large-12"style="margin-top:0.5em">
										
											<input id="CaptchaCode" class="form-control" name="CaptchaCode" placeholder="{{Lang::get('messages.nologManLblCapcha')}}"type="text" style="text-transform: uppercase;">
										</div>				
									</div>
									<div class="small-12 columns" style="text-align:center;">
										<label>
											<input type="checkbox" name="politicas" value="acepto" />{{Lang::get('messages.nologManLblTerminos')}} <a href="{{URL::to('unmask')}}" target="_blank">{{Lang::get('messages.nologManLnkTerminos')}}</a>
										</label>
										
										
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
								<button type="submit" class="button rojo_fondo" style="height:40px;margin-top:20em;" >{{Lang::get('messages.nologManBtnGuardar')}}</button>	
							</div>
						</div>
					</div>

					
				</div>
			  </div>
			</div>
						
	
<div class="area_principal_web">
		<section class="seccion_blanca">
		<article class="barrita_int">
			<a href="#zona_umk"><img src="img/flechita.png"></a>
		</article>
		
		<div class="banda_azul" data-scroll-reveal="enter bottom over 1.5s and move 30px" >		
				<div class="titulo_sec_bca">
					<h3 style="color:white;margin-bottom:0">YOU WILL KNOW THE TRUTH</h3>
					<h5 style="color:white;">about the people who surround you</h5>
				</div>

		</div>
		<p data-scroll-reveal="enter bottom but wait 1s">On UNMASK life you can see the truth about people from all over the world. Whether it's your friend, teachers, staff, boss,
		lovers or anyone else you've met. Also you can share info about anyone you know and unmask them!</p>
		<div class="perfil_de_muestra">
			<div id="zona_umk" class="instruccion">
				<h4 data-scroll-reveal="enter left and move 50px over 2s">Click "UNMASK" to open the truth</h4>
			</div>
			<div class="perfil_ejemplo_index"data-scroll-reveal="move 16px scale up 20%, over 2s" >
				<div class="avatar_index">
					
					<!--Imagen de perfil-->			
					<img src="img/gente/1.jpg"/>
					<a>
						<div class="footer_cuadro_index">
							<h6>UNMASK</h6>	
						</div>	
					</a>
				</div>
				<div class="info hidden">
					<ul class="cuadro_des_index">
						<li><strong><h6 style="text-transform: capitalize;font-weight:600;"></h6></strong></li>
							<div class="puntaje">
							<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
									<a href="#" ><img src="img/mn.png"><p class="num_rank"></p></a>
									<a href="#"  ><img src="img/mr.png"><p class="num_rank"></p></a>
							</div>
							<li ><h5 class="gris"style="text-transform: capitalize;font-weight:400;"></h5></li>
							<li  class="gris"><h5 style="text-transform: capitalize;font-weight:400;"></h5></li>
					</ul>
				</div>
		
			</div>

	

	</section>
	<section class="barrita_int">
		<a href="#perfiluchos"><img src="img/flechita.png"></a>
		<div class="boton_find_area">
			<div class="find_btn rojo_fondo"><a  style="color:white;font-weight:500">FIND SOMEONE</a></div>
		</div>
		<div class="borde_btn"></div>
	</section>
	<section class="seccion_blanca">	
		
		<div id="perfiluchos"class="contenedor_perfiles_ejemplo" >
			<div class="perfil_ejemplo_index"data-scroll-reveal="enter left and move 50px over 2.5s">
				<div class="avatar_index">
						
						<!--Imagen de perfil-->			
					<img src="img/gente/1.jpg"/>
					<a>
						<div class="footer_cuadro_index">
							<h6>UNMASK</h6>	
						</div>	
					</a>
				</div>
				<div class="info hidden">
					<ul class="cuadro_des_index">
						<li><strong><h6 style="text-transform: capitalize;font-weight:600;"></h6></strong></li>
							<div class="puntaje">
								<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
										<a href="#" ><img src="img/mn.png"><p class="num_rank"></p></a>
										<a href="#"  ><img src="img/mr.png"><p class="num_rank"></p></a>
							</div>
						<li ><h5 class="gris"style="text-transform: capitalize;font-weight:400;"></h5></li>
						<li  class="gris"><h5 style="text-transform: capitalize;font-weight:400;"></h5></li>
					</ul>
				</div>
			
			</div>
			<div class="perfil_ejemplo_index"data-scroll-reveal="move 16px scale up 20%, over 2s">
				<div class="avatar_index">
						
						<!--Imagen de perfil-->			
					<img src="img/gente/2.jpg"/>
					<a>
						<div class="footer_cuadro_index">
							<h6>UNMASK</h6>	
						</div>	
					</a>
				</div>
				<div class="info hidden">
					<ul class="cuadro_des_index">
						<li><strong><h6 style="text-transform: capitalize;font-weight:600;"></h6></strong></li>
							<div class="puntaje">
								<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
										<a href="#" ><img src="img/mn.png"><p class="num_rank"></p></a>
										<a href="#"  ><img src="img/mr.png"><p class="num_rank"></p></a>
							</div>
						<li ><h5 class="gris"style="text-transform: capitalize;font-weight:400;"></h5></li>
						<li  class="gris"><h5 style="text-transform: capitalize;font-weight:400;"></h5></li>
					</ul>
				</div>
			
			</div>
			<div class="perfil_ejemplo_index" data-scroll-reveal="enter top and move 16px scale up 20%, over 2s">
				<div class="avatar_index">
						
						<!--Imagen de perfil-->			
					<img src="img/gente/3.jpg"/>
					<a>
						<div class="footer_cuadro_index">
							<h6>UNMASK</h6>	
						</div>	
					</a>
				</div>
				<div class="info hidden">
					<ul class="cuadro_des_index">
						<li><strong><h6 style="text-transform: capitalize;font-weight:600;"></h6></strong></li>
							<div class="puntaje">
								<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
										<a href="#" ><img src="img/mn.png"><p class="num_rank"></p></a>
										<a href="#"  ><img src="img/mr.png"><p class="num_rank"></p></a>
							</div>
						<li ><h5 class="gris"style="text-transform: capitalize;font-weight:400;"></h5></li>
						<li  class="gris"><h5 style="text-transform: capitalize;font-weight:400;"></h5></li>
					</ul>
				</div>
			
			</div>
			<div class="perfil_ejemplo_index" data-scroll-reveal="move 16px scale up 20%, over 2s">
				<div class="avatar_index">
						
						<!--Imagen de perfil-->			
					<img src="img/gente/4.jpg"/>
					<a>
						<div class="footer_cuadro_index">
							<h6>UNMASK</h6>	
						</div>	
					</a>
				</div>
				<div class="info hidden">
					<ul class="cuadro_des_index">
						<li><strong><h6 style="text-transform: capitalize;font-weight:600;"></h6></strong></li>
							<div class="puntaje">
								<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
										<a href="#" ><img src="img/mn.png"><p class="num_rank"></p></a>
										<a href="#"  ><img src="img/mr.png"><p class="num_rank"></p></a>
							</div>
						<li ><h5 class="gris"style="text-transform: capitalize;font-weight:400;"></h5></li>
						<li  class="gris"><h5 style="text-transform: capitalize;font-weight:400;"></h5></li>
					</ul>
				</div>
			
			</div>
			<div class="perfil_ejemplo_index"data-scroll-reveal="move 16px scale up 20%, over 2s">
				<div class="avatar_index">
						
						<!--Imagen de perfil-->			
					<img src="img/gente/5.jpg"/>
					<a>
						<div class="footer_cuadro_index">
							<h6>UNMASK</h6>	
						</div>	
					</a>
				</div>
				<div class="info hidden">
					<ul class="cuadro_des_index">
						<li><strong><h6 style="text-transform: capitalize;font-weight:600;"></h6></strong></li>
							<div class="puntaje">
								<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
										<a href="#" ><img src="img/mn.png"><p class="num_rank"></p></a>
										<a href="#"  ><img src="img/mr.png"><p class="num_rank"></p></a>
							</div>
						<li ><h5 class="gris"style="text-transform: capitalize;font-weight:400;"></h5></li>
						<li  class="gris"><h5 style="text-transform: capitalize;font-weight:400;"></h5></li>
					</ul>
				</div>
			
			</div>
			<div class="perfil_ejemplo_index"data-scroll-reveal="enter right and move 36px scale up 20%, over 2s">
				<div class="avatar_index">
						
						<!--Imagen de perfil-->			
					<img src="img/gente/1.jpg"/>
					<a>
						<div class="footer_cuadro_index">
							<h6>UNMASK</h6>	
						</div>	
					</a>
				</div>
				<div class="info hidden">
					<ul class="cuadro_des_index">
						<li><strong><h6 style="text-transform: capitalize;font-weight:600;"></h6></strong></li>
							<div class="puntaje">
								<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
										<a href="#" ><img src="img/mn.png"><p class="num_rank"></p></a>
										<a href="#"  ><img src="img/mr.png"><p class="num_rank"></p></a>
							</div>
						<li ><h5 class="gris"style="text-transform: capitalize;font-weight:400;"></h5></li>
						<li  class="gris"><h5 style="text-transform: capitalize;font-weight:400;"></h5></li>
					</ul>
				</div>
			
			</div>
			<div class="perfil_ejemplo_index"data-scroll-reveal="enter bottom and move 36px scale up 20%, over 2s">
				<div class="avatar_index">
						
						<!--Imagen de perfil-->			
					<img src="img/gente/2.jpg"/>
					<a>
						<div class="footer_cuadro_index">
							<h6>UNMASK</h6>	
						</div>	
					</a>
				</div>
				<div class="info hidden">
					<ul class="cuadro_des_index">
						<li><strong><h6 style="text-transform: capitalize;font-weight:600;"></h6></strong></li>
							<div class="puntaje">
								<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
										<a href="#" ><img src="img/mn.png"><p class="num_rank"></p></a>
										<a href="#"  ><img src="img/mr.png"><p class="num_rank"></p></a>
							</div>
						<li ><h5 class="gris"style="text-transform: capitalize;font-weight:400;"></h5></li>
						<li  class="gris"><h5 style="text-transform: capitalize;font-weight:400;"></h5></li>
					</ul>
				</div>
			
			</div>
			<div class="perfil_ejemplo_index"data-scroll-reveal="move 16px scale up 20%, over 2s">
				<div class="avatar_index">
						
						<!--Imagen de perfil-->			
					<img src="img/gente/3.jpg"/>
					<a>
						<div class="footer_cuadro_index">
							<h6>UNMASK</h6>	
						</div>	
					</a>
				</div>
				<div class="info hidden">
					<ul class="cuadro_des_index">
						<li><strong><h6 style="text-transform: capitalize;font-weight:600;"></h6></strong></li>
							<div class="puntaje">
								<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
										<a href="#" ><img src="img/mn.png"><p class="num_rank"></p></a>
										<a href="#"  ><img src="img/mr.png"><p class="num_rank"></p></a>
							</div>
						<li ><h5 class="gris"style="text-transform: capitalize;font-weight:400;"></h5></li>
						<li  class="gris"><h5 style="text-transform: capitalize;font-weight:400;"></h5></li>
					</ul>
				</div>
			
			</div>

		</div>
	</section>

	<section class="unmask_section sec-mobile-ready">
	   <div class="full-bg-position page-section-1 background-stretch" data-stellar-background-ratio="-.3"><span class="mask-color" style="background-color:#000;"></span></div> 
		<div class="container">
			<div class="cien">
				
			  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="float:right;">
					<div class="text-block">
					<!--div class="encabezado_texto head_largo left white bold"> <h1>{{Lang::get('messages.indxMovLblEncabezadoUnmask')}}</h1> </div-->
						<h3 style="color:#ae3e34;">{{Lang::get('messages.indxMovLblDescripcion1')}}</h3>
						<p class="justificar">{{Lang::get('messages.indxMovLblDescripcion')}}</p>
 						<p ><em>{{Lang::get('messages.indxMovLblFrase')}}</em></p>
 						<p style="margin-left:17em"><em>  {{Lang::get('messages.indxMovLblAutor')}}</em></p>

				  </div>
			 </div>
				
			   <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<div class="unmask_personas efecto">
						<img style="width:500px;"src="img/tipo1.png" data-scroll-reveal="enter bottom over 1s and move 50px">
						<!--img src="img/tipo2.png" data-scroll-reveal="enter bottom over .3s and move 70px"-->
				  </div>
				</div>
				  
		   </div>
		</div>
	</section>
	<section class="franja_bca"></section>
	<section class="barrita_gris">
		<div class="caja_circulos">
			<a data-reveal-id="verVideo1"><div class="circulo_ind"><img src="img/cup.png"></div></a>
			<a data-reveal-id="verVideo2"><div class="circulo_ind"><img src="img/cup2.png"></div></a>
			<a data-reveal-id="verVideo3"><div class="circulo_ind"><img src="img/cup3.png"></div></a>


		</div>
	</section>
	<section class="seccion_blanca">
		<div class="titulo_sec_bca" style="padding-top: 3em;">		
			<h3>All THAT YOU CAN FIND ONLY ON THE</h3>
			<img src="img/unmk.png">

		</div>
	</section>
	
   	
	<section id="slider_mask">
		
		<div id="slider1_container" style="position: relative; margin: 0 auto;
		top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
		<!-- Loading Screen -->
		<div u="loading" style="position: absolute; top: 0px; left: 0px;">
			<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
				top: 0px; left: 0px; width: 100%; height: 100%;">
			</div>
			<div style="position: absolute; display: block; background: url(/img/loading.gif) no-repeat center center;
				top: 0px; left: 0px; width: 100%; height: 100%;">
			</div>
		</div>
		<!-- Slides Container -->
		<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1300px;
			height: 500px; overflow: hidden;">
			<div>
				<img u="image" src="img/slide1.jpg" />
				
				
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			<div>
				<img u="image" src="img/slide2.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			<div>
				<img u="image" src="img/slide3.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			<div>
				<img u="image" src="img/slide4.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			<div>
				<img u="image" src="img/slide5.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			<div>
				<img u="image" src="img/slide6.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			<div>
				<img u="image" src="img/slide7.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			<div>
				<img u="image" src="img/slide8.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			 <div>
				<img u="image" src="img/slide9.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			 <div>
				<img u="image" src="img/slide10.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			 <div>
				<img u="image" src="img/slide11.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			 <div>
				<img u="image" src="img/slide12.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			 <div>
				<img u="image" src="img/slide13.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			 <div>
				<img u="image" src="img/slide14.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
			 <div>
				<img u="image" src="img/slide15.jpg" />
				<div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
					text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
						color: #FFFFFF;">
				</div>
				<div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
					text-align: left; line-height: 36px; font-size: 30px;
						color: #FFFFFF;">
					   
				</div>
			</div>
		</div>
				
		<!-- Bullet Navigator Skin Begin -->
		<style>
			/* jssor slider bullet navigator skin 21 css */
			/*
			.jssorb21 div           (normal)
			.jssorb21 div:hover     (normal mouseover)
			.jssorb21 .av           (active)
			.jssorb21 .av:hover     (active mouseover)
			.jssorb21 .dn           (mousedown)
			*/
			.jssorb21 div, .jssorb21 div:hover, .jssorb21 .av
			{
				background: url(../img/b21.png) no-repeat;
				overflow:hidden;
				cursor: pointer;
			}
			.jssorb21 div { background-position: -5px -5px; }
			.jssorb21 div:hover, .jssorb21 .av:hover { background-position: -35px -5px; }
			.jssorb21 .av { background-position: -65px -5px; }
			.jssorb21 .dn, .jssorb21 .dn:hover { background-position: -95px -5px; }
		</style>
		<!-- bullet navigator container -->
		<div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
			<!-- bullet navigator item prototype -->
			<div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
		</div>
		<!-- Bullet Navigator Skin End -->

		<!-- Arrow Navigator Skin Begin -->
		<style>
			/* jssor slider arrow navigator skin 21 css */
			/*
			.jssora21l              (normal)
			.jssora21r              (normal)
			.jssora21l:hover        (normal mouseover)
			.jssora21r:hover        (normal mouseover)
			.jssora21ldn            (mousedown)
			.jssora21rdn            (mousedown)
			*/
			.jssora21l, .jssora21r, .jssora21ldn, .jssora21rdn
			{
				position: absolute;
				cursor: pointer;
				display: block;
				background: url(img/a21.png) center center no-repeat;
				overflow: hidden;
			}
			.jssora21l { background-position: -3px -33px; }
			.jssora21r { background-position: -63px -33px; }
			.jssora21l:hover { background-position: -123px -33px; }
			.jssora21r:hover { background-position: -183px -33px; }
			.jssora21ldn { background-position: -243px -33px; }
			.jssora21rdn { background-position: -303px -33px; }
		</style>
		<!-- Arrow Left -->
		<span u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 123px; left: 8px;">
		</span>
		<!-- Arrow Right -->
		<span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 123px; right: 8px">
		</span>
		<!-- Arrow Navigator Skin End -->
		<a style="display: none" href="http://www.jssor.com">{{Lang::get('messages.indxSdlAImagen')}}</a>
	</div>
	</section>
	<section class="seccion_blanca">
		<div class="flexslider">
	  <ul class="slides">
	    <li>
	      <img src="img/slide1.jpg" />
	    </li>
	     <li>
	      <img src="img/slide2.jpg" />
	    </li>
	     <li>
	      <img src="img/slide3.jpg" />
	    </li>
	     <li>
	      <img src="img/slide4.jpg" />
	    </li>
	  </ul>
	</div>
	</section>


	<section class="recuadro_rojo">	
		<div class="perfil_ejemplo_index" style="width:168px;margin:114px 0 0 120px;">
				<div class="avatar_index" >
						
						<!--Imagen de perfil-->			
					<img style="height:140px" src="img/foto_cruz.png"/>
					<a>
						<div class="footer_cuadro_index">
							<h6>UNMASK</h6>	
						</div>	
					</a>
				</div>
				<div class="info hidden">
					<ul class="cuadro_des_index">
						<li><strong><h6 style="text-transform: capitalize;font-weight:600;"></h6></strong></li>
							<div class="puntaje">
								<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
										<a href="#" ><img src="img/mn.png"><p class="num_rank"></p></a>
										<a href="#"  ><img src="img/mr.png"><p class="num_rank"></p></a>
							</div>
						<li ><h5 class="gris"style="text-transform: capitalize;font-weight:400;"></h5></li>
						<li  class="gris"><h5 style="text-transform: capitalize;font-weight:400;"></h5></li>
					</ul>
				</div>
			
			</div>	
		<div class="crear_contenido">
			
			<div class="crear_texto"><h4 class="formulario_alinear">CREATE   </h4><p>     the profile of any person you wish to unmask
			and expose his secrets</p></div>
		</div>	
		<div class="imagen_bot_der">	
				<img src="img/viaje.png">
		</div>
		
		
	</section>

	
	<!--section id="ribons">
		<article class="cuadro_ribon">
			<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">
				<img alt="Licencia de Creative Commons" style="border-width:0;margin-top:10px;" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" />
			</a><br />
			<span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">{{Lang::get('messages.indxRbsUnmask')}}</span>
			 by <a xmlns:cc="http://creativecommons.org/ns#" href="http://unmask.life/" target="_blank" property="cc:attributionName" rel="cc:attributionURL">RESERVED</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Reconocimiento-NoComercial-SinObraDerivada 4.0 International License</a>.<br />Created from work on <a xmlns:dct="http://purl.org/dc/terms/" href="http://unmask.life/" rel="dct:source">http://unmask.life/</a>.<br />You can find permissions beyond this license on  <a xmlns:cc="http://creativecommons.org/ns#" href="http://unmask.life/" rel="cc:morePermissions">http://unmask.life/</a>
		</article>
		<article class="cuadro_ribon">
			<div style="text-align:center"><a href="https://www.eff.org/pages/blue-ribbon-campaign" target="_blank"><img style="border-width:0;margin-top:10px;" src="https://www.eff.org/files/brstrip.gif" alt="Join the Blue Ribbon Online Free Speech Campaign" /><br/>Join the Blue Ribbon Online Free Speech Campaign!</a></div>
		</article>
		<article class="cuadro_ribon">
			<img style="border-width:0;margin-top:10px;" src="img/logoawp.png">
		</article>
		<article class="cuadro_ribon">
			<a href="https://www.torproject.org/" target="_blank"><img style="width:200px"src="img/tor.png"></a>
			<h5 style="color:white">{{Lang::get('messages.indxRbsLblRecomendacion')}}</h5>

		</article>
		<div class="mil">
			<h3 style="color:white">{{Lang::get('messages.indxRbsLblHost')}}</h3>
			<a href="https://www.1984.is/" target="_blank"><img style="width:200px" src="img/logo1984.jpg"></a>
		</div>
		<div class="mil">
			<h3 style="color:white">{{Lang::get('messages.indxRbsLblAny2Say')}}</h3>
			<a href="https://www.anythingtosay.com/" target="_blank"><img style="width:120px" src="img/sedia.png"></a>
		</div>
	</section-->
	
	<!--footer>
		<div class="container">
			<div id="footer_contenido" class="row clearfix">
			
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<aside class="wd">
					<h4 class="wd_titulo">{{Lang::get('messages.indxPdpTitPoliticas')}}</h4>
					<div class="texto_wd"> <img style="width:30%; "src="logo.png"  class="logo-foot">
					  <p style="text-align:justify;">
					  	{{Lang::get('messages.indxPdpLblPoliticasDesc')}}
					  </p>
					  <hr>
					  <p><br>
					<br>
					{{Lang::get('messages.indxPdpTitCorreo')}} <a href="">{{Lang::get('messages.indxPdpLblCorreoDesc')}}</a> </p>
					</div>
					</aside>
			</div> 
			
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<aside class="wd clearfix">
					<h4 class="wd_titulo">{{Lang::get('messages.indxPdpTitClasificaciones')}}</h4>
					<div class="wd_reciente_rank">
						  <ul>
						<li> <i class="icon-mask"></i> <a href="#"> {{Lang::get('messages.indxPdpLblClasificacion1')}} </a> </li>
						<li> <i class="icon-mask"></i> <a href="#">{{Lang::get('messages.indxPdpLblClasificacion2')}}</a> </li>
						<li> <i class="icon-mask"></i> <a href="#">{{Lang::get('messages.indxPdpLblClasificacion3')}} </a> </li>
						<li> <i class="icon-mask"></i> <a href="#"> {{Lang::get('messages.indxPdpLblClasificacion4')}} </a> </li>
						<li> <i class="icon-mask"></i> <a href="#"> {{Lang::get('messages.indxPdpLblClasificacion5')}} </a> </li>
						<li> <i class="icon-mask"></i> <a href="#"> {{Lang::get('messages.indxPdpLblClasificacion6')}} </a> </li>
						<li> <i class="icon-mask"></i> <a href="#"> {{Lang::get('messages.indxPdpLblClasificacion7')}} </a> </li>
						<li> <i class="icon-mask"></i> <a href="#"> {{Lang::get('messages.indxPdpLblClasificacion8')}} </a> </li>
						<li> <i class="icon-mask"></i> <a href="#"> {{Lang::get('messages.indxPdpLblClasificacion9')}} </a> </li>
						<li> <i class="icon-mask"></i> <a href="#"> {{Lang::get('messages.indxPdpLblClasificacion10')}} </a> </li>

					  </ul>
						</div>
					<div class="clear"></div>
				  </aside>
			</div> 
			
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<aside class="wd wd_galeria_mask clearfix">
					<h4 class="wd_titulo">{{Lang::get('messages.indxGalLblEspecialUnmask')}}</h4>
					<<ul class="galery_work">
						<li><a href="img/gente/pena.jpg" class="prettyPhoto"><img src="img/gente/pena.jpg"></a></li>
						<li><a href="img/gente/2.jpg" class="prettyPhoto"><img src="img/gente/2.jpg"></a></li>
						<li><a href="img/gente/3.jpg" class="prettyPhoto"><img src="img/gente/3.jpg"></a></li>
						<li><a href="img/gente/4.jpg" class="prettyPhoto"><img src="img/gente/4.jpg"></a></li>
						<li><a href="img/gente/5.jpg" class="prettyPhoto"><img src="img/gente/5.jpg"></a></li>
						<li><a href="img/gente/pena.jpg" class="prettyPhoto"><img src="img/gente/pena.jpg"></a></li>
						<li><a href="img/gente/1.jpg" class="prettyPhoto"><img src="img/gente/1.jpg"></a></li>
						
					</ul>>
					
					<div class="clear"></div> 
				 </aside>
			</div> 
			
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<aside class="wd wd_tag_mascara clearfix">
					<h4 class="wd_titulo">{{Lang::get('messages.indxPdpLblPorque')}}</h4>
					<div class="tag_mascara">
						<iframe width="100%" height="115" src="https://www.youtube.com/embed/xIuBXM4KAm0?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
						{{Lang::get('messages.indxPdpLblSilencio')}}	
					</div>
					<div class="clear"></div> 
				 </aside>
			</div> 
			
			 
		   </div>
		</div>
	</footer-->
	
</div>	
	<div id="verVideo1" class="reveal-modal" data-reveal>
		<div class="titulo_barra">
			<h3></h3>
		</div>
	
		<div class="row" style="text-align:center;">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/pLpl9qGAX-0" frameborder="0" allowfullscreen></iframe>
		</div>
	
		<a class="close-reveal-modal">&#215;</a>
	</div>

	<a class="exit-off-canvas"></a>

	<div id="verVideo2" class="reveal-modal" data-reveal>
		<div class="titulo_barra">
			<h3></h3>
		</div>
		
		<div class="row" style="text-align:center;">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/LxtE6-3-UFk" frameborder="0" allowfullscreen></iframe>
		</div>
		
		<a class="close-reveal-modal">&#215;</a>
	</div>

	<a class="exit-off-canvas"></a>

	<div id="verVideo3" class="reveal-modal" data-reveal>
		<div class="titulo_barra">
			<h3></h3>
		</div>
		
		<div class="row" style="text-align:center;">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/Utdd9jodoHg" frameborder="0" allowfullscreen></iframe>		
		</div>
	
		<a class="close-reveal-modal">&#215;</a>
	</div>

	<a class="exit-off-canvas"></a>
	<!--div class="copyright">
		 <div class="container">
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-12">{{Lang::get('messages.indxPdpLblCopyright')}} {{Lang::get('messages.indxPdpLblUnmask')}}.   <a href="#" ></a></div>
				<div class="col-lg-7 col-md-7 col-sm-12 clearfix">
					<div class="socials" style="float:right">
						<a href="https://www.facebook.com/profile.php?id=100009425710781"target="_blank" class="facebook">		<i class="fa fa-facebook"></i> 		<span>facebook</span></a>
						<a href="https://www.facebook.com/pages/Unmask/357450481127346?skip_nax_wizard=true&ref_type=logout_gear"target="_blank" class="facebook">		<i class="fa fa-facebook"></i> <span>facebook fan page</span></a>
						<a href="https://twitter.com/unmask_esp" class="twitter">		<i class="fa fa-twitter"></i> 		<span>twitter</span></a>
					   
				  </div> 
				</div>
			</div>
		</div>
	</div-->
	<!-- regresar a arriba quitado -->
	<!--<a href="#" class="back-to-top"> <i class="fa fa-angle-up"></i> </a>-->
	
</div> 
	

	<script type="text/javascript" src="{{ URL::asset('js/jquery-2.0.3.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.reveal.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/stellar.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/fancySelect.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery-ui.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.prettyPhoto.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/lightslider.js') }}"></script> 
	<script type="text/javascript" src="{{ URL::asset('js/waypoints.min.js') }}" ></script>
	<script type="text/javascript" src="{{ URL::asset('js/modernizr.custom.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.dlmenu.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/owl.carousel.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/isotope.pkgd.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.circliful.min.js') }}"></script>         
	<script type="text/javascript" src="{{ URL::asset('js/scrollReveal.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/mediaelement-and-player.min.js') }}"></script>
	<!--script type="text/javascript" src="{{ URL::asset('js/TimeCircles.js') }}"></script-->
	<script type="text/javascript" src="{{ URL::asset('js/jquery-counterup.js') }}"></script> 
	<script type="text/javascript" src="{{ URL::asset('js/jquery.fitvids.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/fss.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.themepunch.plugins.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.themepunch.revolution.min.js') }}"></script>    
	<script type="text/javascript" src="{{ URL::asset('js/jQuery-scrollnav.js') }}"></script>        
	<script type="text/javascript" src="{{ URL::asset('js/jquery.mb.YTPlayer.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.superslides.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.flexslider.js') }}"></script>       
	<script type="text/javascript" src="{{ URL::asset('js/retina.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script> 
	<script type="text/javascript" src="{{ URL::asset('js/lodash.underscore.min.js') }}"></script> 
	<script type="text/javascript" src="{{ URL::asset('js/backbone-min.js') }}"></script> 
	<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script> 
	<script type="text/javascript" src="{{ URL::asset('js/scroolto.js') }}"></script> 

	<script type="text/javascript" src="{{ URL::asset('js/jssor.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jssor.slider.js') }}"></script>
	<script>
	$(document).foundation();
	/*$('#slides').superslides({
	  animation: 'fade'
	});
	$(document).ready(function() {
			$(".content-slider").lightSlider({
                loop:true,
                keyPress:true,
                speed:500,
                auto:true,
            });
            $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:9,
                slideMargin: 0,
                speed:500,
                auto:true,
                loop:true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            });
		});*/
		$('#perfiluchos').scrollTo();
		$('#zona_umk').scrollTo();

	</script>
	
	<script>
	 $(window).load(function(){
	  'use strict';
	  
	  $('#barra_login').on('click',function(){
			$('#sign_in').removeClass('isHidden');
			$('#sign_up').addClass('isHidden');


		
			
	  });
	   $('#barra_cuenta').on('click',function(){
		
			$('#sign_up').removeClass('isHidden');
			$('#sign_in').addClass('isHidden');

			
	  });
	
	});  
	</script>
	<script>
		jQuery(document).ready(function ($) {

			var _CaptionTransitions = [];
			_CaptionTransitions["L"] = { $Duration: 900, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
			_CaptionTransitions["R"] = { $Duration: 900, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
			_CaptionTransitions["T"] = { $Duration: 900, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
			_CaptionTransitions["B"] = { $Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
			_CaptionTransitions["ZMF|10"] = { $Duration: 900, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 };
			_CaptionTransitions["RTT|10"] = { $Duration: 900, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} };
			_CaptionTransitions["RTT|2"] = { $Duration: 900, $Zoom: 3, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 0.5} };
			_CaptionTransitions["RTTL|BR"] = { $Duration: 900, x: -0.6, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.8} };
			_CaptionTransitions["CLIP|LR"] = { $Duration: 900, $Clip: 15, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
			_CaptionTransitions["MCLIP|L"] = { $Duration: 900, $Clip: 1, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic} };
			_CaptionTransitions["MCLIP|R"] = { $Duration: 900, $Clip: 2, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic} };

			var options = {
				$FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
				$AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
				$AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
				$PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

				$ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
				$SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
				$SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
				$MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
				//$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
				//$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
				$SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
				$DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
				$ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
				$UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
				$PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
				$DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

				$CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
					$Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
					$CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
					$PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
					$PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
				},

				$BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
					$Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
					$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
					$AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
					$Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
					$Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
					$SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
					$SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
					$Orientation: 1,                                //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
					$Scale: false                                   //Scales bullets navigator or not while slider scale
				},

				$ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
					$Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
					$ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
					$AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
					$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
				}
			};

			var jssor_slider1 = new $JssorSlider$("slider1_container", options);

			//responsive code begin
			//you can remove responsive code if you don't want the slider scales while window resizes
			function ScaleSlider() {
				var bodyWidth = document.body.clientWidth;
				if (bodyWidth)
					jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
				else
					window.setTimeout(ScaleSlider, 30);
			}
			ScaleSlider();

			$(window).bind("load", ScaleSlider);
			$(window).bind("resize", ScaleSlider);
			$(window).bind("orientationchange", ScaleSlider);
			//responsive code end
			$('.footer_cuadro').on('click', function(){
				$('.info').removeClass('hidden');	
				$('.footer_cuadro').addClass('hidden');
			});
		});
	</script>
	
   <script>
$(function(){
 
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
 };
 
 if (isMobile.Android())
 {
 alert("Para poder ingresar debes entrar desde una PC");
 }
 else if (isMobile.BlackBerry())
 {
 alert("Para poder ingresar debes entrar desde una PC");
 }
 else if (isMobile.iOS())
 {
 alert("Para poder ingresar debes entrar desde una PC");

 }
 else if (isMobile.Opera())
 {
 alert("Para poder ingresar debes entrar desde una PC");
 }
 else if (isMobile.Windows())
 {
 alert("Para poder ingresar debes entrar desde una PC ");
  }


});

</script>
<script type="text/javascript">
	$(document).ready(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});
</script>
<script type="text/javascript">
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



</body>
</html>
