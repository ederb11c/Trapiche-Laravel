<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('MenMenus', function(Blueprint $table) {
			$table->foreign('MenTipoMenu')->references('TimId')->on('TpmTiposDeMenu')
;
		});
		Schema::table('OpcOpcion', function(Blueprint $table) {
			$table->foreign('OpcIdTipoOpcion')->references('TioId')->on('TioTipoDeOpciones');
		});
		Schema::table('MvrMenusVsRoles', function(Blueprint $table) {
			$table->foreign('MvrIdMenu')->references('MenId')->on('MenMenus');
		});
		Schema::table('MvoMenusVsOpciones', function(Blueprint $table) {
			$table->foreign('MvoIdOpcion')->references('OpcId')->on('OpcOpcion');
		});
		Schema::table('MvoMenusVsOpciones', function(Blueprint $table) {
			$table->foreign('MvoIdMenu')->references('MenId')->on('MenMenus');
		});
		Schema::table('OvsOpcionVsSubOpcion', function(Blueprint $table) {
			$table->foreign('OvsIdOpcion')->references('OpcId')->on('OpcOpcion');
		});
		Schema::table('OvsOpcionVsSubOpcion', function(Blueprint $table) {
			$table->foreign('OvsIdSubOPcion')->references('OpcId')->on('OpcOpcion');
		});
	}

	public function down()
	{
		Schema::table('MenMenus', function(Blueprint $table) {
			$table->dropForeign('MenMenus_MenTipoMenu_foreign');
		});
		Schema::table('OpcOpcion', function(Blueprint $table) {
			$table->dropForeign('OpcOpcion_OpcIdTipoOpcion_foreign');
		});
		Schema::table('MvrMenusVsRoles', function(Blueprint $table) {
			$table->dropForeign('MvrMenusVsRoles_MvrIdMenu_foreign');
		});
		Schema::table('MvoMenusVsOpciones', function(Blueprint $table) {
			$table->dropForeign('MvoMenusVsOpciones_MvoIdOpcion_foreign');
		});
		Schema::table('MvoMenusVsOpciones', function(Blueprint $table) {
			$table->dropForeign('MvoMenusVsOpciones_MvoIdMenu_foreign');
		});
		Schema::table('OvsOpcionVsSubOpcion', function(Blueprint $table) {
			$table->dropForeign('OvsOpcionVsSubOpcion_OvsIdOpcion_foreign');
		});
		Schema::table('OvsOpcionVsSubOpcion', function(Blueprint $table) {
			$table->dropForeign('OvsOpcionVsSubOpcion_OvsIdSubOPcion_foreign');
		});
	}
}