<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoIdentificacionTable extends Migration {

	public function up()
	{
		Schema::create('TipoIdentificacion', function(Blueprint $table) {
			$table->increments('idTypIdTypeId');
			$table->string('TypNameTypeId');
			$table->integer('TypStatetypeId');
		});
	}

	public function down()
	{
		Schema::drop('TipoIdentificacion');
	}
}