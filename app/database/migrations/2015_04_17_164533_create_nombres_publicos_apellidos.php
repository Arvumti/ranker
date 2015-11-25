<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNombresPublicosApellidos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nombres_publicos', function($table)
		{
			$table->increments('idNombrePublico');
			$table->integer('idPerfil')->unsigned();
			$table->foreign('idPerfil')
					->references('idPerfil')->on('perfiles')
					->onDelete('cascade');

			$table->integer('idAlias')->unsigned();
			$table->foreign('idAlias')
					->references('idAlias')->on('alias')
					->onDelete('cascade');

			$table->string('nombre');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nombres_publicos');
	}

}
