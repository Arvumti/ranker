<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksSubfotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ranks_subfotos', function($table)
		{
			$table->increments('idRankSubfoto');
			
			$table->integer('idSubcomentarioFoto')->unsigned();
			$table->foreign('idSubcomentarioFoto')
					->references('idSubcomentarioFoto')->on('subcomentarios_fotos')
					->onDelete('cascade');

			$table->integer('idAlias')->unsigned();
			$table->foreign('idAlias')
					->references('idAlias')->on('alias')
					->onDelete('cascade');

			$table->integer('corazon');
			$table->integer('estrella');
			$table->integer('blike');
			$table->integer('carita');
			$table->integer('cake');

			$table->integer('caca');
 			$table->integer('craneo');
 			$table->integer('bug');
 			$table->integer('gota');
 			$table->integer('enojo');

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
		Schema::drop('ranks_subfotos');
	}

}
