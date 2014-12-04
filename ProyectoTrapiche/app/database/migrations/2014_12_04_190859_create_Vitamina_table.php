<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVitaminaTable extends Migration {

	public function up()
	{
		Schema::create('Vitamina', function(Blueprint $table) {
			$table->increments('VtmIdVitaminize');
			$table->string('VtmProduct');
			$table->decimal('VtmQuantity', 18,2);
			$table->integer('VtmIdUntMeasurement');
			$table->integer('VtmIdPrep');
			$table->integer('VtmIdMule');
			$table->string('VtmComents')->nullable();
			$table->datetime('VtmAplicationDate');
			$table->datetime('VtmDateRecord');
			$table->datetime('VtmDateLastEdition')->nullable();
			$table->integer('VtmIdUserRegister');
			$table->integer('VtmIdUserLastEdition')->nullable();
			$table->integer('VtmIdstate');
		});
	}

	public function down()
	{
		Schema::drop('Vitamina');
	}
}