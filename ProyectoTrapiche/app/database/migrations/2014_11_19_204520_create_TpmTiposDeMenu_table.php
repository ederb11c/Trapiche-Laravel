<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTpmTiposDeMenuTable extends Migration {

	public function up()
	{
		Schema::create('TpmTiposDeMenu', function(Blueprint $table) {
			$table->increments('TimId');
			$table->string('TimNombre');
			$table->integer('TimIdEstado')->nullable();
			$table->string('TpmHtml');
		});
	}

	public function down()
	{
		Schema::drop('TpmTiposDeMenu');
	}
}