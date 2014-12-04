<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMoliendaTable extends Migration {

	public function up()
	{
		Schema::create('Molienda', function(Blueprint $table) {
			$table->increments('id');
		});
	}

	public function down()
	{
		Schema::drop('Molienda');
	}
}