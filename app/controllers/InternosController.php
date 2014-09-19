<?php

class InternosController extends \BaseController {

	private $rules = array(
		'nome'     => 'required|unique:internos,nome',
		'setor_id' => 'required',
	);
	private $internos;

	public function __construct(Interno $interno) {
		$this->internos = $interno;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$internos = $this->internos->orderBy('situacao', 'desc')->orderBy('cod_interno')->get();

		return View::make('internos.index', compact('internos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('internos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$input = Input::all();

		$validation = Validator::make($input, $this->rules);

		if ($validation->passes()) {
			$this->internos->create($input);

			return Redirect::route('internos.index');
		}

		return Redirect::route('internos.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'Houve erros na validação dos dados.');
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
		$interno = $this->internos->find($id);

		return View::make('internos.edit', compact('interno'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$input = array_except(Input::all(), '_method');

		$this->rules['nome'] = 'required|unique:internos,nome,'.$id;

		$validation = Validator::make($input, $this->rules);

		if ($validation->passes()) {
			$interno = $this->internos->find($id);
			$interno->update($input);

			return Redirect::route('internos.index');
		}

		return Redirect::route('internos.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'Houve erros na validação dos dados.');
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
