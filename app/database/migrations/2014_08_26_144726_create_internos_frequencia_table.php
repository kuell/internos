<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternosFrequenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('interno_frequencias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('data');
			$table->time('entrada');
			$table->time('saida');
			$table->integer('interno_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('internos_frequencias');
	}

}
