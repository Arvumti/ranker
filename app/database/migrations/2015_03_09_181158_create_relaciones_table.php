<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelacionesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relaciones', function($table)
		{
			$table->increments('idRelacion');
			$table->integer('idPerfilBase')->unsigned();
			$table->foreign('idPerfilBase')
					->references('idPerfil')->on('perfiles')
					->onDelete('cascade');
			$table->integer('idPerfilRelacion')->unsigned();
			$table->foreign('idPerfilRelacion')
					->references('idPerfil')->on('perfiles')
					->onDelete('cascade');
			$table->timestamps();
			
			$table->unique(array('idPerfilBase','idPerfilRelacion'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('relaciones');
	}

}
