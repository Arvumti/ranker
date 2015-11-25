@extends('base')

@section('content')
<div class="titulo_barra">
	<h3>{{Lang::get('messages.editPerHedTitCrearCuenta')}}</h3>
</div>

<form action="crear_perfil" method="post" enctype="multipart/form-data" data-abide>
	<div class="row">
		<div class="small-4 columns">
			<a class="th img-logo" href="#">
				<img id="imgFoto" data-ref="cpFoto" class="click-image" src="{{ URL::asset('img\\gente\\user.jpg') }}"/>    
				<label>
					<input type="file" id="file" name="foto" class="isHidden cpFoto"  accept="image/*" required />
				</label>
				<small class="error">{{Lang::get('messages.editPerFrmLblImagenRequerida')}}</small>
			</a>
		</div>
		<div class="small-8 columns">
			<div class="row">
				<div class="large-12 columns ">
					<label>
						<b>{{Lang::get('messages.editPerFrmLblNombrePerfil')}}</b> <small>{{Lang::get('messages.editPerFrmLblNombrePerfilVal')}}</small>
						<input type="text" name="nombre" placeholder="Nombre de la persona del perfil" required />
					</label>
					<small class="error">{{Lang::get('messages.editPerFrmLblNombrePerfilErr')}}</small>
				</div>
				<div class="large-12 columns ">
					<label>
						{{Lang::get('messages.editPerFrmLblPais')}}
						<input type="text" name="pais" class="typeahead"/>
					</label>
				</div>
				<div class="large-12 columns ">
					<label>
						{{Lang::get('messages.editPerFrmLblEstado')}}
						<input type="text" name="estado" class="typeahead"/>
					</label>
				</div>
				<div class="large-4 columns ">
					<label>
						{{Lang::get('messages.editPerFrmLblMunicipio')}}
						<input type="text" name="municipio"/>
					</label>
				</div>
				<div class="large-4 columns ">
					<label>
						{{Lang::get('messages.editPerFrmLblCiudad')}}
						<input type="text" name="ciudad"/>
					</label>
				</div>
				<div class="large-4 columns ">
					<label>
						{{Lang::get('messages.editPerFrmLblColonia')}}
						<input type="text" name="colonia"/>
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
				<div class="large-4 columns ">
					<label>
						{{Lang::get('messages.editPerFrmLblFacebook')}}
						<input type="text" name="facebook" placeholder="http://facebook.com/perfil" />
					</label>
				</div>
				<div class="large-4 columns ">
					<label>
						{{Lang::get('messages.editPerFrmLblTwitter')}}
						<input type="text" name="twitter" placeholder="http://twitter.com/perfil" />
					</label>
				</div>
				<div class="large-4 columns ">
					<label>
						{{Lang::get('messages.editPerFrmLblInstagram')}}
						<input type="text" name="instagram" placeholder="http://instagram.com/perfil" />
					</label>
				</div>
				<div class="small-12 columns ">
					<label>
						{{Lang::get('messages.editPerFrmLblMascara')}}
						<input type="text" name="mascara" class="typeahead" placeholder="Escribe una mascara, si existen coincidencias selecciona, si no existe agregala!" />
					</label>
					<div class="gv-mascaras">					
					</div>
					<input type="text" class="fake-mascaras isHidden" name="mascaras"/>
				</div>
				<div class="small-12 columns"> 
				
				</div>
				<!--<div class="large-4 columns ">
					<label>
						Máscara:
						<select name="mascara1">
							<option value="0">Seleccionar mascara</option>
							@foreach($data['mascaras'] as $mascara)
								<option value="{{ $mascara->idMascara }}">{{ $mascara->nombre }}</option>
							@endforeach
						</select>
					</label>
				</div>-->
				<!--<div class="large-4 columns">
					<label>
						Máscara:
						<select name="mascara2">
							<option value="0">Seleccionar mascara</option>
							@foreach($data['mascaras'] as $mascara)
								<option value="{{ $mascara->idMascara }}">{{ $mascara->nombre }}</option>
							@endforeach
						</select>
					</label>  
				</div> -->
				<!--<div class="small-12 columns">
					<label>
						SECRET BOX (algo especial para el MURO) <small>Requerido</small>
						<input type="text" placeholder="Ejemplo.- LE ROBA A LOS POBRE Y LASTIMA INOCENTES" name="secret" required>
						<small class="error">El secret box es requerido</small>
					</label>
				</div>
				<div class="small-12 columns">
					<label>
						Confesion: <small>Requerido</small>
						<textarea placeholder="Confesión" name="confesion" required></textarea>
					</label>
					<small class="error">El secret box es requerido</small>
				</div>-->

				<div class="small-12 columns">
					<br/>
				</div>
				<div class="small-6 columns">
					<button type="submit" class="button success" style="border-radius:5px"><i class="icon-disco"></i>{{Lang::get('messages.editPerFrmBtnGuardar')}}</button>
				</div>
				<div class="small-6 columns">
					<a href="{{ URL::to('/perfiles') }}" class="button alert" style="border-radius:5px"><i class="icon-tacha"></i>{{Lang::get('messages.editPerFrmLblCancelar')}}</a>
				</div>
			</div>
			@if($errors->any())
				<br/><br/>
				@foreach ($errors->all() as $error)
				<div class="small-12 columns">
					<div class="alert alert-success" role="alert">** {{ $error }}</div>
				</div>
				@endforeach
			@endif
		</div>
	</div>
	
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
	}
</script>
@stop