<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDesparacitacionTable extends Migration {

	public function up()
	{
		Schema::create('Desparacitacion', function(Blueprint $table) {
			$table->increments('DwrIdDeworming');
			$table->string('DwrProduct');
			$table->decimal('DwrQuantity', 18,2);
			$table->integer('DwrIdUntMeasurement');
			$table->integer('DwrIdPrep');
			$table->integer('DwrIdMule');
			$table->string('DwrComents')->nullable();
			$table->datetime('DwrAplicationDate');
			$table->datetime('DwrDateRecord');
			$table->datetime('DwrDateLastEdition')->nullable();
			$table->integer('DwrIdUserRegister');
			$table->integer('DwrIdUserLastEdition')->nullable();
			$table->integer('DwrIdState');
		});
	}

	public function down()
	{
		Schema::drop('Desparacitacion');
	}
}