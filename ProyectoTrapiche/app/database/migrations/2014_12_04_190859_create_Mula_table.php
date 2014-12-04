<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMulaTable extends Migration {

	public function up()
	{
		Schema::create('Mula', function(Blueprint $table) {
			$table->increments('MlIdMule');
			$table->string('MlName');
			$table->integer('MlIdSex');
			$table->integer('MlSpecie');
			$table->string('MlDescription')->nullable();
			$table->integer('MlIdState');
			$table->datetime('MlDateRecord');
			$table->datetime('MlDateLastEdition')->nullable();
			$table->integer('MlIdUserRegister');
			$table->integer('MlIdUserLastEdition')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('Mula');
	}
}