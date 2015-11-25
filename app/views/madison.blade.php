@extends('base')

@section('content')
	<section class="area_buscador">	
			<div class="busqueda">
				<input style="padding-left:15px" type="text" class="txt-buscarMad" placeholder="{{Lang::get('messages.basePlhBusca')}}">
				<div class="busqueda-resultado isHidden">		
				</div>
			</div>
			<!--div class="filtro">
				<a class="" data-reveal-id="">	<i class="icon-filter"></i></a>
			</div-->
			<div class="buscar rojo_fondo">
				<a id="btn-madison" class="base-button"><i class="icon-buscar"></i></a>
			</div>
	</section>			
	<section id="h1-perfiles">
		<div class="contenedor_perfiles perfiles isHidden">
			<table class="gv-perfiles">
				<thead>
					<tr>
						<th>NICKNAME</th>
						<th>FIRST_NAME</th>
						<th>LAST_NAME</th>
						<th>ZIP</th>
						<th>BIRTHDAY</th>
						<th>EMAIL</th>
						<th>COUNTY</th>
						<th>GENDER</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</section>

	<section class="creacion_perfiles isHidden">
		<form action="crear_perfil_madison" method="post" enctype="multipart/form-data" data-abide>
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
								<input data-tooltip aria-haspopup="true" class="has-tip isHidden" title="{{Lang::get('messages.crePerTltTexto')}}" type="text" name="nombre" value="{{Input::old('nombre')}}" placeholder="{{Lang::get('messages.crePerFrmLblNombre')}} - {{Lang::get('messages.crePerTltNombre')}}" required />
							</label>
							<small class="error">{{Lang::get('messages.crePerFrmLblNombreErr')}}</small>
						</div>
						<div class="large-12 columns ">
							<label >
								<b ><span ></span></b>
								<input data-tooltip aria-haspopup="true" class="has-tip isHidden" title="{{Lang::get('messages.crePerTltTexto')}}" type="text" name="apaterno" value="{{Input::old('apaterno')}}" placeholder="{{Lang::get('messages.crePerFrmLblApellidoPat')}} - {{Lang::get('messages.crePerTltApellidoPaterno')}} " required />
							</label>
							<small class="error">{{Lang::get('messages.crePerFrmLblApellidoPatErr')}}</small>
						</div>
						
						
						<div class="small-12 columns ">
							<label>
								<b ><span ></span></b>
								<input data-tooltip aria-haspopup="true" class="has-tip isHidden" title="{{Lang::get('messages.crePerTltApodo')}}" type="text" name="apodo" placeholder="{{Lang::get('messages.crePerFrmLblApodo')}} - {{Lang::get('messages.crePerTltApodo')}}" />
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

						<div class="large-12 columns isHidden">
							<label>
							<span ></span>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltAdvertenciaDatos')}}" type="text" name="pais" value="{{Input::old('pais')}}" placeholder="{{Lang::get('messages.crePerFrmLblPais')}}" class="typeahead"/>
							</label>
						</div>

						<div class="large-12 columns isHidden">
							<label>
							<span >	</span>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltAdvertenciaDatos')}}" type="text" name="ciudad" value="{{Input::old('ciudad')}}" placeholder="{{Lang::get('messages.crePerFrmLblCiudad')}}" class="typeahead"/>
							</label>
						</div>

						<div class="large-12 columns isHidden">
							<label>
								<span ></span>
								<input data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltAdvertenciaDatos')}}" type="text" name="colonia" value="{{Input::old('colonia')}}" placeholder="{{Lang::get('messages.crePerFrmLblColonia')}}"class="typeahead" />
							</label>
						</div>
					</div>
				</div>
				<div class="large-8 columns">
					<div class="large-12 columns">
						<div class="large-4 columns ">
							<label >
								<b ><span></span></b>
								<input  data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltTexto')}}" type="text" name="amaterno" value="&nbsp;" placeholder="{{Lang::get('messages.crePerFrmLblApellidoMat')}} - {{Lang::get('messages.crePerTltApellidoMaterno')}}" required />
							</label>
							<small class="error">{{Lang::get('messages.crePerFrmLblApellidoMatErr')}}</small>
						</div>					
						<div class="large-4 columns ">
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
					</div>
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
				</div>

				<div class="large-12 columns">
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
						<span data-tooltip aria-haspopup="true" class="has-tip" title="{{Lang::get('messages.crePerTltTexto')}}">
							<button type="submit" class="button  flota_der button-save"style="background-color:#18232b;margin-left:200px;">{{Lang::get('messages.crePerFrmBtnGuardar')}}</button>
						</span>
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
		var data_info = Array();
		$(document).ready(function() {
			var tmp_datos = Handlebars.compile($('.tmp-datos').html());

			$('.gv-perfiles tbody').on('click', 'tr', function(e) {
				var id = $(e.currentTarget).data('id');
				var row = _.findWhere(data_info, {'PEOPLE_ID':id});

				if(row) {
					$('[name="nombre"]').val(row['FIRST_NAME']);
					$('[name="apaterno"]').val(row['LAST_NAME']);
					$('[name="apodo"]').val(row['NICKNAME']);
					$('[name="pais"]').val(row['COUNTRY_NAME']);
					$('[name="ciudad"]').val(row['CITY']);
					$('[name="colonia"]').val(row['STREET']);

					//$('.creacion_perfiles').removeClass('isHidden');
					$('.button-save').click();
				}
			});

			$('#btn-madison').on('click', function() {
				var busqueda = $('.txt-buscarMad').val();

				if(busqueda.length == 0) {
					$('.txt-buscarMad').focus();
					return;
				}

				var data =  {
					buav_id: busqueda || ''
				}

				$.get('madison/data', {query:busqueda}).done(function(data) {
					debugger
					if(data.length == 0)
						alert('No se encontraron datos');
					else {
						data_info = data || [];
						var table = tmp_datos({data:data});
						$('.contenedor_perfiles .gv-perfiles tbody').html(table);
						$('.contenedor_perfiles .gv-perfiles tbody tr').eq(0).click();
						alert('Datos encontrados! Puedes crear el perfil');
					}
				});
			});			
		});
	</script>

	<script class="tmp-datos" type="text/x-handlebars-template">
		[[#data]]
		<tr data-id="[[PEOPLE_ID]]">
			<td>[[NICKNAME]]</td>
			<td>[[FIRST_NAME]]</td>
			<td>[[LAST_NAME]]</td>
			<td>[[ZIP]]</td>
			<td>[[BIRTHDAY]]</td>
			<td>[[EMAIL]]</td>
			<td>[[COUNTY]]</td>
			<td>[[GENDER]]</td>
		</tr>
		[[/data]]
	</script>
@stop