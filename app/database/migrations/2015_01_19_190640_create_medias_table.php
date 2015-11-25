<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medias', function($table)
		{
			$table->increments('idMedia');
			$table->integer('idPerfil')->unsigned();
			$table->foreign('idPerfil')
					->references('idPerfil')->on('perfiles')
					->onDelete('cascade');
			$table->string('foto');
			$table->string('link');
			$table->integer('tipo');
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
		Schema::drop('medias');
	}

}
