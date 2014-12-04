<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoOperarioTable extends Migration {

	public function up()
	{
		Schema::create('TipoOperario', function(Blueprint $table) {
			$table->increments('TwkrIdTypeWorker');
			$table->string('TwkrNameTypeWorker');
			$table->integer('TwkrIdStateTypeWorker');
		});
	}

	public function down()
	{
		Schema::drop('TipoOperario');
	}
}