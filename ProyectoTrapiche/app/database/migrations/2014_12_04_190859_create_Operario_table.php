<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOperarioTable extends Migration {

	public function up()
	{
		Schema::create('Operario', function(Blueprint $table) {
			$table->increments('WkrId');
			$table->string('WkrName');
			$table->string('WkrFirstName');
			$table->string('WkrLastName');
			$table->integer('WrkIdTypeWorker');
			$table->integer('WrkIdSex');
			$table->integer('WkrIdTypeId');
			$table->string('WkrNumberId');
			$table->datetime('WkrDateOfBirth');
			$table->string('WkrEmail');
			$table->string('WkrFoto')->nullable();
			$table->integer('WkrIdTrapiche');
			$table->integer('WkrIdState');
			$table->integer('WrkIdUserRegister');
			$table->datetime('WkrDateRecord');
			$table->datetime('WkrDateLastEdition');
			$table->integer('WkrIdUserLasEdition');
			$table->integer('WrkStateAlternative');
		});
	}

	public function down()
	{
		Schema::drop('Operario');
	}
}