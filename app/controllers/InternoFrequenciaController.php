<?php

class InternoFrequenciaController extends \BaseController {

	protected $frequencias;
	protected $rules = array(
		'interno_id' => 'required',
		'entrada'    => 'required',
		'saida'      => 'required',
		'data'       => 'required',
	);

	public function __construct(InternoFrequencia $frequencia) {
		$this->frequencias = $frequencia;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$frequencias = $this->frequencias->all();

		return View::make('interno_frequencias.index', compact('frequencias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		$setor = Setor::find(Input::get('setor_id'));
		$horas = Setor::find(Input::get('setor_id'));

		return View::make('interno_frequencias.create', compact('setor'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$input = Input::all();

		$f             = $this->frequencias;
		$f->data       = $input['data'];
		$f->interno_id = $input['interno_id'];

		// Verifica variaval $input[4]['name']
		// Se igual a 'justificativa', inclui registro como falta e salva
		// se não inclui movimento de frequencia //

		if (isset($input['justificativa'])) {
			$f->justificativa = $input['justificativa'];
			$f->entrada       = '00:00';
			$f->saida         = '00:00';
			$f->falta         = true;
		} else {
			$f->justificativa = '';
			$f->falta         = false;
			$f->entrada       = $input['entrada'];
			$f->saida         = $input['saida'];
		}

		$i = $f->where('interno_id', '=', $f->interno_id)->where('data', '=', $f->data)->count();

		if ($i == 0) {
			$f->save();
			return 'Gravado';
		} else {
			DB::table('interno_frequencias')
				->where('interno_id', $f->interno_id)
				->where('data', $f->data)->update(array('entrada' => $f->entrada,
					'saida'                                          => $f->saida,
					'justificativa'                                  => $f->justificativa,
					'falta'                                          => $f->falta
				));
			return 'Atualizado';
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
