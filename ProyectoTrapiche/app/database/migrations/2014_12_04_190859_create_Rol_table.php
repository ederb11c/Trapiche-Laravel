<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRolTable extends Migration {

	public function up()
	{
		Schema::create('Rol', function(Blueprint $table) {
			$table->increments('RlIdRole');
			$table->string('RlNameRole');
			$table->string('RlDescription');
			$table->integer('RlIdstatus');
		});
	}

	public function down()
	{
		Schema::drop('Rol');
	}
}