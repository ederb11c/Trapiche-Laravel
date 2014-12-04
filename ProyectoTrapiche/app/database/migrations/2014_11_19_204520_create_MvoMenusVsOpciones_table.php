<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMvoMenusVsOpcionesTable extends Migration {

	public function up()
	{
		Schema::create('MvoMenusVsOpciones', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('MvoIdOpcion')->unsigned();
			$table->integer('MvoIdMenu')->unsigned();
			$table->integer('MvoIdEstado')->nullable()->default('1');
		});
	}

	public function down()
	{
		Schema::drop('MvoMenusVsOpciones');
	}
}