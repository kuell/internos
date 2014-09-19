<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('internos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nome');
			$table->integer('setor_id');
			$table->integer('cod_interno');
			$table->boolean('situacao');
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
		Schema::dropIfExists('internos');
	}

}
