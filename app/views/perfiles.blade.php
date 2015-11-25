@extends('base')

@section('content')
	<section class="contenedor_perfiles">
		<div class="area_add">
			<!--a class="button" data-reveal-id="addPerfil"><i class="icon-agregar_us"></i>Perfil</a-->
			<a href="{{ URL::to('/crear_perfil') }}" class="button rojo_fondo"  data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfilesBtncreaTlt')}}"><div class="etiqueta"><h3>{{Lang::get('messages.perfilesBtncrea')}}</h3></div>  <div class="suma"><h3>+</h3></div></a>
		</div>

		@foreach($perfiles as $perfil)
		<article class="perfil_tabla">
			<div class="perfil_tabla_img">
				<a href="{{ URL::to('perfil').'/'.$perfil->idPerfil }}"><img data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfilesTltImg')}}" src="{{ URL::asset('img\\db_imgs\\'.$perfil->foto) }}"/></a>
			</div>
			<div class="perfil_tabla_info">
				<div class="datos_in">
					<ul class="info_in">
						<li><!--{{Lang::get('messages.perfilesLblNo')}}--> <h5 style="text-transform: capitalize;">{{ $perfil->perfil }}</h5></li>
						<li ><!--{{Lang::get('messages.perfilesLblMa')}}-->  <h5 data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfilesTltMa')}} ">{{ $perfil->mascaras }}</h5><div class="iconos_perfiles"><a href=""  data-id="{{ $perfil->idPerfil }}" data-reveal-id="addFotos" data-relform="frmEvidencia" class="js-perfiles open-modal"><i class="icon-fotos" style="color:#18323b; "></i></a><a href="" data-id="{{ $perfil->idPerfil }}" data-reveal-id="relPerfil" data-relform="frmRelaciones" class="js-perfiles open-modal"><i class="icon-usuarios"style="color:#ae3e34; "></i></a></div></li>
						<!--<li><p>Confesión.- {{ $perfil->confesion }}</p></li>-->
						<!--li>
							<p data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfilesTltRe')}} ">{{Lang::get('messages.perfilesLblRe')}}</p>
							
						</li-->
						<li class="gris_fondo borde_inf_gris"><!--{{Lang::get('messages.perfilesLblLu')}}-->  {{ $perfil->pais }}, {{ $perfil->estado }}</li>
						<li class="gris_fondo" >
							<h5 style="color:#a7a9ab;" data-tooltip aria-haspopup="true" class="has-tip" title="El ID es el número de identificación de un perfil">ID: </h5><h5 style="color:#a7a9ab;"class="flota_der">{{ $perfil->idPerfil }}</h5>
							
						</li>
						<li >
							<p data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.perfilesTltFe')}}"><!--{{Lang::get('messages.perfilesLblFe')}}--></p>
							
						</li>
						
					</ul>
					
				
					<div class="Hidden"><p>Editar Información:</p><a href="{{ URL::to('/crear_perfil').'/'.$perfil->idPerfil }}"><i class="icon-lapiz"></i></a></div>
				</div>
			</div>
		</article>
		@endforeach
		<div id="addFotos" class="reveal-modal" data-reveal>
			<div class="titulo_barra">
				<h3>{{Lang::get('messages.perfilesModFeTit')}}</h3>
			</div>
			<form action="{{ URL::to('evidencias/0') }}" method="post" id="frmEvidencia" enctype="multipart/form-data" class="multi-image">
				<div class="row">
					<div class="large-12 columns isHidden">
						<label>
							Video evidence:
							<input type="text" name="video" placeholder="pegar el link de compartir de youtube"/>
						</label>
					</div>
					<div class="large-12 columns isHidden">
						<label>
							Photo evidence:
							<input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
						</label>
					</div>
					<div class="large-12 columns">
						<label>
							
							<input type="file" id="fotos" name="fotos[]" multiple="multiple" accept="image/*" />
						</label>
					</div>
					<div class="small-12 small columns">
						<button type="submit" class="button "style="background-color:#ae3e34;">{{Lang::get('messages.perfilesModBtnRe')}}</button>
					</div>
				</div>
            </form>
			<a class="close-reveal-modal">&#215;</a>
		</div>

		<div id="relPerfil" class="reveal-modal" data-reveal>
			<div class="titulo_barra">
				<h3>{{Lang::get('messages.perfilesModReH3')}}</h3>
			</div>
			<form action="{{ URL::to('relaciones/0') }}" method="post" id="frmRelaciones">
				<div class="row">
					<div class="large-12 columns">
						<label>
							{{Lang::get('messages.perfilesModLblId')}}
							<input type="text" name="id" placeholder="ID del perfil, pj: 1"/>
						</label>
					</div>
					<div class="small-12 small columns">
						<button type="submit" class="button "style="background-color:#ae3e34;">{{Lang::get('messages.perfilesModBtnRe')}}</button>
					</div>
				</div>
            </form>
			<a class="close-reveal-modal">&#215;</a>
		</div>

		<article>
		</article>
	</section>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.js-perfiles.open-modal').on('click', function(e) {
				debugger
				var id = $(e.currentTarget).data('id'),
					form = $(e.currentTarget).data('relform')

				switch(form) {
					case 'frmRelaciones':
						url += 'relaciones/';
						break;
					default:
						url += 'evidencias/';
						break
				}
				$('#' + form).attr('action', url + id);
			});
		});
	</script>

</section>

@stop