<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadoApronteTable extends Migration {

	public function up()
	{
		Schema::create('EstadoApronte', function(Blueprint $table) {
			$table->increments('SttaIdstateApronte');
			$table->string('SttaName');
			$table->integer('SttaState');
			$table->string('Estado_StIdState');
		});
	}

	public function down()
	{
		Schema::drop('EstadoApronte');
	}
}