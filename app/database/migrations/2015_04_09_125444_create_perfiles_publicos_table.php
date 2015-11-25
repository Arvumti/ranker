<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilesPublicosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perfiles_publicos', function($table)
		{
			$table->increments('idPerfilPublico');
			$table->integer('idPerfilBase')->unsigned();
			$table->foreign('idPerfilBase')
					->references('idPerfil')->on('perfiles')
					->onDelete('cascade');

			$table->integer('idAlias')->unsigned();
			$table->foreign('idAlias')
					->references('idAlias')->on('alias')
					->onDelete('cascade');

			$table->integer('idPerfilRelacion')->unsigned();
			$table->foreign('idPerfilRelacion')
					->references('idPerfil')->on('perfiles')
					->onDelete('cascade');

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
		Schema::drop('perfiles_publicos');
	}

}
