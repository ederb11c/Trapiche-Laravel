<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOvsOpcionVsSubOpcionTable extends Migration {

	public function up()
	{
		Schema::create('OvsOpcionVsSubOpcion', function(Blueprint $table) {
			$table->increments('OvsId');
			$table->integer('OvsIdOpcion')->unsigned();
			$table->integer('OvsIdSubOPcion')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('OvsOpcionVsSubOpcion');
	}
}