<?php

class SetorTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$s = new Setor();

		$s->descricao = "Abate";
		$s->encarregado = "Valdeci";

		$s->save();
	}

}
