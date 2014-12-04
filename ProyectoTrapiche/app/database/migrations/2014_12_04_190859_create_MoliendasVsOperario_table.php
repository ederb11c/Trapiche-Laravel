<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMoliendasVsOperarioTable extends Migration {

	public function up()
	{
		Schema::create('MoliendasVsOperario', function(Blueprint $table) {
			$table->increments('id');
		});
	}

	public function down()
	{
		Schema::drop('MoliendasVsOperario');
	}
}