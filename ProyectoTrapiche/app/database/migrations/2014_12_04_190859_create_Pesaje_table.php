<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePesajeTable extends Migration {

	public function up()
	{
		Schema::create('Pesaje', function(Blueprint $table) {
			$table->increments('WgnIdWeighing');
			$table->integer('WgnIdMuleWeighing');
			$table->datetime('WgnDateWeighing');
			$table->decimal('WgnWeightWeighing', 18,2);
			$table->integer('WgnIdUnitMeasurement');
			$table->string('WgnComents')->nullable();
			$table->datetime('WgnDateRecord');
			$table->datetime('WgnDateLastEdition');
			$table->integer('WgnIdUserRegister');
			$table->integer('WgnIdState');
			$table->integer('WgnIdUserLastEdition')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Pesaje');
	}
}