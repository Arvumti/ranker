<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ubicaciones', function($table)
		{
			$table->increments('idUbicacion');
			$table->integer('idPais')->unsigned();
			$table->foreign('idPais')
					->references('idPais')->on('paises')
					->onDelete('cascade');
			$table->string('nombre');
			$table->string('bandera');
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
		Schema::drop('ubicaciones');
	}

}
