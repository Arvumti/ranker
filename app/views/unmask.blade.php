
@extends('base')
	@section('content')
	<h2 style="font-style:bold">{{Lang::get('messages.unmaskLblQuePregunta')}}</h2>
	<p>{{Lang::get('messages.unmaskLblQueRespuesta')}}</p>
	<h2 style="font-style:bold">{{Lang::get('messages.unmaskLblPorQuePregunta')}}</h2>
	<p>{{Lang::get('messages.unmaskLblPorQueRespuesta')}}</p>
	<h2 style="font-style:bold">{{Lang::get('messages.unmaskLblAnonimoRespuesta')}}</h2>
	<p>{{Lang::get('messages.unmaskLblAnonimoRespuesta')}}</p>
	<h2 style="font-style:bold">{{Lang::get('messages.unmaskLblQuePostPregunta')}}</h2>
	<p>{{Lang::get('messages.unmaskLblQuePostRespuesta')}} </p>

@stop