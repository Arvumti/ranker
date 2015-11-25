@extends('base')

@section('content')
<div class="titulo_barra">
	<h2 style="margin-left:25px; margin-top:1.5em">{{Lang::get('messages.updtTitLblCrear')}}</h2>
</div>

<form action="/public/crear_perfil/{{$data['perfil']->idPerfil}}" method="post" enctype="multipart/form-data" data-abide>	
	<div class="row columns">
		<div class="small-4 columns">
			<a class="th img-logo" href="#">
				<img id="imgFoto" data-ref="cpFoto" class="click-image" src="{{ URL::asset('img\\db_imgs\\'.$data['perfil']->foto) }}"/>    
				<label>
					<input type="file" id="file" name="foto" class="isHidden cpFoto"  accept="image/*" />
				</label>
			</a>
			<h4>{{Lang::get('messages.updtFrmLblImagen')}}</h4>
		</div>
		<div class="small-8 columns">
			<div class="row">
				<div class="large-12 columns ">
					<label >
						<b ><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltNombre')}}">{{Lang::get('messages.updtFrmLblNombre')}}</span></b>
						<input type="text" name="nombre" value="{{$data['perfil']->nombre}}" placeholder="{{Lang::get('messages.updtTltNombreVal')}}" required />
					</label>
					<small class="error">{{Lang::get('messages.updtFrmLblNombreVal')}}</small>
				</div>
				<div class="large-12 columns ">
					<label >
						<b ><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltApellidoPaterno')}}">{{Lang::get('messages.updtFrmLblApellidoPaterno')}}</span></b>
						<input type="text" name="apaterno" value="{{$data['perfil']->apaterno}}" placeholder="{{Lang::get('messages.updtTltApellidoPaternoVal')}}" required />
					</label>
					<small class="error">{{Lang::get('messages.updtFrmLblApellidoPaternoVal')}}</small>
				</div>
				<div class="large-12 columns ">
					<label >
						<b ><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltApellidoMaterno')}}">{{Lang::get('messages.updtFrmLblApellidoMaterno')}}</span></b>
						<input type="text" name="amaterno" value="{{$data['perfil']->amaterno}}" placeholder="{{Lang::get('messages.updtTltApellidoMaternoVal')}}" required />
					</label>
					<small class="error">{{Lang::get('messages.updtFrmLblApellidoMaternoVal')}}</small>
				</div>

				<div class="large-12 columns ">
					<label>
					<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltAdvertenciaDatos')}}">	{{Lang::get('messages.updtFrmLblPais')}}</span>
						<input type="text" name="pais" value="{{$data['perfil']->pais}}" class="typeahead"/>
					</label>
				</div>
				<div class="large-12 columns ">
					<label>
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltAdvertenciaDatos')}}">{{Lang::get('messages.updtFrmLblEstado')}}</span>
						<input type="text" name="estado" value="{{$data['perfil']->estado}}" class="typeahead"/>
					</label>
				</div>
				<div class="large-4 columns ">
					<label>
					<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltAdvertenciaDatos')}}">{{Lang::get('messages.updtFrmLblMunicipio')}}</span>
						<input type="text" name="municipio" value="{{$data['perfil']->municipio}}" class="typeahead"/>
					</label>
				</div>
				<div class="large-4 columns ">
					<label>
					<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltAdvertenciaDatos')}}">	{{Lang::get('messages.updtFrmLblCiudad')}}</span>
						<input type="text" name="ciudad" value="{{$data['perfil']->ciudad}}" class="typeahead"/>
					</label>
				</div>
				<div class="large-4 columns ">
					<label>
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltAdvertenciaDatos')}}">{{Lang::get('messages.updtFrmLblColonia')}}</span>
						<input type="text" name="colonia" value="{{$data['perfil']->colonia}}" class="typeahead" />
					</label>
				</div>
				<!--div class="large-6 columns ">
					<label>
						Municipio:
						<input type="text" name="" placeholder="Municipio" />
					</label>
				</div>
				<div class="large-6 columns ">
					<label>
						Colonia:
						<input type="text" name="" placeholder="Colonia" />
					</label>
				</div-->
				<div class="red_titulo"><h4>{{Lang::get('messages.updtFrmTitRedesSociales')}}:</h4></div>
				<div class="large-4 columns ">
					
					<label>
						<span  data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltSocial')}}"> {{Lang::get('messages.updtFrmLblFacebook')}}</span>
						<input type="text" name="facebook" value="{{$data['perfil']->facebook}}" placeholder="http://facebook.com/perfil" />
					</label>
				</div>
				<div class="large-4 columns ">
					<label>
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltSocialExtra')}}">{{Lang::get('messages.updtFrmLblTwitter')}}</span>
						<input type="text" name="twitter" value="{{$data['perfil']->twitter}}" placeholder="http://twitter.com/perfil" />
					</label>
				</div>
				<div class="large-4 columns ">
					<label>
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltSocialExtra')}}">{{Lang::get('messages.updtFrmLblInstagram')}}</span>
					
						<input type="text" name="instagram" value="{{$data['perfil']->instagram}}" placeholder="http://instagram.com/perfil" />
					</label>
				</div>

				<div class="red_titulo"><h4>{{Lang::get('messages.updtFrmLblApodo')}}:</h4></div>
				<div class="small-12 columns ">
					<label>
						<b ><span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltApodo')}}">{{Lang::get('messages.updtFrmLblApodo')}}</span></b>
						<input type="text" name="apodo" placeholder="{{Lang::get('messages.updtTltApodoVal')}}" />
					</label>
					<div class="gv-apodos">
						@foreach($data['perfil']->apods as $apodo)
							<label>
								<span class="texto">{{$apodo}}</span>
								<span class="cerrar">x</span>
							</label>
						@endforeach
					</div>
					<input type="text" class="fake-apodos isHidden" value="{{$data['perfil']->apodos}}" name="apodos"/>
				</div>

				<div class="red_titulo"><h4>{{Lang::get('messages.updtFrmTitMascaras')}}:</h4></div>
				<div class="red_titulo"><p><strong>{{Lang::get('messages.updtFrmLblMascarasClasificacion')}}</strong> {{Lang::get('messages.updtFrmLblMascarasOpt')}}</p>
				</div>

				<div class="small-12 columns ">
					<label>
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.updtTltConsejoMascaras')}}">{{Lang::get('messages.updtFrmLblMascaraSeleccionada')}} </span>
						<input type="text" name="mascara" class="typeahead" placeholder="{{Lang::get('messages.updtTltConsejoMascaras1')}}" />
					</label>
					<div class="gv-mascaras">
						@foreach($data['perfil']->masks as $mascara)
							<label>
								<span class="texto">{{$mascara}}</span>
								<span class="cerrar">x</span>
							</label>
						@endforeach					
					</div>
					<input type="text" class="fake-mascaras isHidden" value="{{$data['perfil']->mascaras}}" name="mascaras"/>
				</div>
				<div class="small-12 columns"> 
				
				</div>

				<div class="small-12 columns">
					<br/>
				</div>
				<div class="small-6 columns">
					<button type="submit" class="button success"style="border-radius:5px"><i class="icon-disco"></i>{{Lang::get('messages.updtFrmBtnGuardar')}}</button>
				</div>
				<div class="small-6 columns">
					<a href="{{ URL::to('/perfiles') }}" class="button alert"style="border-radius:5px"><i class="icon-tacha"></i>{{Lang::get('messages.updtFrmBtnCancelar')}}</a>
				</div>
			</div>
			@if($errors->any())
				<br/><br/>
				@foreach ($errors->all() as $error)
				<div class="small-12 columns">
					<div class="label alert" role="alert">** {{ $error }}</div>
				</div>
				@endforeach
			@endif
		</div>
		
	</div>
	<div class="info_importante formulario_alinear" style="color:red;font-family:bold; text-align:justify">{{Lang::get('messages.updtFrmLblAdvertencia')}}</div>
	
	
	<br/><br/>
	
