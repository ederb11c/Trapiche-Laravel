<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArrieroTable extends Migration {

	public function up()
	{
		Schema::create('Arriero', function(Blueprint $table) {
			$table->increments('MldIdMuleDriver');
			$table->integer('MldIdTypeId');
			$table->string('MldNumberId');
			$table->string('MldName');
			$table->string('MldFirstName');
			$table->string('MldLastName');
			$table->string('MldFoto')->nullable();
			$table->string('MlEmail')->nullable();
			$table->datetime('MlDateOfBirth');
			$table->datetime('MlDateRecord');
			$table->datetime('MlIdUserRecord');
			$table->integer('MldIdState');
			$table->string('MlIdUserLastEdition')->nullable();
			$table->integer('MlIdSex');
		});
	}

	public function down()
	{
		Schema::drop('Arriero');
	}
}