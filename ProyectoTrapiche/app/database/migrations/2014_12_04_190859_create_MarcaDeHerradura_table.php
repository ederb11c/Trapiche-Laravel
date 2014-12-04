<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarcaDeHerraduraTable extends Migration {

	public function up()
	{
		Schema::create('MarcaDeHerradura', function(Blueprint $table) {
			$table->increments('MrkId');
			$table->string('MrkIName');
			$table->integer('MrkIIdState');
		});
	}

	public function down()
	{
		Schema::drop('MarcaDeHerradura');
	}
}