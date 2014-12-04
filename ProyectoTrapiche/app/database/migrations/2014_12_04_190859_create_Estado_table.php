<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadoTable extends Migration {

	public function up()
	{
		Schema::create('Estado', function(Blueprint $table) {
			$table->increments('StId');
			$table->string('StNameState');
			$table->string('StDescription')->nullable();
			$table->integer('StIdState');
		});
	}

	public function down()
	{
		Schema::drop('Estado');
	}
}