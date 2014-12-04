<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenMenusTable extends Migration {

	public function up()
	{
		Schema::create('MenMenus', function(Blueprint $table) {
			$table->increments('MenId');
			$table->string('MenNombre');
			$table->string('MenDescripcion')->nullable();
			$table->string('MenLink');
			$table->integer('MenTipoMenu')->unsigned();
			$table->string('MenIdEstado')->nullable()->default('1');
		});
	}

	public function down()
	{
		Schema::drop('MenMenus');
	}
}