<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCosecheroTable extends Migration {

	public function up()
	{
		Schema::create('Cosechero', function(Blueprint $table) {
			$table->increments('HrvIdharvester');
			$table->datetime('HrvName');
			$table->string('HrvFirstName');
			$table->string('HrvLastName');
			$table->integer('HrvIdSex');
			$table->integer('HrvtypeId');
			$table->string('HrvNumberId');
			$table->string('HrvEmail')->nullable();
			$table->string('HrvFoto')->nullable();
			$table->datetime('HrvDateOfBirthd');
			$table->integer('HrvIdUserRegister');
			$table->datetime('HrvDateRecord');
			$table->datetime('HrvDateLastEdition');
			$table->integer('HrvIdTrapiche');
			$table->integer('HrvIdState');
		});
	}

	public function down()
	{
		Schema::drop('Cosechero');
	}
}