<?php

class ReportsController extends \BaseController {

	public function horasTrabInterno($interno_id, $mesano) {
		$data = explode('-', $mesano);

		$interno = Interno::find($interno_id);

		$res = DB::select('Select
						a.data,
						a.entrada,
						a.saida,
						(a.saida-a.entrada) as htrab,
						(a.saida-a.entrada) - c.padrao_horatrabalho as horaextra
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
				'horaExtra'                       => $v->horaextra);
		}

		return View::make('internos.reports.horas_trabalhadas', compact('interno'))
			->with('dados', $dados)
			->with('data', $data);

	}

	public function horasTrabSetor($mesano) {
		$res = DB::select('select
								c.descricao as setor,
								(Select
									sum(saida-entrada) as totalHoras
								from
									interno_frequencias) as totalHoras,
								sum(b.saida - b.entrada) as horas
							from
								internos a
								inner join interno_frequencias b on a.id = b.interno_id
								inner join setors c on a.setor_id = c.id
							group by
								c.descricao, (Select
													sum(saida-entrada) as totalHoras
												from
													interno_frequencias)');

		return View::make('interno_frequencias.reports.horas_setor')
			->with('dados', $res);
	}

}
