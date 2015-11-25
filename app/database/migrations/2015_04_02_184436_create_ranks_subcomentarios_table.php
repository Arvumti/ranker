<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksSubcomentariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ranks_subcomentarios', function($table)
		{
			$table->increments('idRankSubcomentario');
			
			$table->integer('idSubcomentario')->unsigned();
			$table->foreign('idSubcomentario')
					->references('idSubcomentario')->on('subcomentarios')
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
		Schema::drop('ranks_subcomentarios');
	}

}
