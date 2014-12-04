<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSembradoTable extends Migration {

	public function up()
	{
		Schema::create('Sembrado', function(Blueprint $table) {
			$table->increments('ClfId');
			$table->string('ClfName');
			$table->integer('ClfIdHarvester');
			$table->decimal('ClfArea', 18,2);
			$table->string('ClfDireccion')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Sembrado');
	}
}