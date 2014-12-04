<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadoMoliendaTable extends Migration {

	public function up()
	{
		Schema::create('EstadoMolienda', function(Blueprint $table) {
			$table->increments('SttmIdStateGrinding');
			$table->string('SttmNameState');
			$table->integer('SttmIdState');
		});
	}

	public function down()
	{
		Schema::drop('EstadoMolienda');
	}
}