<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnidadadDeMedidaTable extends Migration {

	public function up()
	{
		Schema::create('UnidadadDeMedida', function(Blueprint $table) {
			$table->increments('UntmIdUnitMeasurement');
			$table->string('UntmNameUnitMeasurement');
			$table->integer('UntmIdState');
		});
	}

	public function down()
	{
		Schema::drop('UnidadadDeMedida');
	}
}