<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioTable extends Migration {

	public function up()
	{
		Schema::create('Usuario', function(Blueprint $table) {
			$table->increments('SrIdUser');
			$table->string('SrNamesUser');
			$table->string('SrFirtName');
			$table->string('SrLastName');
			$table->integer('SrTypeId');
			$table->string('NumberId');
			$table->integer('SrIdRol');
			$table->integer('SrIdSex');
			$table->string('SrEmail');
			$table->string('SrLogin');
			$table->string('password');
			$table->string('SrFoto');
			$table->integer('SrIdEstado');
			$table->datetime('SrDateOfBirth')->nullable();
			$table->datetime('SrDateRecord');
			$table->datetime('SrDateLastJoin')->nullable();
			$table->string('SrdateLastEdition')->nullable();
			$table->integer('SrTrysAviable')->default('3');
			$table->integer('SrTrys')->default('3');
			$table->string('remember_token');
		});
	}

	public function down()
	{
		Schema::drop('Usuario');
	}
}