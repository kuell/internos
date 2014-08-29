<?php

class InternoTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $ponteiro = fopen ("public/rel.TXT","r");

      while (!feof ($ponteiro)) {
        $linha = fgets($ponteiro,4096);

        $d = explode(';', $linha);

        $i = new Interno();
          $i->nome = $d[1];
          $i->cod_interno = $d[0];
          $i->situacao = true;
          $i->setor_id = 1;
        $i->save();

      }

      fclose ($ponteiro);
  }
}
