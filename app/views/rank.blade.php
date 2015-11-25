@extends('base')

@section('content_rank')

	<div class="cargar_rank">
			<div class="cat_mascaras" >
					<div class="cien">	
						<h2>{{Lang::get('messages.rankTOPRANK')}}</h2>
					</div>
				<div class="cien">
					<div class="rank_cuadros">
						<div class="cat_cuadro">
							<a  id="ladron" href="{{ URL::to('/rank/ladron') }}">
								<img src="{{ URL::asset('img/iconos/ladron.png') }}">
								<h3>{{Lang::get('messages.rankTit1')}}</h3>
							</a>
						</div>
						<div class="cat_cuadro">
							<a  id="jefe" href="{{ URL::to('/rank/jefe') }}">
								<img src="{{ URL::asset('img/iconos/jefe.png') }}">
								<h3>{{Lang::get('messages.rankTit2')}}</h3>
							</a>
						</div>
						<div class="cat_cuadro">
							<a id="escolar" href="{{ URL::to('/rank/escolar') }}">
								<img src="{{ URL::asset('img/iconos/escolar.png') }}">
								<h3>{{Lang::get('messages.rankTit3')}}</h3>
							</a>
						</div>
						<div class="cat_cuadro">
							<a id="corrup" href="{{ URL::to('/rank/corrupto') }}">
								<img src="{{ URL::asset('img/iconos/corrupcion.png') }}">
								<h3>{{Lang::get('messages.rankTit4')}}</h3>
							</a>
						</div>
						<div class="cat_cuadro">
							<a  id="infiel" href="{{ URL::to('/rank/infiel') }}">
								<img src="{{ URL::asset('img/iconos/corazon.png') }}">
								<h3>{{Lang::get('messages.rankTit5')}}</h3>
							</a>
						</div>
					</div>	
				</div>		
			</div>
			<div class="cat_mascaras_2 " >
					<div class="cien">	
						<h2>{{Lang::get('messages.rankTOPRANK')}}</h2>
					</div>
				<div class="cien">
					<div class="rank_cuadros">
						<div class="cat_cuadro">
							<a  id="altruista" href="{{ URL::to('/rank/altruista') }}">
								<img src="{{ URL::asset('img/iconos/altruista.png') }}">
								<h3>{{Lang::get('messages.rankTit6')}}</h3>
							</a>
						</div>
						<div class="cat_cuadro">
							<a  id="amigo" href="{{ URL::to('/rank/amigo') }}">
								<img src="{{ URL::asset('img/iconos/amigo.png') }}">
								<h3>{{Lang::get('messages.rankTit7')}}</h3>
							</a>
						</div>
						<div class="cat_cuadro">
							<a id="socio" href="{{ URL::to('/rank/socio') }}">
								<img src="{{ URL::asset('img/iconos/socio.png') }}">
								<h3>{{Lang::get('messages.rankTit8')}}</h3>
							</a>
						</div>
						<div class="cat_cuadro">
							<a id="celebridad" href="{{ URL::to('/rank/celebridad') }}">
								<img src="{{ URL::asset('img/iconos/celebridad.png') }}">
								<h3>{{Lang::get('messages.rankTit9')}}</h3>
							</a>
						</div>
						<div class="cat_cuadro">
							<a  id="viola" href="{{ URL::to('/rank/violador') }}">
								<img src="{{ URL::asset('img/iconos/viola.png') }}">
								<h3>{{Lang::get('messages.rankTit10')}}</h3>
							</a>
						</div>
					</div>
				</div>		
			</div>
			<div class="cat_mascaras_3 " >
					<div class="cien">	
						<h2>{{Lang::get('messages.rankTOPRANK')}}</h2>
					</div>
				<div class="cien">
					<div class="rank_cuadros">
						<div class="cat_cuadro">
							<a  id="ninfo" href="{{ URL::to('/rank/ninfomania') }}">
								<img src="{{ URL::asset('img/iconos/ninfomania.png') }}">
								<h3>{{Lang::get('messages.rankTit11')}}</h3>
							</a>
						</div>
					</div>
				</div>		
			</div>

		<div class="contenedor_perfiles Hidden">
			<div class="titulo_barra">
				<h3>{{Lang::get('messages.rankTOPRANK')}}</h3>
			</div>

				@foreach($toprank as $perfil)
					<div class="columna_perfiles">
						<div class="perfil_ejemplo vertical" data-scroll-reveal="enter bottom over .3s and move 10px">
							<a href="{{ URL::to('perfil').'/'.$perfil->idPerfil }}">
								<div class="avatar">
									<div class="mask">
										 <div class="confesion_cuadro">
									 		<h5> {{ $perfil->secret_pub }}</h5> 	
								     	 </div>
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
									</div>
									<a href="{{ URL::to('perfil').'/'.$perfil->idPerfil }}">
										<img src="{{ URL::asset('img\\db_imgs\\'.$perfil->foto) }}"/>
									</a>
								</div>
							</a>
							
							<div class="info">
								<ul>
									<li><strong><h3>{{ $perfil->perfil }}</h3></strong></li>
									<li><h5>{{ $perfil->estado }}</h5></li>
									<li><h5>{{ $perfil->mascaras }}</h5></li>
									<li><strong><h3>ID: {{ $perfil->idPerfil }}</h3></strong></li>										
								</ul>
							</div>
						</div>		
					</div>
				@endforeach
		</div>
	</div>

	<div id="verComentario" class="reveal-modal" data-reveal>
		<div class="titulo_barra">
			<h3>Comments</h3>
		</div>
		<div class="row gv-comentarios">
		</div>
		<div class="large-12 columns">
					<textarea class="txaComentario" placeholder="Haz un comentario"></textarea>
		</div>
		<div class="small-2 columns">
					<a href="#" class="button postfix btnComentar">Comment</a>
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

			
			
        $('#ladron').hover(function() {
            $('.cat_mascaras').addClass('ladron');
            $('.cat_mascaras').removeClass('jefe');
            $('.cat_mascaras').removeClass('escolar');
            $('.cat_mascaras').removeClass('corrupto');
            $('.cat_mascaras').removeClass('infiel');



       
        });
         $('#jefe').hover(function() {
            $('.cat_mascaras').addClass('jefe');
             $('.cat_mascaras').removeClass('ladron');
            $('.cat_mascaras').removeClass('escolar');
            $('.cat_mascaras').removeClass('corrupto');
            $('.cat_mascaras').removeClass('infiel');

       
        });
          $('#escolar').hover(function() {
            $('.cat_mascaras').addClass('escolar');
             $('.cat_mascaras').removeClass('ladron');
            $('.cat_mascaras').removeClass('jefe');
            $('.cat_mascaras').removeClass('corrupto');
            $('.cat_mascaras').removeClass('infiel');
      
        });
          $('#corrup').hover(function() {
            $('.cat_mascaras').addClass('corrupto');
             $('.cat_mascaras').removeClass('ladron');
            $('.cat_mascaras').removeClass('escolar');
            $('.cat_mascaras').removeClass('jefe');
            $('.cat_mascaras').removeClass('infiel');
        
        });
          $('#infiel').hover(function() {
            $('.cat_mascaras').addClass('infiel');
             $('.cat_mascaras').removeClass('ladron');
            $('.cat_mascaras').removeClass('escolar');
            $('.cat_mascaras').removeClass('corrupto');
            $('.cat_mascaras').removeClass('jefe');
      
        });
  		 $('#altruista').hover(function() {
            $('.cat_mascaras_2').addClass('altruista');
           $('.cat_mascaras_2').removeClass('amigo');
            $('.cat_mascaras_2').removeClass('socio');
             $('.cat_mascaras_2').removeClass('celebridad');
            $('.cat_mascaras_2').removeClass('viola');
      
        });
  		  $('#amigo').hover(function() {
            $('.cat_mascaras_2').addClass('amigo');
            $('.cat_mascaras_2').removeClass('altruista');
             $('.cat_mascaras_2').removeClass('socio');
            $('.cat_mascaras_2').removeClass('celebridad');
             $('.cat_mascaras_2').removeClass('infiel');

        
        });
  		   $('#socio').hover(function() {
            $('.cat_mascaras_2').addClass('socio');
           $('.cat_mascaras_2').removeClass('amigo');
           $('.cat_mascaras_2').removeClass('altruista');
           $('.cat_mascaras_2').removeClass('celebridad');
             $('.cat_mascaras_2').removeClass('viola');
       
        });
  		    $('#celebridad').hover(function() {
            $('.cat_mascaras_2').addClass('celebridad');
          $('.cat_mascaras_2').removeClass('amigo');
             $('.cat_mascaras_2').removeClass('socio');
             $('.cat_mascaras_2').removeClass('altruista');
             $('.cat_mascaras_2').removeClass('viola');
        
        });
  		     $('#viola').hover(function() {
            $('.cat_mascaras_2').addClass('viola');
             $('.cat_mascaras_2').removeClass('amigo');
             $('.cat_mascaras_2').removeClass('socio');
             $('.cat_mascaras_2').removeClass('celebridad');
             $('.cat_mascaras_2').removeClass('altruista');
       
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
		});
	</script>
@stop