<?php

class ReportsController extends \BaseController {

	public function getReports() {
		return View::make('reports.index');
	}

	public function horasTrabInterno($interno_id, $mesano) {
		$data = explode('-', $mesano);

		$interno = Interno::find($interno_id);

		$res = DB::select('Select
							a.data,
							a.entrada,
							a.saida,
							(a.saida-a.entrada) as htrab
						from
							interno_frequencias a
							inner join internos b on(a.interno_id = b.id)
							inner join setors c on(b.setor_id = c.id)
						where
							a.interno_id = ? and
							extract(month from a.data) = ? and
							extract(year from a.data) = ?
						order by
							a.data', array($interno_id, $data[0], $data[1]));

		$dados = array();

		foreach ($res as $v) {
			$dados[$v->data] = array('entrada' => $v->entrada,
				'saida'                           => $v->saida,
				'horasTrabalhadas'                => $v->htrab);
		}

		return View::make('internos.reports.horas_trabalhadas', compact('interno'))
			->with('dados', $dados)
			->with('data', $data);

	}

	public function horasTrabSetor($data) {
		$d = explode('-', $data);

		$data = $d[1].'-'.$d[0].'-01';

		$res = DB::select('select
								a.descricao as setor,
								a.padrao_horatrabalho as horabase,
								count(distinct(b.id)) as internos,
								count(distinct(c.data)) as qtddias,
								f_horastrabalhadas(a.id, ?) as horastrabalhadas,
								f_horaspotenciais(a.id, ?) as horaspotenciais
							from
								setors a
								inner join internos b on a.id = b.setor_id
								inner join interno_frequencias c on b.id = c.interno_id
							where
								f_horaspotenciais(a.id, ?) is not null and
								extract(month from c.data) = ? and
								extract(year from c.data) = ?
							group by
								a.descricao, horastrabalhadas, horaspotenciais, horabase
							order by
								a.descricao
								', array($data, $data, $data, $d[0], $d[1]));

		return View::make('interno_frequencias.reports.horas_setor')
			->with('dados', $res)
			->with('data', $d[0].'-'.$d[1]);
	}

	public function getProdutividade($data) {

		$data = explode('-', $data);
		$d    = $data[2].'-'.$data[1].'-'.$data[0];

		$dados = DB::select('select
								a.descricao as setor,
								d.data,
								(Select
									sum(c.saida - c.entrada)
								from
									internos b
									inner join interno_frequencias c on(b.id = c.interno_id)
								where
									b.setor_id = a.id and
									c.data = d.data) as horasTrabalhadas
							from
								setors a, interno_frequencias d
							where
								(Select sum(c.saida - c.entrada)
								 from internos b inner join interno_frequencias c on(b.id = c.interno_id)
								where b.setor_id = a.id) is not null
								and
								d.data = ?
							group by
								d.data, a.descricao, a.id
							order by
								d.data', array($d));

		return View::make('reports.produtividade', compact('dados'))->with('data', $data);

	}

}
