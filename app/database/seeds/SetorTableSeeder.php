<?php

class SetorTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('setors')->truncate();
		DB::table('setors')->insert(array(
										array(
											'descricao'=>'ADMINISTRACAO',
											'encarregado'=>'NÃO DEFINIDO',
											'created_at'=>date('Y-m-d H:i:s'),
											'updated_at'=>date('Y-m-d H:i:s')
											),
										array(
											'descricao'=>'PRODUCAO',
											'encarregado'=>'NÃO DEFINIDO',
											'created_at'=>date('Y-m-d H:i:s'),
											'updated_at'=>date('Y-m-d H:i:s')
											),
										array(
											'descricao'=>'AUXILIARES DE MANUTENCAO',
											'encarregado'=>'NÃO DEFINIDO',
											'created_at'=>date('Y-m-d H:i:s'),
											'updated_at'=>date('Y-m-d H:i:s')
											),
										array(
											'descricao'=>'CONTROLE DE QUALIDADE',
											'encarregado'=>'NÃO DEFINIDO',
											'created_at'=>date('Y-m-d H:i:s'),
											'updated_at'=>date('Y-m-d H:i:s')
											),
										array(
											'descricao'=>'SAUDE E SEGURANCA DO TRABALHO ',
											'encarregado'=>'NÃO DEFINIDO',
											'created_at'=>date('Y-m-d H:i:s'),
											'updated_at'=>date('Y-m-d H:i:s')
											),
										array(
											'descricao'=>'SEGURANCA',
											'encarregado'=>'NÃO DEFINIDO',
											'created_at'=>date('Y-m-d H:i:s'),
											'updated_at'=>date('Y-m-d H:i:s')
											),
										array(
											'descricao'=>'TRANSPORTE',
											'encarregado'=>'NÃO DEFINIDO',
											'created_at'=>date('Y-m-d H:i:s'),
											'updated_at'=>date('Y-m-d H:i:s')
											),
										array(
											'descricao'=>'S.I.F',
											'encarregado'=>'NÃO DEFINIDO',
											'created_at'=>date('Y-m-d H:i:s'),
											'updated_at'=>date('Y-m-d H:i:s')
											),
										array(
											'descricao'=>'AUXILIARES DE PRODUCAO',
											'encarregado'=>'NÃO DEFINIDO',
											'created_at'=>date('Y-m-d H:i:s'),
											'updated_at'=>date('Y-m-d H:i:s')
											)
										)
									);
		DB::update('update internos set setor_id = 2');
			
			
	}

}