</form>

<script type="text/javascript">
	$(document).on('ready', inicio_cp);

	function inicio_cp () {
		$(document).foundation();

		$('.gv-mascaras').on('click', 'label', function(e) {
			$(e.currentTarget).remove();
			
			render_masks();
		});

		var jsonEs = {
			elem: $('input.typeahead[name="estado"]'),
			dKey: 'nombre',
			modulo: 'estados',
		};
		typeahead(jsonEs);

		var jsonPa = {
			elem: $('input.typeahead[name="pais"]'),
			dKey: 'nombre',
			modulo: 'paises',
		};
		typeahead(jsonPa);

		var jsonMa = {
			elem: $('input.typeahead[name="mascara"]'),
			dKey: 'nombre',
			modulo: 'mascaras',
		};
		typeahead(jsonMa);

		var jsonMu = {
			elem: $('input.typeahead[name="municipio"]'),
			dKey: 'nombre',
			modulo: 'municipios',
		};
		typeahead(jsonMu);

		var jsonCi = {
			elem: $('input.typeahead[name="ciudad"]'),
			dKey: 'nombre',
			modulo: 'ciudades',
		};
		typeahead(jsonCi);

		var jsonCo = {
			elem: $('input.typeahead[name="colonia"]'),
			dKey: 'nombre',
			modulo: 'colonias',
		};
		typeahead(jsonCo);

		jsonMa.elem.on('keypress', function(e, datum) {
			if(e.which == 13) {
				e.preventDefault();
				var texto = $(e.currentTarget).val();
				add_mask(texto);
				$(e.currentTarget).val('');
			}
		})
		.on('typeahead:selected typeahead:autocompleted', function(e, datum) {
			add_mask(datum.nombre);
			setTimeout(function() {
				$(e.currentTarget).val('');
			}, 10);
		});

		function add_mask(texto) {
			if(texto.length > 0 && $('.gv-mascaras label span:contains("' + texto + '")').length == 0) {
				$('.gv-mascaras').append('<label><span class="texto">' + texto + '</span> <span class="cerrar">x</span></label>');
				render_masks();
			}
		}

		function render_masks() {
			var spans = $('.gv-mascaras label span.texto');
			var masks = Array();
			for (var i = 0; i < spans.length; i++) {
				masks.push(spans.eq(i).text());
			};
			$('.fake-mascaras').val(masks.join(', '));
		}

		$('.gv-apodos').on('click', 'label', function(e) {
			$(e.currentTarget).remove();
			
			render_masks();
		});

		$('[name="apodo"]').on('keypress', function(e, datum) {
			if(e.which == 13) {
				e.preventDefault();
				var texto = $(e.currentTarget).val();
				add_apodo(texto);
				$(e.currentTarget).val('');
			}
		})

		function add_apodo(texto) {
			if(texto.length > 0 && $('.gv-apodos label span:contains("' + texto + '")').length == 0) {
				$('.gv-apodos').append('<label><span class="texto">' + texto + '</span> <span class="cerrar">x</span></label>');
				render_apodos();
			}
		}

		function render_apodos() {
			var spans = $('.gv-apodos label span.texto');
			var masks = Array();
			for (var i = 0; i < spans.length; i++) {
				masks.push(spans.eq(i).text());
			};
			$('.fake-apodos').val(masks.join(', '));
		}
	}
</script>
@stop