<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcomentariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcomentarios', function($table)
		{
			$table->increments('idSubcomentario');

			$table->integer('idAlias')->unsigned();
			$table->foreign('idAlias')
					->references('idAlias')->on('alias')
					->onDelete('cascade');
			
			$table->integer('idPost')->unsigned();
			$table->foreign('idPost')
					->references('idPost')->on('posts')
					->onDelete('cascade');

			$table->string('comentario');
			$table->string('video');

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
		Schema::drop('subcomentarios');
	}

}
