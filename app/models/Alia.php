<?php

class Alia extends Model {
	protected $table = 'alias';

	protected static $rules = [
        'nombre' => 'required|unique:alias',
        //'correo' => 'required|unique:alias',
        'password' => 'required'
    ];

    //Use this for custom messages
    protected static $messages = [
        'nombre.required' => "{{Lang::get('messages.aliaNombreRequerido')}}",
        'nombre.unique' 	=> "{{Lang::get('messages.aliaNombreUnico')}}",
        //'correo.required' => 'Se debe especificar el correo.',
        //'correo.unique'   => 'El correo que se especifico ya esta siendo utilizado.',
        'password.required' => "{{Lang::get('messages.aliaContraseniaRequerido')}}",
    ];
}
