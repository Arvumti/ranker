<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosSubfotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comentarios_subfotos', function($table)
		{
			$table->increments('idComentarioSubfoto');

			$table->integer('idSubcomentarioFoto')->unsigned();
			$table->foreign('idSubcomentarioFoto')
					->references('idSubcomentarioFoto')->on('subcomentarios_fotos')
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
		Schema::drop('comentarios_subfotos');
	}

}
