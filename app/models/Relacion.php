<?php

class Relacion extends Model {
	protected $table = 'relaciones';

	protected static $rules = [
        'idPerfilBase' => 'unique_with:relaciones,idPerfilRelacion'
    ];

    //Use this for custom messages
    protected static $messages = [
        'idPerfilBase.unique_with' => "{{Lang::get('messages.relPerfilUnico')}}"
    ];
}
