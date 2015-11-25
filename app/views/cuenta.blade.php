@extends('base')

@section('content')
	<section class="cuenta hidden">
		<div class="container blanco">
			<div class="small-4 columns formulario_alinear">
				<a class="" href="#">
					<img src="{{ URL::asset('img\\gente\\user.jpg') }}"/>    
				</a>
			</div>  
			<div class="large-8 columns">
			
				<h2>{{Lang::get('messages.cuenHedLblUsuario')}} {{ $alias->nombre }}</h2>

				<form action="/public/update_pass" method="post" data-abide>	
					<div class="large-12">
						<h3>{{Lang::get('messages.cuenHedLblCambiarContra')}}</h3>
					</div>
					<div class="large-12">
						<label>
							{{Lang::get('messages.cuenHedLblContrasenia')}}
							<input type="password" name="contrasenia_act" required/>
						</label>
						<small class="error">{{Lang::get('messages.cuenHedLblContraseniaVal')}}</small>
					</div>
					<div class="large-12">
						<label>
							{{Lang::get('messages.cuenHedLblNuevaContrasenia')}}
							<input type="password" id="contrasenia" name="contrasenia" required/>
						</label>
						<small class="error">{{Lang::get('messages.cuenHedLblNuevaContraseniaVal')}}</small>
					</div>
					<div class="large-12">
						<label>
							{{Lang::get('messages.cuenHedLblNuevaContraseniaConf')}}
							<input type="password" name="contrasenia_sec" data-equalto="contrasenia" required/>
						</label>
						<small class="error">{{Lang::get('messages.cuenHedLblNuevaContraseniaConfVal')}}</small>
					</div>
					<div class="large-12">
						<button type="submit" class="button" style="border-radius:5px">{{Lang::get('messages.cuenHedBtnCambiarcontrasenia')}}</button>
					</div>
				</form>
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
	</section>
@stop