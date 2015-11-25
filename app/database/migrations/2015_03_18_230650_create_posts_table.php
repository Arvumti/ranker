<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table)
		{
			$table->increments('idPost');
			$table->integer('idAlias')->unsigned();
			$table->foreign('idAlias')
					->references('idAlias')->on('alias')
					->onDelete('cascade');
					
			$table->integer('idPerfil')->unsigned();
			$table->foreign('idPerfil')
					->references('idPerfil')->on('perfiles')
					->onDelete('cascade');
			
			$table->string('secret');
			$table->string('confesion');
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
		Schema::drop('posts');
	}

}
