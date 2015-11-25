<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Unmask Es una applicación que permite al usuario revelar los verdaderos rostros de las personas, sean buenos o malos, descubre a esas personas, probablemente ignores su verdadero ser">
		<meta name="unmask" content="">

		<title>{{Lang::get('messages.baseHedTitUnmaskBeta')}}</title>
		<link href="{{ URL::asset('css/typeahead.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('app.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/estilos.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('estilo.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/component.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/owl.carousel.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/owl.theme.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('css/owl.transitions.css') }}" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<link rel="shortcut icon" href="{{ URL::asset('placeholders/ico/') }}" type="image/x-icon">
		<link rel="apple-touch-icon" href="{{ URL::asset('placeholders/ico/apple-touch-icon.png') }}" />
		<link rel="apple-touch-icon" sizes="57x57" href="{{ URL::asset('placeholders/ico/apple-touch-icon-57x57.png') }}">
		<link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('placeholders/ico/apple-touch-icon-72x72.png') }}">
		<link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('placeholders/ico/apple-touch-icon-114x114.png') }}">
		<link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('placeholders/ico/apple-touch-icon-144x144.png') }}">
		<script type="text/javascript" src="{{ URL::asset('foundation/js/vendor/jquery.js') }}"></script>
		
	</head>
	<body >
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
								<h6>tool bar</h6><a><i class="icon-lista" id="despliega_tool"></i></a>
							</div>
							<div class="barra_opciones">
								<ul id="opciones_cuadros">
									<li class="menu_activo"><a id="principales" href="{{ URL::to('principal') }}">{{Lang::get('messages.baseOptLblMuro')}}</a></li>
									<li><span data-tooltip aria-haspopup="true"  title=" {{Lang::get('messages.baseTltCrear')}}"><a href="{{ URL::to('crear_perfil') }}">{{Lang::get('messages.baseOptLblCrearPerfil')}}</a></span></li>
									<li><a href="{{ URL::to('rank') }}">{{Lang::get('messages.baseOptLblClasificaciones')}}</a></li>
									<li><a href="">{{Lang::get('messages.baseOptLblAmparo')}}</a></li>
								</ul>
							</div>
							<div class="logo_espacio">
								<img src="{{ URL::asset('img\\logo.png') }}">
							</div>
							
						<!--/div-->

						
					</div>
		</header>


					<!--aside class="left-off-canvas-menu">
						<ul class="off-canvas-list">

							<li><a href="{{ URL::to('/principal') }}"data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.baseTltMuro')}}">{{Lang::get('messages.baseLogLblMuro')}}</a></li>
							<li><a href="{{ URL::to('/perfiles') }}"data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.baseTltMis')}}"><i class="icon-usuarios"></i>{{Lang::get('messages.baseLogLblPerfilesCreados')}}</a></li>
							<li><a href="{{ URL::to('/cuenta') }}" data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.baseTltCuenta')}}"><i class="icon-usuario"></i>{{Lang::get('messages.baseLogLblCuenta')}}</a></li>
							<li><a href="{{ URL::to('/rank') }}" data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.baseTltRanks')}}"><i class="icon-estrella"></i>{{Lang::get('messages.baseLogLblClasificaciones')}}</a></li>
							<li><a href="" data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.baseTltPoliticas')}} "><i class="icon-lista" ></i>{{Lang::get('messages.baseLogLblPoliticasPrivacidad')}}</a></li>
							<li><a href="{{ URL::to('/logout') }}"><i class="icon-on"></i>{{Lang::get('messages.baseLogLblCerrarSesion')}}</a></li>
						</ul>
					</aside-->
				<section class="cuerpo_completo">
				@yield('content_rank')
					<div id="busquedaAva" class="reveal-modal" data-reveal>
						<div class="titulo_barra">
							<h3>{{Lang::get('messages.baseBsaTitBusqueda')}}</h3>
						</div>
						<form action="" method="post" id="">
							<div class="row">
								<h6>{{Lang::get('messages.baseBsaLblBusquedaPerfiles')}}</h6>
								<div class="large-12 columns">
									<div class="large-4 columns">	
										<label>
											{{Lang::get('messages.baseBsaLblPerfilId')}}
											<input type="text" name="id" id="buav_id" placeholder="{{Lang::get('messages.basePlhBaId')}} 	"/>
										</label>
									</div>
									<div class="large-4 columns">	
										<label>
											{{Lang::get('messages.baseBsaLblNombrePerfil')}}
											<input type="text" name="id" id="buav_nom" placeholder="{{Lang::get('messages.basePlhBaNo')}} "/>
										</label>
									</div>
									<div class="large-4 columns">	
										<label>
											{{Lang::get('messages.baseBsaLblApellido')}}
											<input type="text" name="id" id="buav_apa" placeholder="{{Lang::get('messages.basePlhBaApe')}} "/>
										</label>
									</div>
								</div>
								<div class="large-12 columns">
									<div class="large-4 columns">	
										<label>
											{{Lang::get('messages.baseBsaLblApodo')}}
											<input type="text" name="id" id="buav_ama" placeholder="{{Lang::get('messages.basePlhBaApo')}} "/>
										</label>
									</div>
									<div class="large-4 columns">	
										<label>
											{{Lang::get('messages.baseBsaLblPais')}}
											<input type="text" name="id" id="buav_pai" placeholder=" {{Lang::get('messages.basePlhBaPa')}} "/>
										</label>
									</div>
									<div class="large-4 columns">	
										<label>
											{{Lang::get('messages.baseBsaLblCiudad')}}
											<input type="text" name="id" id="buav_cid" placeholder="{{Lang::get('messages.basePlhBaCiu')}} "/>
										</label>
									</div>
								</div>
								<div class="small-12 small columns">
									<button type="button" class="button success btn-buscar-avanzado" style="background-color:#ae3e34;">{{Lang::get('messages.baseBsaBtnBuscar')}}</button>
								</div>
							</div>
			            </form>
						<a class="close-reveal-modal">&#215;</a>
					</div>
				</section>
					
					<section class="sec_contenido"><!--clase main-section -->
						
						@yield('content')
					</section>
					<section id="tool_bar" class="cbp-spmenu-s2"> 
						<div class="area_superior"><!-- contiene la parte superior del tool bar-->
							<div class="user_tool">
								<div class="area_tlr">	
									<img src="{{ URL::asset('img\\gente\\uuser.jpg') }}"/>
									<div class="user_tool_info">
										<h4>User name</h4>
									</div>
									<div class="engrane">
										<a id="engrane_gris"><img src="{{ URL::asset('img\\engrane.png') }}"></a>
									</div>
								</div>
								<div class="cuenta_set  hidden">
									<h5>Account Settings</h5>
									<div class="engrane">
										<a id="engrane_negro"><img src="{{ URL::asset('img\\eng.png') }}"></a>
									</div>
								</div>
							</div>
						

						</div>	
						<div class="area_inferior">
							<div class="usuario_datos">
								<ul>
									<li ><a href="{{ URL::to('/principal') }}"data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.baseTltMuro')}}"><h5>{{Lang::get('messages.baseLogLblMuro')}}</h5></a> <span class="tool_rojo"></span></li>
									<li ><a href="{{ URL::to('/perfiles') }}"data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.baseTltMis')}}"><h5>{{Lang::get('messages.baseLogLblPerfilesCreados')}}</h5></a> <span class="tool_rojo"></span></li>
									<li ><a href="{{ URL::to('/rank') }}" data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.baseTltRanks')}}"><h5>{{Lang::get('messages.baseLogLblClasificaciones')}}</h5></a><span class="tool_rojo"></span></li>
										<li > <h5>{{Lang::get('messages.baseLogLblPoliticasPrivacidad')}}</h5></li>
									<li > <a href="{{ URL::to('/madison') }}"><h5>Ashley Madison Search</h5></a></li>
								</ul>
							</div>
							<div class="area_cuenta_img hidden">
								<img src="{{ URL::asset('img\\gente\\masca.png') }}">
								<div class="formulario_cta">
									<div class="small-12 columns">
										<h6>{{Lang::get('messages.cuenHedLblUsuario')}}</h6>
										<form action="/public/update_pass" method="post" data-abide>	
											<div class="large-12">
												<p>{{Lang::get('messages.cuenHedLblCambiarContra')}}</p>
											</div>
											<div class="large-12">
													
													<input placeholder="{{Lang::get('messages.cuenHedLblContrasenia')}}"type="password" name="contrasenia_act" required/>
												<small class="error">{{Lang::get('messages.cuenHedLblContraseniaVal')}}</small>
											</div>
											<div class="large-12">
												<label>
													
													<input placeholder="{{Lang::get('messages.cuenHedLblNuevaContrasenia')}}"type="password" id="contrasenia" name="contrasenia" required/>
												</label>
												<small class="error">{{Lang::get('messages.cuenHedLblNuevaContraseniaVal')}}</small>
											</div>
											<div class="large-12">
												<label>
													
													<input type="password" placeholder="{{Lang::get('messages.cuenHedLblNuevaContraseniaConf')}}"name="contrasenia_sec" data-equalto="contrasenia" required/>
												</label>
												<small class="error">{{Lang::get('messages.cuenHedLblNuevaContraseniaConfVal')}}</small>
											</div>
											<div class="large-12">
												<button type="submit"  style="background-color:#18232b;heigth:23px;">{{Lang::get('messages.cuenHedBtnCambiarcontrasenia')}}</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="footer_sesion">
							<div class="cerrar_sesion_footer">
								<a href="{{ URL::to('/logout') }}"><i class="icon-on"></i><h6 class="gris">{{Lang::get('messages.baseLogLblCerrarSesion')}}</h6></a>
							</div>
							<div class="borrar_cta_footer rojo_fondo hidden">
								<a href="" class="rojo_fondo"style="color:white;">{{Lang::get('messages.cuenHedLblBorrarCuenta')}}</a>
								
							</div>
						</div>	
					</section>
				
				<!--/div--><!-- inner_wrapp de foundation--> 
			<!--/div--><!-- div off no se que-->
		<!--a class="exit-off-canvas"></a-->

		
		<script type="text/javascript" src="{{ URL::asset('foundation/js/vendor/jquery.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('foundation/js/vendor/modernizr.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.abide.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.offcanvas.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.reveal.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.orbit.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('foundation/js/foundation/foundation.tooltip.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/typeahead.bundle.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/bloodhound.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/main_app.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/classie.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/handlebars.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/lodash.underscore.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/modernizr.custom.js') }}"></script>
		<script type="text/javascript">
			/**
			* change the delimiter tags of Handlebars
			* @author Francesco Delacqua
			* @param string start a single character for the starting delimiter tag
			* @param string end a single character for the ending delimiter tag
			*/
			Handlebars.setDelimiter = function(start,end){
			    //save a reference to the original compile function
			    if(!Handlebars.original_compile) Handlebars.original_compile = Handlebars.compile;

			    Handlebars.compile = function(source){
			        var s = "\\"+start,
			            e = "\\"+end,
			            RE = new RegExp('('+s+'{2,3})(.*?)('+e+'{2,3})','ig');

			            replacedSource = source.replace(RE,function(match, startTags, text, endTags, offset, string){
			                var startRE = new RegExp(s,'ig'), endRE = new RegExp(e,'ig');

			                startTags = startTags.replace(startRE,'\{');
			                endTags = endTags.replace(endRE,'\}');

			                return startTags+text+endTags;
			            });

			        return Handlebars.original_compile(replacedSource);
			    };
			};

			//EXAMPLE to change the delimiters to [:
			Handlebars.setDelimiter('[',']');
		</script>
		

		<script>
			var url = window.location.origin + '/impact/public/';
			$(document).foundation();
			$(document).foundation('tooltip', 'reflow');
			$(document).ready(function(){ //creacion de perfiles
				$('#addPerfil').click('reveal', 'open');
				$('#addPerfil').click('reveal','close');  
			});

			$('.click-image').on('click', function(e) { //url de la imagen
				debugger
				var img = $(e.currentTarget);
				var form = img.parents('form');
				var file = form.find('.' + img.data('ref'));

				file.off('change').on('change', function() {
					readURL(file[0], img);
				});

				file.click();
			});

			$('.base-busqueda.txt-buscar').on('blur', function (e) { //busquedas
				if($(e.currentTarget).val().length == 0)
					$('.busqueda-resultado').addClass('isHidden')
			});

			$('.btn-buscar-avanzado').on('click', function() {
				var data = {
					buav_id: $('#buav_id').val() || '',
					buav_nom: $('#buav_nom').val() || '',
					buav_apa: $('#buav_apa').val() || '',
					buav_ama: $('#buav_ama').val() || '',
					buav_pai: $('#buav_pai').val() || '',
					buav_cid: $('#buav_cid').val() || '',
				}
				$.post(url + 'principal/avanzada', data).done(done);
				//window.location.href = window.location.origin + url + 'principal/' + busqueda;
				function done (data) {
					debugger
					var perfiles = '';
					for (var i = 0; i < data.length; i++) {
						var item = data[i];
						perfiles += '<div class="perfil"> \
										<a href="' + url + 'perfil/' + item.idPerfil + '"> \
											<img src="' + url + 'img/db_imgs/' + item.foto + '" /> \
											<span>'+ item.perfil +  ' / ' + item.mascaras + ' / ' + item.pais +  '</span> \
										</a> \
									</div>';
					}
					$('.busqueda-resultado').removeClass('isHidden').html(perfiles); //mostrar los resultados quitar la clase ocultar
					$('#busquedaAva').foundation('reveal', 'close');

					$('#buav_id').val('');
					$('#buav_nom').val('');
					$('#buav_apa').val('');
					$('#buav_ama').val('');
					$('#buav_pai').val('');
					$('#buav_cid').val('');
				}
			});
			

			$('.base-button.btn_buscar').on('click', function() { //evento click en busqueda
				debugger
				var busqueda = $('.base-busqueda.txt-buscar').val();
				if(busqueda.length > 0) {
					$.get(url + 'principal/custom/' + busqueda).done(done);
					//window.location.href = window.location.origin + url + 'principal/' + busqueda;
					function done (data) {
						debugger
						var perfiles = '';
						for (var i = 0; i < data.length; i++) {
							var item = data[i];
							perfiles += '<div class="perfil"> \
											<a href="' + url + 'perfil/' + item.idPerfil + '"> \
												<img src="' + url + 'img/db_imgs/' + item.foto + '" /> \
												<span>'+ item.perfil +  ' / ' + item.mascaras + ' / ' + item.pais +  '</span> \
											</a> \
										</div>';
						}
						$('.busqueda-resultado').removeClass('isHidden').html(perfiles); //mostrar los resultados quitar la clase ocultar
					}
				}
			});

			function readURL(input, image) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						image.attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}
			$(document).foundation({
				orbit: {
					animation: 'slide',
					timer_speed: 1000,
					pause_on_hover: true,
					animation_speed: 500,
					navigation_arrows: true,
					bullets: false,
					next_on_click: true
				},
				abide : {
					patterns: {
						url: /^(https?|ftp|file|ssh):\/\/www\.(((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/
					},
				}
		    
		    });
			$('.').on('click',function(e){
			//e.preventDefault();
			$('.').removeClass("Hidden");
			

			opcion = 1;
		});
			
		</script>
		<script>
			$(document).on('ready',function(){
				$('#despliega_tool').on('click',function(){
					$('#tool_bar').toggleClass('ocultar_tool');
				});
				$('#engrane_gris').on('click',function(){
					$('.cerrar_sesion_footer').addClass('hidden');
					$('.area_tlr').addClass('hidden');
					$('.usuario_datos').addClass('hidden');
					$('.area_cuenta_img').removeClass('hidden');
					$('.cuenta_set').removeClass('hidden');
					$('.borrar_cta_footer').removeClass('hidden');
					

				});
				$('#engrane_negro').on('click',function(){
					$('.cerrar_sesion_footer').removeClass('hidden');
					$('.area_tlr').removeClass('hidden');
					$('.usuario_datos').removeClass('hidden');
					$('.area_cuenta_img').addClass('hidden');
					$('.cuenta_set').addClass('hidden');
					$('.borrar_cta_footer').addClass('hidden');
					
				});

			});
		</script>
   
	</body>
<html>