<?php

use Illuminate\Database\Migrations\Migration;

class AlterFrequenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('interno_frequencias', function ($table) {
				$table->boolean('falta')->default(false);
				$table->string('justificativa')->nullable();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}

}
