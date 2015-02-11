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
					(a.saida-a.entrada) as htrab,
					a.justificativa
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
				'horasTrabalhadas'                => $v->htrab,
				'justificativa'                   => $v->justificativa);
		}

		return View::make('internos.reports.horas_trabalhadas', compact('interno'))
			->with('dados', $dados)
			->with('data', $data);

	}

	public function horasTrabSetor($datai, $dataf) {

		$res = DB::select("select
								c.id,
								c.descricao as setor,
								c.padrao_horatrabalho as horabase,
								count(distinct(b.id)) as internos,
								count(distinct(a.data)) as qtdDias,
								(count(distinct(a.data)) * count(distinct(b.id))) * interval '7:20 hour' as horaspotenciais,
								sum(a.saida - a.entrada) as horasTrabalhadas
							from
								interno_frequencias a
								inner join internos b on a.interno_id = b.id
								inner join setors c on b.setor_id = c.id
							where
								a.data between ? and ?
							group by
								c.id", [$datai, $dataf]);

		return View::make('interno_frequencias.reports.horas_setor')
			->with('dados', $res)
			->with('periodo', [$datai, $dataf]);

	}

	public function getProdutividade($data) {

		$data = explode('-', $data);
		//$setor 	= Frequencia

		//return View::make('reports.produtividade', compact('dados'))->with('data', $data);

	}

	public function getPonto($data) {
		$internos = Interno::whereNotNull('setor_id')->where('setor_id', '>', '0')->get();

		foreach ($internos->groupBy("setor_id") as $key => $val) {
			$setors[] = Setor::find($key);
		}

		return View::make('reports.ponto', compact('setors'))->with('data', $data);

	}

}
