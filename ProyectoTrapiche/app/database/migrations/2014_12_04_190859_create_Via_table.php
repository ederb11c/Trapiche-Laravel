<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateViaTable extends Migration {

	public function up()
	{
		Schema::create('Via', function(Blueprint $table) {
			$table->increments('PrpIdPrep');
			$table->string('PrpNamePrep');
			$table->integer('PrpIdStatePrep');
		});
	}

	public function down()
	{
		Schema::drop('Via');
	}
}