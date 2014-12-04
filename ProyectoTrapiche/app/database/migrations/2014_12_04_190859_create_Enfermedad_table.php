<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnfermedadTable extends Migration {

	public function up()
	{
		Schema::create('Enfermedad', function(Blueprint $table) {
			$table->increments('LlnIdIllnes');
			$table->string('LlnTreatment');
			$table->integer('LlnIdMule');
			$table->datetime('LlnDateIllenes');
			$table->string('LlnComents')->nullable();
			$table->datetime('LlnDateRecord');
			$table->datetime('LlnDateLastEdition');
			$table->integer('LlnIdUserRegister');
			$table->integer('LlnIdUserLastEdition');
			$table->integer('LlnIdState');
		});
	}

	public function down()
	{
		Schema::drop('Enfermedad');
	}
}