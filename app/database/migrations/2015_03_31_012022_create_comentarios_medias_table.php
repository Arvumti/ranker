<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosMediasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comentarios_medias', function($table)
		{
			$table->increments('idComentarioMedia');
			$table->integer('idMedia')->unsigned();
			$table->foreign('idMedia')
					->references('idMedia')->on('medias')
					->onDelete('cascade');
					
			$table->integer('idAlias')->unsigned();
			$table->foreign('idAlias')
					->references('idAlias')->on('alias')
					->onDelete('cascade');

			$table->string('comentario');
			
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
		Schema::drop('comentarios_medias');
	}

}
