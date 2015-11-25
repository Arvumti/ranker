<?php

class Perfil extends Model {
	protected $table = 'perfiles';

	protected static $rules = [
        'nombre' => 'required',
        //'confesion' => 'required',
        //'foto' => 'required'
    ];

    //Use this for custom messages
    protected static $messages = [
        'nombre.required' => "{{Lang::get('messages.perfNombreRequerido')}}",
        //'confesion.required' => 'Se debe especificar la confesion.',
        //'foto.required' => 'Se debe especificar la foto.'
    ];
}
