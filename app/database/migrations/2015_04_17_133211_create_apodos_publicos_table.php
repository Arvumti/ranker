<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApodosPublicosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apodos_publicos', function($table)
		{
			$table->increments('idApodoPublico');
			$table->integer('idPerfil')->unsigned();
			$table->foreign('idPerfil')
					->references('idPerfil')->on('perfiles')
					->onDelete('cascade');

			$table->integer('idAlias')->unsigned();
			$table->foreign('idAlias')
					->references('idAlias')->on('alias')
					->onDelete('cascade');

			$table->string('apodo');

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
		Schema::drop('apodos_publicos');
	}

}
