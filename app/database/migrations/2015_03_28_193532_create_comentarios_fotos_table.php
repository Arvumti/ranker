<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosFotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comentarios_fotos', function($table)
		{
			$table->increments('idComentarioFoto');
			$table->integer('idFotoPost')->unsigned();
			$table->foreign('idFotoPost')
					->references('idFotoPost')->on('fotos_posts')
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
		Schema::drop('comentarios_fotos');
	}

}
