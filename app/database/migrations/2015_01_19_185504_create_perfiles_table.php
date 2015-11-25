<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perfiles', function($table)
		{
			$table->increments('idPerfil');
			$table->integer('idAlias')->unsigned();
			$table->foreign('idAlias')
					->references('idAlias')->on('alias')
					->onDelete('cascade');
			/*$table->integer('idUbicacion')->unsigned();
			$table->foreign('idUbicacion')
					->references('idUbicacion')->on('ubicaciones')
					->onDelete('cascade');*/
			$table->string('nombre');
			$table->string('mascaras');
			$table->string('confesion');
			$table->string('facebook');
			$table->string('twitter');
			$table->string('instagram');
			$table->string('secret');
			$table->string('secret_pub');
			$table->string('foto');
			$table->string('pais');
			$table->string('estado');
			$table->string('municipio');
			$table->string('ciudad');
			$table->string('colonia');
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
		Schema::drop('perfiles');
	}

}
