<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetalleMoliendaTable extends Migration {

	public function up()
	{
		Schema::create('DetalleMolienda', function(Blueprint $table) {
			$table->increments('DgrnId');
			$table->integer('DgrnIdGrinding');
			$table->decimal('DgrnQuantity');
			$table->decimal('DgrnTotalInKg');
			$table->integer('DgrnUnitMeasurement');
			$table->datetime('DrgnDateLastEdition');
			$table->datetime('DrgnDateRecord');
			$table->integer('DrgnIdUserRegister');
			$table->integer('DrgnIdUserLastEdition')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('DetalleMolienda');
	}
}