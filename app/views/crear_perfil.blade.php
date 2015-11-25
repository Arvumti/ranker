@extends('base')

@section('content')
	<section class="contenedor_perfiles">	
		<div class="area_add">
			<h2 style="margin-left:25px; margin-top:1.5em;text-align:center;">{{Lang::get('messages.crePerDivTitTitulo')}}</h2>
		</div>
	</section>
	<section class="creacion_perfiles">
		<form action="crear_perfil" method="post" enctype="multipart/form-data" data-abide>
			<div class="row columns">
				<div class="small-4 columns" style="margin-bottom:1em;">
					<a class="th img-logo" href="#">
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltImgFoto')}}"><img  id="imgFoto"  data-ref="cpFoto" class="click-image" src="{{ URL::asset('img\\gente\\masca.png') }}"/> </span>   
						<label>
							<input type="file" id="file" name="foto" class="isHidden cpFoto"  accept="image/*" />
						</label>
					</a>
					<!--h4>{{Lang::get('messages.crePerFrmLblImagen')}}</h4-->
				</div>
				<div class="small-8 columns">
					<div class="row">
						<div class="large-12 columns ">
							<label >
								<b ><span ></span></b>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltTexto')}}" type="text" name="nombre" value="{{Input::old('nombre')}}" placeholder="{{Lang::get('messages.crePerFrmLblNombre')}} - {{Lang::get('messages.crePerTltNombre')}}" required />
							</label>
							<small class="error">{{Lang::get('messages.crePerFrmLblNombreErr')}}</small>
						</div>
						<div class="large-12 columns ">
							<label >
								<b ><span ></span></b>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltTexto')}}" type="text" name="apaterno" value="{{Input::old('apaterno')}}" placeholder="{{Lang::get('messages.crePerFrmLblApellidoPat')}} - {{Lang::get('messages.crePerTltApellidoPaterno')}} " required />
							</label>
							<small class="error">{{Lang::get('messages.crePerFrmLblApellidoPatErr')}}</small>
						</div>
						<div class="large-12 columns ">
							<label >
								<b ><span></span></b>
								<input  data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltTexto')}}" type="text" name="amaterno" value="{{Input::old('amaterno')}}" placeholder="{{Lang::get('messages.crePerFrmLblApellidoMat')}} - {{Lang::get('messages.crePerTltApellidoMaterno')}}" required />
							</label>
							<small class="error">{{Lang::get('messages.crePerFrmLblApellidoMatErr')}}</small>
						</div>
						
						<div class="small-12 columns ">
							<label>
								<b ><span ></span></b>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltApodo')}}" type="text" name="apodo" placeholder="{{Lang::get('messages.crePerFrmLblApodo')}} - {{Lang::get('messages.crePerTltApodo')}}" />
							</label>
							<div class="gv-apodos">
								@if(strlen(Input::old('apodos')) > 0)
									@foreach(explode(",", Input::old('apodos')) as $apodo)
										<label class="letras_rojo">
											<span class="texto">{{$apodo}}</span>
											<span class="cerrar">x</span>
										</label>
									@endforeach
								@endif
							</div>
							<input type="text" class="fake-apodos isHidden" value="{{Input::old('apodos')}}" name="apodos"/>
						</div>
					</div>
				</div>
				<div class="large-12">
						<div class="large-12 columns ">
							<label>
							<span ></span>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltAdvertenciaDatos')}}" type="text" name="pais" value="{{Input::old('pais')}}" placeholder="{{Lang::get('messages.crePerFrmLblPais')}}" class="typeahead"/>
							</label>
						</div>
						<div class="large-12 columns ">
							<label>
								<span ></span>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltAdvertenciaDatos')}}" type="text" name="estado" value="{{Input::old('estado')}}" placeholder="{{Lang::get('messages.crePerFrmLblEstado')}}"class="typeahead"/>
							</label>
						</div>
						<div class="large-4 columns ">
							<label>
							<span ></span>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltAdvertenciaDatos')}}" type="text" name="municipio" value="{{Input::old('municipio')}}" placeholder="{{Lang::get('messages.crePerFrmLblMunicipio')}}"class="typeahead"/>
							</label>
						</div>
						<div class="large-4 columns ">
							<label>
							<span >	</span>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltAdvertenciaDatos')}}" type="text" name="ciudad" value="{{Input::old('ciudad')}}" placeholder="{{Lang::get('messages.crePerFrmLblCiudad')}}" class="typeahead"/>
							</label>
						</div>
						<div class="large-4 columns ">
							<label>
								<span ></span>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltAdvertenciaDatos')}}" type="text" name="colonia" value="{{Input::old('colonia')}}" placeholder="{{Lang::get('messages.crePerFrmLblColonia')}}"class="typeahead" />
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
					<div class="large-12 columns">
						<div class="red_titulo"><h4>{{Lang::get('messages.crePerFrmTitRedesSociales')}}</h4></div>
						<div class="large-4 columns ">
							
							
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltSocial')}}" type="text" name="facebook" value="{{Input::old('facebook')}}" placeholder="{{Lang::get('messages.crePerFrmLblFacebook')}} - http://facebook.com/profile" />
						</div>
						<div class="large-4 columns ">
						
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltSocialExtra')}}" type="text" name="twitter" value="{{Input::old('twitter')}}" placeholder="{{Lang::get('messages.crePerFrmLblTwitter')}} - http://twitter.com/profile" />
							
						</div>
						<div class="large-4 columns ">
						
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltSocialExtra')}}" type="text" name="instagram" value="{{Input::old('instagram')}}" placeholder="{{Lang::get('messages.crePerFrmLblInstagram')}} - http://instagram.com/profile" />
							
						</div>
					</div>


					

						
						

						<div class="small-12 columns " style="margin-bottom:3em;">
							<div class="red_titulo"><h4>{{Lang::get('messages.crePerFrmTitMascaras')}}</h4></div>
							<div class="red_titulo">
							<p style="color:#ae3e34"><strong>{{Lang::get('messages.crePerFrmLblMascarasClasificacion')}}</strong> {{Lang::get('messages.crePerFrmLblMascarasOpt')}}</p>
							</div>
							<label>
								<span ></span>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltConsejoMascaras')}}" type="text" name="mascara" class="typeahead" placeholder="{{Lang::get('messages.crePerFrmLblMascaraSeleccionada')}} - {{Lang::get('messages.crePerTltConsejoMascaras1')}}" />
							</label>
							<div class="gv-mascaras">
								@if(strlen(Input::old('mascaras')) > 0)
									@foreach(explode(",", Input::old('mascaras')) as $mascara)
										<label class="letras_rojo">
											<span class="texto">{{$mascara}}</span>
											<span class="cerrar">x</span>
										</label>
									@endforeach
								@endif
							</div>
							<input type="text" class="fake-mascaras isHidden" value="{{Input::old('mascaras')}}" name="mascaras"/>
						</div>
						<div class="small-12 columns"> 
						
						</div>
						<div class="small-12 columns">
					        <!-- Captcha image html-->
					        {{ $data['captchaHtml'] }}
					        <br/><br/>
					    </div>
						<div class="small-12 columns" style="margin-top:15px;">
							<label for="CaptchaCode"></label>

							<!-- Captcha code user input textbox -->
							<input id="CaptchaCode" placeholder="{{Lang::get('messages.crePerFrmLblCaptcha')}}" class="form-control" name="CaptchaCode" type="text" style="text-transform: uppercase;">
						</div>

						<div class="small-12 columns">
							<br/>
						</div>
						<div class="small-12 " >
							<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltTexto')}}"><button type="submit" class="button  flota_der"style="background-color:#18232b;margin-left:200px;">{{Lang::get('messages.crePerFrmBtnGuardar')}}</button></span>
							<a href="{{ URL::to('/perfiles') }}" class="button  flota_der"style="background-color:#ae3e34;">{{Lang::get('messages.crePerFrmBtnCancelar')}}</a>
							
						</div>
						<div class="small-6 columns">
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
			<!--div class="info_importante formulario_alinear" style="color:red;font-family:bold; text-align:justify">{{Lang::get('messages.crePerFrmLblAdvertencia')}}</div-->
		</form>
	</section>
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
				$('.gv-mascaras').append('<label class="letras_rojo"><span class="texto">' + texto + '</span> <span class="cerrar">x</span></label>');
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
				$('.gv-apodos').append('<label class="letras_rojo"><span class="texto">' + texto + '</span> <span class="cerrar">x</span></label>');
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