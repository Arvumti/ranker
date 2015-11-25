@extends('base')

@section('content')
	<section class="area_buscador">	
			<div class="busqueda">
				<input style="padding-left:15px" type="text" class="base-busqueda txt-buscar buscador" placeholder="{{Lang::get('messages.basePlhBusca')}}">
				<div class="busqueda-resultado isHidden">
										
				</div>
				
			</div>
			<div class="filtro">
				<a class="busca_ava" data-reveal-id="busquedaAva">	<i class="icon-filter"></i></a>
			</div>
			<div class="buscar rojo_fondo">
				
				<a class="base-button btn_buscar"><i class="icon-buscar"></i></a>
				
			</div>
	</section>			
	<section id="h1-perfiles">
		<div class="contenedor_perfiles perfiles">
			
		    <!--div class="titulo_barra">
				<h1>{{Lang::get('messages.baseOptLblMuro')}} {{Lang::get('messages.baseOptLblSB')}}</h1>
			</div><CADA QUE HAYA UN SECRET BOX NUEVO EN UN PERFIL TOMARA EL PRIMER LUGAR -->
			@foreach($perfiles as $perfil)
				<div class="columna_perfiles">
					<div class="perfil_ejemplo vertical">
						<a href="{{ URL::to('perfil').'/'.$perfil->idPerfil }}">
							<div class="avatar">
								<div class="mask">
									<div class="confesion_cuadro"><!--AQUI DEBERA IR LO DE SECRET BOX SE ACTUALIZARA CADA QUE HAYA UNO NUEVO-->
								 		<h4 style="color:white; font-weight:900"> {{ $perfil->secret_pub }}</h4> 
							     	</div>
										
								</div>
						</a>
								<a >
								<div class="footer_cuadro">
									<h6>UNMASK</h6>	
									<div class="comentario_cuadro">
												<!--<a href="#" class="btnComentario" data-id="{{ $perfil->idPerfil }}">
													<i class="icon-chat comentar">
														<p class="com_rank">{{ $perfil->numcomm }}</p>
													</i>
												</a>-->
									</div>
								</div>	
								</a>
								<!--Imagen de perfil-->			
								<img src="{{ URL::asset('img\\db_imgs\\'.$perfil->foto) }}"/>
							</div>

						
						<div class="info">
							<h6 style="text-transform: capitalize;font-weight:600;font-family:sans-serif; border-bottom:solid 1px #a7a9ab;text-align:left;">{{ $perfil->perfil }}</h6>
							<h6 style="text-transform: capitalize;font-weight:500;font-family:sans-serif;text-align:left;color:#a7a9ab">{{ $perfil->pais }}</h6>
						</div>
						<div class="info hidden">
							
							<ul class="cuadro_des">
														
								<div class="puntaje">
										<!-- LA CALIFICACION SERAN LOS EMOTICONES, SE MUESTRAN 2 UNO BUENO Y UNO MALO CON LOS CONTEOS, NO SE PODRA VOTAR DESDE EL MURO SOLAMENTE DESDE EL PERFIL-->
												
									<a class="num_rank strong">{{ $perfil->bad }}</a><a  data-id="{{ $perfil->idPerfil }}" class="vote-caca"><img src="{{ URL::asset('img\\mn.png') }}"></a>
									<a class="num_rank strong">{{ $perfil->good }}</a><a data-id="{{ $perfil->idPerfil }}" class="vote-corazon"><img src="{{ URL::asset('img\\mr.png') }}"></a>
												
												
								</div>
								@if(strlen($perfil->mascaras) > 0)
								<li ><h5 style="text-transform: capitalize;font-weight:600;">{{ $perfil->mascaras }}</h5></li>
								@endif

								<li style="background-color:#f1f2f2"><h6 style="margin:0;border-bottom:solid 1px #a7a9ab;">ID: <strong style="float:right;margin-left:5em;">{{ $perfil->idPerfil }}</strong></h6></li>
								<li style="background-color:#f1f2f2"><h6 style="margin:0;">posts: <strong style="float:right;">{{ $perfil->numpost }}</strong></h6></li>
								<a id="guarda_info" ><li style="background-color:#18242B;margin-top:5px; text-align:center;border-radius:0px 0px 4px 4px;padding-bottom:8px;height:28px;padding-right:15px;"><img style="position:absolute;margin-top:7px;"width="20px;"src="{{ URL::asset('img\\arriba.png') }}"/></li></a>
							</ul>
						</div>
					</div>
				</div>	
			@endforeach
		</div>
		
	</section>

	<div id="verComentario" class="reveal-modal" data-reveal>
		<div class="titulo_barra">
			<h3>Comentarios</h3>
		</div>
		<div class="row gv-comentarios">
		</div>
		<div class="large-12 columns">
					<textarea class="txaComentario" placeholder="Haz un comentario"></textarea>
		</div>
		<div class="small-2 columns">
			<a href="#" class="button postfix btnComentar">Comentar</a>
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>

	<a class="exit-off-canvas"></a>

	<script type="text/javascript">
		$(document).ready(function() {
			/*<div class="large-12 columns">
				<h5>Comentario #1</h5>
				<p>Se pasó tiene una lanota y se roba y no haya ni como comprobar que no robó</p>
			</div> */

			$('.btnComentario').on('click', function(e) {
				e.preventDefault();
				var id = $(e.currentTarget).data('id');

				var gvComentarios = $('#verComentario').data('id', id).foundation('reveal', 'open').find('.gv-comentarios');
				$.get(url + 'comentario/' + id).done(function(data) {
					debugger;
					var comm = '';
					for (var i = 0; i < data.length; i++) {
						comm += '	<div class="large-12 columns"> \
										<h5><strong>' + data[i].nombre + ': </strong></h5>  \
										<p>' + data[i].comentario + '</p>  \
									</div>';
					}
					gvComentarios.html(comm);
				});
			});

			$('.btnComentar').on('click', function(e) {
				e.preventDefault();

				var elem = $(e.currentTarget);
				var parent = elem.parents('#verComentario');
				var id = parent.data('id');
				var txaComentario = parent.find('.txaComentario');
				var texto = txaComentario.val();
				var com_rank = parent.find('.com_rank');

				if(texto.length > 0)
					$.post(url + 'comentario/' + id, {texto:texto}).done(function(data) {
						txaComentario.val('');
						var comm = parseInt(com_rank.text(), 10);
						com_rank.text(comm + 1);
					});
				else
					txaComentario.focus();
			});

			$('.vote-rank').on('click', function(e) {
				var tipo = $(e.currentTarget).data('tipo');
				add(e, 'rank', tipo);
			});

			function add(e, mod, tipo) {
				e.preventDefault();
				debugger
				var elem = $(e.currentTarget);
				var id = elem.data('id');
				$.post(url + 'vote/' + mod + '/' + tipo + '/' + id).done(function(data) {
					var rank = elem.find('.num_rank');
					var votos = parseInt(rank.text(), 10);
					var suma = parseInt(data, 10);

					rank.text(votos + suma);
				});
			}
			$('.footer_cuadro').on('click', function(){
				$('.info').removeClass('hidden');	
				$('.footer_cuadro').addClass('hidden');
				
			});
			$('#guarda_info').on('click', function(){
					$('.info').toggleClass('hidden');
					$('.footer_cuadro').toggleClass('hidden');
				});

		});
	</script>
@stop