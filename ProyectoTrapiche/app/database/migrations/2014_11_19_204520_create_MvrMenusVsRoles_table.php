<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMvrMenusVsRolesTable extends Migration {

	public function up()
	{
		Schema::create('MvrMenusVsRoles', function(Blueprint $table) {
			$table->increments('MvrId');
			$table->integer('MvrIdRol');
			$table->integer('MvrIdMenu')->unsigned();
			$table->integer('MvrIdEstado');
		});
	}

	public function down()
	{
		Schema::drop('MvrMenusVsRoles');
	}
}