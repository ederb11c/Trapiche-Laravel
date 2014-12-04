<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHerrajeTable extends Migration {

	public function up()
	{
		Schema::create('Herraje', function(Blueprint $table) {
			$table->increments('IrwIdIronWork');
			$table->integer('IrwMrkId');
			$table->integer('IrwIdSize');
			$table->integer('IrwIdMule');
			$table->datetime('IrwDateIronWork');
			$table->string('IrwFarrier');
			$table->datetime('IrwDateRecord');
			$table->datetime('IrwDateLastEdition');
			$table->integer('IrwIdUserRegister');
			$table->integer('IrwIdUserLastEdition');
			$table->integer('IrwIdState');
		});
	}

	public function down()
	{
		Schema::drop('Herraje');
	}
}