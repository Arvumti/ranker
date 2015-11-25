<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAliasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alias', function($table)
		{
			$table->increments('idAlias');
			/*$table->integer('idUbicacion')->unsigned();
			$table->foreign('idUbicacion')
					->references('idUbicacion')->on('ubicaciones')
					->onDelete('cascade');*/
			$table->string('nombre');
			$table->string('password');
			$table->string('correo')->unique();
			$table->string('pais');
			$table->string('estado');
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
		Schema::drop('alias');
	}

}
