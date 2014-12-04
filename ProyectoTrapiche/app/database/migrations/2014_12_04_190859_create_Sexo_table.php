<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSexoTable extends Migration {

	public function up()
	{
		Schema::create('Sexo', function(Blueprint $table) {
			$table->increments('SxIdSex');
			$table->string('SxNameSx');
			$table->integer('SxIdState');
		});
	}

	public function down()
	{
		Schema::drop('Sexo');
	}
}