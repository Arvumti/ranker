<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFotosPostsTable extends Migration {

	public function up()
	{
		Schema::create('fotos_posts', function($table)
		{
			$table->increments('idFotoPost');
			$table->integer('idPost')->unsigned();
			$table->foreign('idPost')
					->references('idPost')->on('posts')
					->onDelete('cascade');
			$table->string('foto');

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
		Schema::drop('fotos_posts');
	}

}
