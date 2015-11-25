<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcomentariosFotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcomentarios_fotos', function($table)
		{
			$table->increments('idSubcomentarioFoto');
			
			$table->integer('idSubcomentario')->unsigned();
			$table->foreign('idSubcomentario')
					->references('idSubcomentario')->on('subcomentarios')
					->onDelete('cascade');

			$table->string('imagen');

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
		Schema::drop('subcomentarios_fotos');
	}

}
