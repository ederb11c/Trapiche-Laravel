<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTioTipoDeOpcionesTable extends Migration {

	public function up()
	{
		Schema::create('TioTipoDeOpciones', function(Blueprint $table) {
			$table->increments('TioId');
			$table->string('TioNombre')->nullable();
			$table->integer('TioIdEstado');
			$table->string('TioHtml');
		});
	}

	public function down()
	{
		Schema::drop('TioTipoDeOpciones');
	}
}