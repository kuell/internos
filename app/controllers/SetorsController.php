<?php

class SetorsController extends \BaseController {

	private $rules = array(
		'descricao' => 'required|unique:setors,descricao',
	);
	private $setors;

	public function __construct(Setor $setor) {
		$this->setors = $setor;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$setors = $this->setors->orderBy('descricao')->get();

		return View::make('setors.index', compact('setors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('setors.create');
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
			$this->setors->create($input);

			return Redirect::route('setors.index');
		}

		return Redirect::route('setors.create')
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
		$setor = $this->setors->find($id);

		return View::make('setors.edit', compact('setor'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$input = array_except(Input::all(), '_method');

		$this->rules = array('descricao' => 'required|unique:setors,descricao,'.$id);

		$validation = Validator::make($input, $this->rules);

		if ($validation->passes()) {
			$setor = $this->setors->find($id);
			$setor->update($input);

			return Redirect::route('setors.index');
		}

		return Redirect::route('setors.edit', $id)
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
