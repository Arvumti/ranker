<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePerfilesAddApellidos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('perfiles', function($table)
		{
		    $table->string('apaterno')->nullable();
		    $table->string('amaterno')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('perfiles', function($table)
		{
		    $table->dropColumn('apaterno');
		    $table->dropColumn('amaterno');
		});
	}

}
