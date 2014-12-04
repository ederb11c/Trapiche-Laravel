<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrapicheTable extends Migration {

	public function up()
	{
		Schema::create('Trapiche', function(Blueprint $table) {
			$table->increments('id');
		});
	}

	public function down()
	{
		Schema::drop('Trapiche');
	}
}