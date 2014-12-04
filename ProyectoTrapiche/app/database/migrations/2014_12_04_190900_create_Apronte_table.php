<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApronteTable extends Migration {

	public function up()
	{
		Schema::create('Apronte', function(Blueprint $table) {
			$table->increments('id');
		});
	}

	public function down()
	{
		Schema::drop('Apronte');
	}
}