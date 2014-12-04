<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpcOpcionTable extends Migration {

	public function up()
	{
		Schema::create('OpcOpcion', function(Blueprint $table) {
			$table->increments('OpcId');
			$table->string('OpcNombre');
			$table->string('OpcDescripcion')->nullable();
			$table->string('OpcLink');
			$table->integer('OpcIdTipoOpcion')->unsigned();
			$table->integer('OpcIdEstado')->nullable()->default('1');
		});
	}

	public function down()
	{
		Schema::drop('OpcOpcion');
	}
}